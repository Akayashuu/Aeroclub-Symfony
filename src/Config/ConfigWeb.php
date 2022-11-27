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
    private $defaultDir="/aeroclub";

    /**
     * Constructor
     */
    public function __construct() {}
    
    /**
     * Getter magique
     */
    public function __get($name) {
        return isset($this->$name) ? $this->$name : false;
    }
}