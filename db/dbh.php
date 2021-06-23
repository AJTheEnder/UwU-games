<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-games
 -->

<?php

// Server informations
$serverName = "localhost";
$serverPort = "3306";
$dbName = "uwugames";
$dbUsername = "root";
$dbPassword = "";

$dbh;

// Try to connect to database
try
{
    $dbh = new PDO("mysql:host=$serverName;port=$serverPort;dbname=$dbName", $dbUsername, $dbPassword);
}
catch(PDOException $e) {
    // print th error message and stop the script
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}
