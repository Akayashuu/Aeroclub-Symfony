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
    private $dbname = "aeroclub";
    /**
     * Host 
     * (localhsot dans notre cas) sinon une IP
     */
    private $host = 'localhost';
    /**
     * Login du compte de la bdd
     */
    private $log = 'app';
    /**
     * Mot de passe du compte de la bdd
     */
    private $mdp = 'ua95qI0eTN^Y8@99a8@a5pF3Tyw96';
    /**
     * Port de la bdd
     */
    private $port = '5432';

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


