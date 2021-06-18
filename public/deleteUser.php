<?php
    session_start();

    require_once __DIR__ . '/../db/dbh.php';

    $sql = "DELETE FROM users WHERE usersUid = :uid;";
    $sth = $dbh->prepare($sql);
    $sth->execute(array(':uid' => $_SESSION["useruid"]));

    header('location: ./logout.php');
    exit();