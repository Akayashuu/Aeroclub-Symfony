<?php
Namespace App\Data;

use App\Config\ConfigDatabase;

/**
 * Class de connection à la base de données
 * @Namespace App\Data
 * Fonctionnement de la classe :
 * 
 * Une fois instancier elle fait appelle à la class configDatabase pour récupérer dbname, log (login), mdp (password) et host (ip)
 * Ensuite elle essaye la connection avec les parametre données 
 * Dans le cas ou tout se passe bien elle renvoie l'objet PDO sinon elle renvoie une erreur est clos la connection
 * 
 * NOTE : 
 * 
 * SGBDR utilisé : Postgres
 * Langage utilisé : PHP
 *
 */
class Connection {
    /**
     * PDO instance
     */
    protected \PDO $pdo;


    /**
     * Constructor
     */
    public function __construct() {
        $this->pdo = $this->bddConnexion();
    }

    /**
     * Créer l'instance de class PDO 
     * @return \PDO|false Une instance PDO ou false;
     */
    protected function bddConnexion():\PDO|false {
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
     * Get Properties in the class if she exist
     * @return String Properties 
     */
    public function __get(String $name):String {
        return isset($this->$name) ? $this->$name : false;
    }
}

    

    