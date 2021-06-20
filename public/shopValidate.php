<?php

    if (isset($_POST['submitCategory'])) {
        require_once __DIR__ . '/../db/dbh.php';
        require_once __DIR__ . '/../model/shopModel.php';

        var_dump($dbh);
        getGames($_POST['order']);
    }
    else {
        header('location: ./shop.php');
        exit();
    }