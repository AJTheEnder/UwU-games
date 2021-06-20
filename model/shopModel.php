<?php
    function getGames($category) {
        if ($category === "Most popular") {
            $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesVote, gamesLink, gamesCreator FROM games ORDER BY gamesName ASC";
        }
        else if ($category === "Most recent") {
            $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesVote, gamesLink, gamesCreator FROM games ORDER BY gamesDate DESC";
        }
        else if ($category === "Alphabetical") {
            $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesVote, gamesLink, gamesCreator FROM games ORDER BY gamesVote DESC";
        }
        
        $sth = $dbh->prepare($sql);
        $sth->execute(array());

        $gameArray = ($sth->fetchAll())[0];
        $sth->closeCursor();

        header('location: ./shop.php');
        exit();
    }
