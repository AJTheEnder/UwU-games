<?php

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $uid = $_POST['uid'];

        require_once __DIR__ . '/../db/dbh.php';
        include_once __DIR__ . '/../model/modifyProfileModel.php';

        if (emptyInputProfile($name, $email, $uid) === true) {
            header('location: ./modifyProfile.php?error=emptyinput');
            exit();
        }

        if (invalidUid($uid) !== false) {
            header('location: ./modifyProfile.php?error=invaliduid');
            exit();
        }

        if (invalidEmail($email) !== false) {
            header('location: ./modifyProfile.php?error=invalidemail');
            exit();
        }

        applyModif($dbh, $name, $email, $uid);
    } else {
        header('location: ./profile.php');
    }
