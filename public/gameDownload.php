<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

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