<?php

if (isset($_POST["submit"])) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    require_once './dbh.inc.php';
    require_once './functions.inc.php';

    if (emptyInputLogin($uid, $pwd) === true) {
        header('location: ../login.php?error=emptyinput');
        exit();
    }

    loginUser($dbh, $uid, $pwd);
}
else {
    header('location: ../login.php');
    exit;
}