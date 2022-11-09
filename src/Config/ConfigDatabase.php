<?php

namespace App\Config;


class ConfigDatabase {

    private $dbname = "aeroclub";
    private $host = '192.168.76.31';
    private $log = 'leo';
    private $mdp = 'aeroleo';
    private $port = '5432';


    public function __construct() {}
    
    public function __get($name) {
        return isset($this->$name) ? $this->$name : false;
    }
}


