<?php

    function uidExists($dbh, $uid, $email)
    {
        $sql = "SELECT usersId, usersName, usersEmail, usersUid, usersPwd FROM users WHERE usersUid = :uid OR usersEmail = :email;";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':uid' => $uid, ':email' => $email));

        if ($resultData = $sth->fetchAll()) {
            return $resultData[0];
        } else {
            $result = false;
            return $result;
        }
        $sth->closeCursor();
    }

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