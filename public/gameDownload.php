<?php
    require_once __DIR__ . '/../db/dbh.php';

    $sql = "UPDATE games SET gamesDownloads = gamesDownloads + 1 WHERE gamesId = :id1; SELECT gamesLink FROM games WHERE gamesId = :id2;";

    $sth = $dbh->prepare($sql);
    $sth->execute(array(':id1' => $_GET["id"], ':id2' => $_GET["id"]));

    $link = $sth->fetchAll();

    var_dump($link);

    $sth->closeCursor();

//<script>
//    window.open('https://www.geeksforgeeks.org', '_blank');
//</script>
