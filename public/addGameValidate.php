<?php
    session_start();

    if (isset($_POST['submit'])) {
        $gameName = $_POST['gameName'];
        $gameDescription = $_POST['gameDescription'];
        $gameDate = $_POST['releaseDate'];
        $downloadLink = $_POST['downloadLink'];

        require_once __DIR__ . '/../db/dbh.php';
        include_once __DIR__ . '/../model/addGameModel.php';

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

        createGame($dbh, $gameName, $gameDescription, $gameDate, $downloadLink);
        
        if (isset($_FILES['gameImage'])) {
            $fileName = $_FILES['gameImage']['name'];
            $fileTmpName = $_FILES['gameImage']['tmp_name'];
            $fileSize = $_FILES['gameImage']['size'];
            $fileError = $_FILES['gameImage']['error'];
            $fileType = $_FILES['gameImage']['type'];
    
            $fileActualExt = strtolower(end(explode(".", $fileName)));
            $allowed = array("jpg", "jpeg", "png");
    
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

            $sql = "SELECT gamesId FROM games WHERE gamesName = :gameName;";
            $sth = $dbh->prepare($sql);
            $sth->execute(array(':gameName' => $gameName));
    
            $gameId = $sth->fetchAll()[0][0];

            $fileDestination = __DIR__ . '/assets/img/upload/game/game' . $gameId . '.png';
            var_dump($fileDestination);
            move_uploaded_file($fileTmpName, $fileDestination);
        }

        header('location: ./addGame.php?error=none');
        exit();
    }
    else {
        header('location: ./addGame.php');
    }
