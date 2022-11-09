<?php

namespace App\Config;


class ConfigWeb {

    private $defaultDir="/aeroclub";

    public function __construct() {}
    
    public function __get($name) {
        return isset($this->$name) ? $this->$name : false;
    }
}