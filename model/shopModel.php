<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

<?php

    $gameArray = array();

    function getGames($dbh, $category, $search) {
        if ($search !== "") {
            $sqlSufix = "WHERE gamesName LIKE :name";
        }
        else {
            $sqlSufix = "";
        }

        if ($category === "MostPopular") {
            $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesDownloads, gamesLink, gamesCreator FROM games " . $sqlSufix . " ORDER BY gamesName ASC";
        }
        else if ($category === "MostRecent") {
            $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesDownloads, gamesLink, gamesCreator FROM games " . $sqlSufix . " ORDER BY gamesDate DESC";
        }
        else if ($category === "Alphabetical") {
            $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesDownloads, gamesLink, gamesCreator FROM games " . $sqlSufix . " ORDER BY gamesDownloads DESC";
        }
        else {
            header('location: ./shop.php?error=database');
            exit();
        }
        
        $sth = $dbh->prepare($sql);
        if ($search !== "") {
            $sth->execute(array(':name' => $search));
        }
        else {
            $sth->execute(array());
        }
        
        $gameArray = ($sth->fetchAll());
        $sth->closeCursor();

        return $gameArray;
    }
