<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

<?php

    /**
     * @name: uidExists
     * Check if username or email already exists in the database
     * @param: $dbh(PDO) $uid(String) $email(String)
     */
    function uidExists($dbh, $uid, $email)
    {
        $sql = "SELECT usersId, usersName, usersEmail, usersUid, usersPwd FROM users WHERE usersUid = :uid OR usersEmail = :email;";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':uid' => $uid, ':email' => $email));

        if ($resultData = $sth->fetchAll()) {
            // Return user row if it exists
            return $resultData[0];
        } else {
            $result = false;
            return $result;
        }
        $sth->closeCursor();
    }

    /**
     * @name: emptyInputLogin
     * Check empty inputs in the form
     * @param: $uid(String) $pwd(String)
     */
    function emptyInputLogin($uid, $pwd)
    {
        $result;
        if (empty($uid) || empty($pwd)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * @name: loginUser
     * Connect user to its session
     * @param: $dbh(PDO) $uid(String) $pwd(String)
     */
    function loginUser($dbh, $uid, $pwd)
    {
        $uidExists = uidExists($dbh, $uid, $uid);

        if ($uidExists === false) {
            header('location: ./login.php?error=wronglogin');
            exit();
        }

        $hashedPwd = ($uidExists["usersPwd"]);
        $checkPwd = password_verify($pwd, $hashedPwd);

        if ($checkPwd === false) {
            header('location: ./login.php?error=wronglogin');
            exit();
        }
        else {
            session_start();
            $_SESSION["userid"] = $uidExists["usersId"];
            $_SESSION["useruid"] = $uidExists["usersUid"];

            header('location: ./shop.php');
            exit();
        }
    }