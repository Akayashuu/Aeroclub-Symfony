<?php

namespace App\Data;

use App\Data\Connection;

/**
 * Class DataCompteAc
 * @Namespace App\Data
 * 
 * 
 * Gestion de la table comptesAc dans la base de données
 */
class DataCompteAc extends Connection {

    /**
     * Numéro de comptes
     */
    private int $numComptes = 0;

    /**
     * Numéro de membre
     */
    private int $nummembres = 0;

    /**
     * Numéro de séquence
     */
    private int $numseq = 0;
    /**
     * Date
     */
    private string $data = "";
    /**
     * Debit
     */
    private float $debit = 0;
    /**
     * Credit
     */
    private float $credit = 0;
    /**
     * Description
     */
    private string $description = "";
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
     * Récupère la listes des actions sur le comptes du membres
     * @param int|string id The member id
     * @return array L'objets SQL
     */
    public function getAllLineComptesAc(string|int $id):array {
        $query = "SELECT * FROM comptesAc WHERE nummembre = :id;";
        $prep = $this->pdo->prepare($query);
        $prep->bindValue(':id', $id);
        $prep->execute();
        $data = $prep->fetchAll(\PDO::FETCH_ASSOC);
        if(count($data) <= 0) {
            return array();
        }
        return $data;
    }

    
}
