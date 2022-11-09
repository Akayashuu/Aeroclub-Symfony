<?php
Namespace App\Data;

use App\Config\ConfigDatabase;

require './vendor/autoload.php';

class Connection {
    
    // Constructeur qui load l'objet de base de données
    public $pdo;
    public function __construct() {
        $this->pdo = $this->bddConnexion();
    }
    // créateur de l'objet PDO
    private function bddConnexion() {
        $e = new ConfigDatabase();
        try {
            $dbh = new \PDO("pgsql:host=$e->host;port=$e->port;dbname=$e->dbname", $e->log, $e->mdp);
        } catch (Exception $ex) {
            $dbh = $dbh = false;
            print("Erreur de connection à la base de donnée !". $ex->getMessage() . "<br>");    
            die();
        }
        return $dbh;
    }
   
}
    

?>
    

    