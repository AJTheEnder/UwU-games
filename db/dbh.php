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
