<?php

    require_once __DIR__ . './dbh.inc.php';

    $sql = "SELECT usersId, usersName, usersEmail, usersUid, usersPwd FROM users WHERE usersUid = :uid;";
    $sth = $dbh->prepare($sql);
    $sth->execute(array(':uid' => $_SESSION["useruid"]));

    $resultData = ($sth->fetchAll())[0];
    $sth->closeCursor();
