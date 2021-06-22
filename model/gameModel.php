<?php
    

    $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesDownloads, gamesLink, gamesCreator FROM games WHERE gamesId = :id";
    
    $sth = $dbh->prepare($sql);
    $sth->execute(array(':id' => $_GET['id']));

    $game = ($sth->fetchAll())[0];

    $sth->closeCursor();

    function download($dbh, $id) {
        echo("
        <script>
            window.open('https://www.geeksforgeeks.org', '_blank');
        </script>");

        $sql = "UPDATE games VALUE gamesDownloads = gamesDownloads + 1";
    
        $sth = $dbh->prepare($sql);
        $sth->execute(array());

        $sth->closeCursor();
    }
