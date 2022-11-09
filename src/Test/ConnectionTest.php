<?php
namespace App\Test;
use App\Data\Connection;

class ConnectionTest {
    private $data;
    
    public function __construct() {
        $this->data = new Connection();
        var_dump($this->data);
        if($this->data->pdo == false) {
            throw new \ErrorException("Erreur de connection a la base de données");
        } else {
            echo "Test de connection passé !";
        }
    }
}
