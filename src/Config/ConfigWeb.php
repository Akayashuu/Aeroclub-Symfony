<?php

namespace App\Config;



/**
 * Class de configuration web
 * @Namespace App\Config
 * 
 * Fonctionnement de la classe :
 * 
 * Elle contiens le chemin par défaut ou se trouve le site dans l'arbo
 */
class ConfigWeb {

    /**
     * Chemin par défault
     */
    private String $defaultDir="/aeroclub";

    /**
     * Constructor
     */
    public function __construct() {
        $string = file_get_contents("./src/Config/json/configWeb.json");
        $json = json_decode($string, true);
        $this->defaultDir = $json["defaultPath"];
    }

    /**
     * Get Properties in the class if she exist
     * @return String|false Properties 
     */
    public function __get(String $name):String|false {
        return isset($this->$name) ? $this->$name : false;
    }
}