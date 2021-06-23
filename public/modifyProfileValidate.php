<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-games
 -->

<?php

    session_start();

    // Include database handler
    require_once __DIR__ . '/../db/dbh.php';

    // When submit button is pressed
    if (isset($_POST['submit'])) {
        // Get all variables via $_POST super global variable
        $name = $_POST['name'];
        $email = $_POST['email'];
        $uid = $_POST['uid'];

        // Include model
        include_once __DIR__ . '/../model/modifyProfileModel.php';

        // Validate every fields
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

        // Change the profile in database
        applyModif($dbh, $name, $email, $uid);
    }
    // When submit button is pressed
    else if (isset($_POST['upload'])) {
        // Get all variables via $_POST super global variable
        $fileName = $_FILES['avatar']['name'];
        $fileTmpName = $_FILES['avatar']['tmp_name'];
        $fileSize = $_FILES['avatar']['size'];
        $fileError = $_FILES['avatar']['error'];
        $fileType = $_FILES['avatar']['type'];

        // Isolate file extention
        $fileActualExt = strtolower(end(explode('.', $fileName)));
        // Array of allowed extentions
        $allowed = array("jpg", "jpeg", "png");

        // Check if file is valid
        if (in_array($fileActualExt, $allowed) !== true) {
            header('location: ./modifyProfile.php?error=invalidextention');
            exit();
        }

        if ($fileError !== 0) {
            header('location: ./modifyProfile.php?error=fileerror');
            exit();
        }

        if ($fileSize > 2000000) {
            header('location: ./modifyProfile.php?error=oversizefile');
            exit();
        }

        // Move the file to upload folder
        $fileDestination = __DIR__ . '/assets/img/upload/avatar/avatar' . $_SESSION["userid"] . '.png';
        move_uploaded_file($fileTmpName, $fileDestination);

        header('location: ./modifyProfile.php?error=uploadsuccess');
        exit();
    }
    else {
        header('location: ./modifyProfile.php');
    }
