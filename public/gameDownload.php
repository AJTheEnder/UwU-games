<?php
    require_once __DIR__ . '/../db/dbh.php';

    $sql = "UPDATE games SET gamesDownloads = gamesDownloads + 1 WHERE gamesId = :id;";

    $sth = $dbh->prepare($sql);
    $sth->execute(array(':id' => $_GET["id"]));

    $sql = "SELECT gamesLink FROM games WHERE gamesId = :id;";

    $sth = $dbh->prepare($sql);
    $sth->execute(array(':id' => $_GET["id"]));

    $link = ($sth->fetchAll())[0][0];

    $sth->closeCursor();

    header("location: $link");
    exit();