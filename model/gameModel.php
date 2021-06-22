<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

<?php
    // Get game row according to game ID
    $sql = "SELECT gamesId, gamesName, gamesDescription, gamesDate, gamesDownloads, gamesLink, gamesCreator FROM games WHERE gamesId = :id";
    
    $sth = $dbh->prepare($sql);
    $sth->execute(array(':id' => $_GET['id']));

    $game = ($sth->fetchAll())[0];

    $sth->closeCursor();
