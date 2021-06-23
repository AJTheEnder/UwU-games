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

    // When submit button is pressed
    if (isset($_POST['submit'])) {
        // Get all variables via $_POST super global variable
        $gameName = $_POST['gameName'];
        $gameDescription = $_POST['gameDescription'];
        $gameDate = $_POST['releaseDate'];
        $downloadLink = $_POST['downloadLink'];

        // Include database handler
        require_once __DIR__ . '/../db/dbh.php';
        // Include model
        include_once __DIR__ . '/../model/addGameModel.php';

        // Validate every fields
        if (emptyInputGame($gameName, $gameDescription, $gameDate, $downloadLink) === true) {
            header('location: ./addGame.php?error=emptyinput');
            exit();
        }

        if (invalidName($gameName) !== false) {
            header('location: ./addGame.php?error=invalidname');
            exit();
        }

        if (invalidLink($downloadLink) !== false) {
            header('location: ./addGame.php?error=invalidlink');
            exit();
        }

        if (gameExists($dbh, $gameName) !== false) {
            header('location: ./addGame.php?error=gameexists');
            exit();
        }

        // Add the new game to the database
        createGame($dbh, $gameName, $gameDescription, $gameDate, $downloadLink);
        
        // If an image is set
        if (isset($_FILES['gameImage'])) {
            // Get all variables via $_POST super global variable
            $fileName = $_FILES['gameImage']['name'];
            $fileTmpName = $_FILES['gameImage']['tmp_name'];
            $fileSize = $_FILES['gameImage']['size'];
            $fileError = $_FILES['gameImage']['error'];
            $fileType = $_FILES['gameImage']['type'];
            
            // Isolate file extention
            $fileActualExt = strtolower(end(explode(".", $fileName)));
            // Array of allowed extentions
            $allowed = array("jpg", "jpeg", "png");
    
            // Check if file is valid
            if (in_array($fileActualExt, $allowed) !== true) {
                header('location: ./addGame.php?error=invalidextention');
                exit();
            }
    
            if ($fileError !== 0) {
                header('location: ./addGame.php?error=fileerror');
                exit();
            }
    
            if ($fileSize > 2000000) {
                header('location: ./addGame.php?error=oversizefile');
                exit();
            }

            // Get the game ID
            $sql = "SELECT gamesId FROM games WHERE gamesName = :gameName;";
            $sth = $dbh->prepare($sql);
            $sth->execute(array(':gameName' => $gameName));
            
            $gameId = $sth->fetchAll()[0][0];

            // Move the file to upload folder
            $fileDestination = __DIR__ . '/assets/img/upload/game/game' . $gameId . '.png';
            move_uploaded_file($fileTmpName, $fileDestination);
        }

        header('location: ./addGame.php?error=none');
        exit();
    }
    else {
        header('location: ./addGame.php');
    }
