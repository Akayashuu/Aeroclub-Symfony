<?php
Namespace App\Data;

use App\Config\ConfigDatabase;


class Connection {
    // Constructeur qui load l'objet de base de données
    protected $pdo;
    public function __construct() {
        $this->pdo = $this->bddConnexion();
    }


    // créateur de l'objet PDO
    protected function bddConnexion() {
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

    /**
     * Getteur magique
     */
    public function __get($name) {
        return isset($this->$name) ? $this->$name : false;
    }
   
}
    

?>
    

    