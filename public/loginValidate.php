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