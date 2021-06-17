<?php

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
            //session_start();
            $_SESSION["userid"] = $uidExists["usersId"];
            $_SESSION["useruid"] = $uidExists["usersUid"];
            header('location: ./index.php');
            exit();
        }
    }