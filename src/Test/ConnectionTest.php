<?php
namespace App\Test;
use App\Data\Connection;

/**
 * Class ConnectionTest
 * @namespace App\Test;
 *
 * Class de test d'authentification à la base de données 
 */
class ConnectionTest {
    private $data;
    
    public function __construct() {
        $this->data = new Connection();
        if($this->data->pdo == false) {
            throw new \ErrorException("Erreur de connection a la base de données");
        } else {
            echo "Test de connection passé !";
        }
    }
}
