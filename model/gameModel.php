<?php
    $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesDownloads, gamesLink, gamesCreator FROM games WHERE gamesId = :id";
    
    $sth = $dbh->prepare($sql);
    $sth->execute(array(':id' => $_GET['id']));

    $game = ($sth->fetchAll())[0];

    $sth->closeCursor();
