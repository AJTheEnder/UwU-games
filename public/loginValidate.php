<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-games
 -->

<?php

    // When submit button is pressed
    if (isset($_POST["submit"])) {
        // Get all variables via $_POST super global variable
        $uid = $_POST['uid'];
        $pwd = $_POST['pwd'];

        // Include database handler
        require_once __DIR__ . '/../db/dbh.php';
        // Include model
        require_once __DIR__ . '/../model/loginModel.php';

        // Validate every fields
        if (emptyInputLogin($uid, $pwd) === true) {
            header('location: ./login.php?error=emptyinput');
            exit();
        }

        // Start user session
        loginUser($dbh, $uid, $pwd);

        header('location: ./login.php?error=none');
        exit();
    }
    else {
        header('location: ./login.php');
        exit;
    }