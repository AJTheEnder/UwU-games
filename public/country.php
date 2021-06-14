<?php
require_once __DIR__ . '/../database/db.php';
require_once __DIR__ . '/../model/cities.php';
require_once __DIR__ . '/../controller/CountryController.php';

$Database = new Database(
    "127.0.0.1",
    "citytowns",
    "root",
    "",
    
);
$model = new CityModel($Database);
$controller =  new CountryController($model);
$controller->countryHandler();