<?php

require_once __DIR__ . '/../controller/CityController.php';
require_once __DIR__ . '/../model/cities.php';
require_once __DIR__ . '/../database/db.php';


class Routing
{
    private $app;

    /**
     * Routing constructor
     * @param App $app
     */
    public function __construct(App $app){
        $this->app = $app;
    }
   
    public function setup(){
        $this->app->get('/', function(){
            
            $controller =  new CityController($this->setModel('CityModel',$this->setupDatabase()));
            $controller->citiesHandler();
        });

        $this->app->get('/city/(\d+)', function($id){
            
            $controller =  new CityController($this->setModel('CityModel',$this->setupDatabase()));
            $controller->cityHandler($id);
        });


    }

    private function setupDatabase() : Database{
        return new Database(
            "127.0.0.1",
            "citytowns",
            "root",
            "",
            
        );
    }

    private function setModel(string $modelName, Database $database){
        return new $modelName($database);

    }
}