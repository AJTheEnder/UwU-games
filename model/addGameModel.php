<?php
    function emptyInputGame($gameName, $gamesDescription, $downloadLink)
    {
        $result;
        if (
            empty($gameName) ||
            empty($gamesDescription) ||
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

    function createGame($dbh, $gameName, $gamesDescription, $downloadLink)
    {
        $creator = $_SESSION["useruid"];
        $sql = "INSERT INTO games (gamesName, gamesDescription, gamesLink, gamesCreator) VALUES (:name, :description, :link, :creator);";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(':name' => $gameName, ':description' => $gamesDescription, ':link' => $downloadLink, ':creator' => $creator));

        header('location: ./shop.php');
        exit();
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
