<?php

namespace App\Config;


/**
 * Class de configuration de base de données
 * @Namespace App\Config
 * 
 * Fonctionnement de la classe :
 * 
 * Elle contiens tous les informations demandé par PDO pour se connecter au SGBDR
 */
class ConfigDatabase {

    /**
     * Nom de la base de données
     */
    private String $dbname = "aeroclub";
    /**
     * Host 
     * (localhsot dans notre cas) sinon une IP
     */
    private String $host = 'localhost';
    /**
     * Login du compte de la bdd
     */
    private String $log = 'app';
    /**
     * Mot de passe du compte de la bdd
     */
    private String $mdp = 'ua95qI0eTN^Y8@99a8@a5pF3Tyw96';
    /**
     * Port de la bdd
     */
    private String $port = '5432';

    /**
     * Constructor
     */
    public function __construct() {

    }
    
    /**
     * Get Properties in the class if she exist
     * @return String Properties 
     */
    public function __get(String $name):String {
        return isset($this->$name) ? $this->$name : false;
    }
}


