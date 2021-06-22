<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

<?php

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];
        $pwdRepeat = $_POST['pwdRepeat'];

        require_once __DIR__ . '/../db/dbh.php';
        include_once __DIR__ . '/../model/signupModel.php';

        if (emptyInputSignup($name, $email, $uid, $pwd, $pwdRepeat) === true) {
            header('location: ./signup.php?error=emptyinput');
            exit();
        }

        if (invalidUid($uid) !== false) {
            header('location: ./signup.php?error=invaliduid');
            exit();
        }

        if (invalidEmail($email) !== false) {
            header('location: ./signup.php?error=invalidemail');
            exit();
        }

        if (pwdMatch($pwd, $pwdRepeat) !== false) {
            header('location: ./signup.php?error=passwordsdontmatch');
            exit();
        }

        if (uidExists($dbh, $uid, $email) !== false) {
            header('location: ./signup.php?error=usernametaken');
            exit();
        }

        createUser($dbh, $name, $email, $uid, $pwd);
    } else {
        header('location: ./signup.php');
    }
