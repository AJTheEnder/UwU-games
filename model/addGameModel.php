<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

<?php

    /**
     * @name: emptyInputGame
     * Check empty inputs in the form
     * @param: $gameName(String) $gamesDescription(String) $gameDate(String) $downloadLink(String)
     */
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

    /**
     * @name: invalidName
     * Check invalid characters in gameName
     * @param: $gameName(String)
     */
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

    /**
     * @name: invalidLink
     * Check if URL exists
     * @param: $downloadLink(String)
     */
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

    /**
     * @name: gameExists
     * Check if name already exists in the database
     * @param: $dbh(PDO) $gameName(String)
     */
    function gameExists($dbh, $gameName)
    {
        $sql = "SELECT gamesId, gamesName, gamesDescription, gamesLink, gamesCreator FROM games WHERE gamesName = :name;";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':name' => htmlspecialchars($gameName)));

        if ($resultData = $sth->fetchAll()) {
            // Return game row if it exists
            return $resultData[0];
        } else {
            $result = false;
            return $result;
        }
        $sth->closeCursor();
    }

     /**
     * @name: createGame
     * Add the game to database
     * @param: $dbh(PDO) $gameName(String) $gamesDescription(String) $gameDate(String) $downloadLink(String)
     */
    function createGame($dbh, $gameName, $gamesDescription, $gameDate, $downloadLink)
    {
        $creator = $_SESSION["useruid"];
        $sql = "INSERT INTO games (gamesName, gamesDescription, gamesDate, gamesLink, gamesCreator) VALUES (:name, :description, :date, :link, :creator);";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':name' => htmlspecialchars($gameName), ':description' => htmlspecialchars($gamesDescription), ':date' => htmlspecialchars($gameDate), ':link' => htmlspecialchars($downloadLink), ':creator' => htmlspecialchars($creator)));
    }

    /**
     * @name: invalidExtention
     * Check if file extention is supported (for image upload)
     * @param: $fileName(String) $allowed(String)
     */
    function invalidExtention($fileName, $allowed) {
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $result;

        if (in_array($fileActualExt, $allowed)) {
            $result = $fileActualExt;
        }
        else {
            $result = true;
        }
        return $result;
    }
