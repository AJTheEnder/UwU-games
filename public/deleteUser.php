<?php
    session_start();

    require_once __DIR__ . '/../db/dbh.php';

    $sql = "DELETE FROM users WHERE usersUid = :uid;";
    $sth = $dbh->prepare($sql);
    $sth->execute(array(':uid' => $_SESSION["useruid"]));

    $image = "assets/img/upload/avatar/avatar" . $_SESSION["userid"] . ".jpg";
    unlink($image);


    header('location: ./logout.php');
    exit();