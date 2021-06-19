<?php
    session_start();

    if (isset($_POST['submit'])) {
        $gameName = $_POST['gameName'];
        $gamesDescription = $_POST['gamesDescription'];
        $downloadLink = $_POST['downloadLink'];

        require_once __DIR__ . '/../db/dbh.php';
        include_once __DIR__ . '/../model/addGameModel.php';

        if (emptyInputGame($gameName, $gamesDescription, $downloadLink) === true) {
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

        createGame($dbh, $gameName, $gamesDescription, $downloadLink);
    }
    else if (isset($_POST['upload'])) {
        $fileName = $_FILES['game']['name'];
        $fileTmpName = $_FILES['game']['tmp_name'];
        $fileSize = $_FILES['game']['size'];
        $fileError = $_FILES['game']['error'];
        $fileType = $_FILES['game']['type'];

        $fileActualExt = strtolower(end(explode('.', $fileName)));
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

        $sql = "SELECT MAX(gamesId) FROM games WHERE 1";
        $sth = $dbh->prepare($sql);
        $sth->execute(array());

        $gameId = $sth->fetchAll()[0];

        $gameId = gameId + 1;

        $fileDestination = __DIR__ . '/assets/img/upload/game/' . 'game' . $gameId . '.png';

        move_uploaded_file($fileTmpName, $fileDestination);

        header('location: ./addGame.php?uploadsuccess');
        exit();
    }
    else {
        header('location: ./addGame.php');
    }
