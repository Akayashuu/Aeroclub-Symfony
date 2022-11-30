<?php

namespace App\Data;

use App\Data\Connection;

/**
 * Class DataAvions
 * @Namespace App\Data
 * 
 * 
 * Gestion de la table Avions dans la base de données
 */
class DataAvions extends Connection {

    /**
     * Id de l'avions
     */
    private int $numAvions = 0;
    /**
     * Type de l'avions
     */
    private string $types = "";
    /**
     * Taux double
     */
    private float $tauxdouble = 0;
    /**
     * Forfait numéro 1
     */
    private float $forfait1 = 0;
    /**
     * Forfait numéro 2
     */
    private float $forfait2 = 0;
    /**
     * Forfait numéro 3
     */
    private float $forfait3 = 0;
    /**
     * Reduction semaine 
     */
    private float $reductionsemaine = 0;
    /**
     * L'immatriculation de l'avions
     */
    private string $immatriculation = "";
    /**
     * Image
     */
    private string $image = "";

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Get Properties in the class if she exist
     * @return String Properties 
     */
    public function __get(String $name):String|false {
        return isset($this->$name) ? $this->$name : false;
    }
    
    /**
     * Set Properties magic function
     */
    public function __set(string $name, mixed $value):void {
        isset($this->$name) || $this->$name === null ? $this->$name = $value : "";
    }
    
    /**
     * Get le dernière id input
     * @return string|false Le dernière id input ou false
     */
    public function getLastInsertId():string|false {
        return $this->pdo->lastInsertId();
    }
    

    /**
     * 
     * @return array Liste de tous les avions
     */
    private function getAllAvions():array {

    }

    
}
