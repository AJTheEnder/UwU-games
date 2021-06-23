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

    // If a user is connected
    if(isset($_SESSION['useruid']) && isset($_GET['id'])) {
        // Include database handler
        require_once __DIR__ . '/../db/dbh.php';

        // Get game creator's name from the database
        $sql = "SELECT gamesCreator FROM games WHERE gamesId = :id;";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':id' => $_GET['id']));

        $creator = $sth->fetchAll()[0][0];

        // If the connected user match the game creator
        if($_SESSION['useruid'] === $creator) {
            // Delete the game from the database
            $sql = "DELETE FROM games WHERE gamesId = :id;";
            $sth = $dbh->prepare($sql);
            $sth->execute(array(':id' => $_GET['id']));

            header('location: ./shop.php');
            exit();
        }
    }
