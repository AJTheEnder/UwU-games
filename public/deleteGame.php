<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

 <?php

    session_start();

    if(isset($_SESSION['useruid']) && isset($_GET['id'])) {
        require_once __DIR__ . '/../db/dbh.php';

        $sql = "SELECT gamesCreator FROM games WHERE gamesId = :id;";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':id' => $_GET['id']));

        $creator = $sth->fetchAll()[0][0];

        var_dump($creator);

        if($_SESSION['useruid'] === $creator) {
            $sql = "DELETE FROM games WHERE gamesId = :id;";
            $sth = $dbh->prepare($sql);
            $sth->execute(array(':id' => $_GET['id']));

            header('location: ./shop.php');
            exit();
        }
    }
