<?php
namespace App\Test;
use App\Data\DataMembres;

class DataMembresTest {
    private $data;
    
    public function __construct() {
        $this->data = new DataMembres();
        if($this->data->pdo == false) {
            throw new \ErrorException("Erreur de connection a la base de données");
        } else {
            echo "Test de connection passé !";
        }
        try {
            $t = $this->data->SelectInfosProfil(1);
            var_dump($t);
        } catch(e) {
            var_dump("error");
        }
    }
}
