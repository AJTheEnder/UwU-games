<?php
    $gameArray = array();

    function getGames($dbh, $category) {
        if ($category === "MostPopular") {
            $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesVote, gamesLink, gamesCreator FROM games ORDER BY gamesName ASC";
        }
        else if ($category === "MostRecent") {
            $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesVote, gamesLink, gamesCreator FROM games ORDER BY gamesDate DESC";
        }
        else if ($category === "Alphabetical") {
            $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesVote, gamesLink, gamesCreator FROM games ORDER BY gamesVote DESC";
        }
        else {
            header('location: ./shop.php?error=database');
            exit();
        }
        
        $sth = $dbh->prepare($sql);
        $sth->execute(array());

        $gameArray = ($sth->fetchAll());
        $sth->closeCursor();

        return $gameArray;
    }
