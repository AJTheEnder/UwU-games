<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

<?php

if (isset($_POST["submit"])) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    require_once __DIR__ . '/../db/dbh.php';
    require_once __DIR__ . '/../model/loginModel.php';

    if (emptyInputLogin($uid, $pwd) === true) {
        header('location: ./login.php?error=emptyinput');
        exit();
    }

    loginUser($dbh, $uid, $pwd);

    header('location: ./login.php?error=none');
    exit();
}
else {
    header('location: ./login.php');
    exit;
}