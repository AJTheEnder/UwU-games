<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

<?php

    function emptyInputGame($gameName, $gamesDescription, $gameDate, $downloadLink)
    {
        $result;
        if (
            empty($gameName) ||
            empty($gamesDescription) ||
            empty($gameDate) ||
            empty($downloadLink)
        ) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidName($gameName)
    {
        $result;
        if (!preg_match('/^[a-zA-Z0-9_\s]*$/', $gameName)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidLink($downloadLink)
    {
        $result;
        if (!filter_var($downloadLink, FILTER_VALIDATE_URL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function gameExists($dbh, $gameName)
    {
        $sql = "SELECT gamesId, gamesName, gamesDescription, gamesLink, gamesCreator FROM games WHERE gamesName = :name;";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':name' => $gameName));

        if ($resultData = $sth->fetchAll()) {
            return $resultData[0];
        } else {
            $result = false;
            return $result;
        }
        $sth->closeCursor();
    }

    function createGame($dbh, $gameName, $gamesDescription, $gameDate, $downloadLink)
    {
        $creator = $_SESSION["useruid"];
        $sql = "INSERT INTO games (gamesName, gamesDescription, gamesDate, gamesLink, gamesCreator) VALUES (:name, :description, :date, :link, :creator);";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':name' => $gameName, ':description' => $gamesDescription, ':date' => $gameDate, ':link' => $downloadLink, ':creator' => $creator));
    }

    function invalidExtention($fileName, $allowed) {
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        if (in_array($fileActualExt, $allowed)) {
            $result = $fileActualExt;
        }
        else {
            $result = true;
        }
        return $result;
    }
