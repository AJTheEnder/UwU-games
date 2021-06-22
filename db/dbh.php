<!--
    * Created on Tue Jun 22 2021
    *
    * Copyright (c) 2021 - Mathéo G & Alex J & Jame FLC - All Right Reserved
    *
    * Licensed under the Apache License, Version 2.0
    * Available on GitHub at https://github.com/Paracetamol56/UwU-game
 -->

<?php

$serverName = "localhost";
$serverPort = "3306";
$dbName = "uwugames";
$dbUsername = "root";
$dbPassword = "";

$dbh;

try
{
    $dbh = new PDO("mysql:host=$serverName;port=$serverPort;dbname=$dbName", $dbUsername, $dbPassword);
}
catch(PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>"; // Affichage du message d'erreur
    die(); // Arrêt du script
}
