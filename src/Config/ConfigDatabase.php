<?php

namespace App\Config;


class ConfigDatabase {

    private $dbname = "aeroclub";
    private $host = 'localhost';
    private $log = 'app';
    private $mdp = 'ua95qI0eTN^Y8@99a8@a5pF3Tyw96';
    private $port = '5432';


    public function __construct() {}
    
    public function __get($name) {
        return isset($this->$name) ? $this->$name : false;
    }
}


