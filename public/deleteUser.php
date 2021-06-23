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

    // Delete the logged in user from database
    $sql = "DELETE FROM users WHERE usersUid = :uid;";
    $sth = $dbh->prepare($sql);
    $sth->execute(array(':uid' => $_SESSION["useruid"]));

    //Delete its associated avatar image in the upload folder
    $image = "assets/img/upload/avatar/avatar" . $_SESSION["userid"] . ".jpg";
    unlink($image);

    header('location: ./logout.php');
    exit();