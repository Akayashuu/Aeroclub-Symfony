<?php

namespace App\Data;

use App\Data\Connection;

/**
 * Class DataMembres
 * @Namespace App\Data
 * 
 * 
 * Gestion de la table Membres dans la base de données
 */
class DataMembres extends Connection {
    /**
     * Numéro du membre
     */
    private int $numMembres = 0;
    /**
     * Prénom du membre
     */
    private string $prenom = "";
    /**
     * Nom du membre
     */
    private string $nom = "";
    /**
     * Date de naissance du membre
     */
    private string $dateNaissance = "";
    /**
     * Lieu de Naissance du membre
     */
    private string $lieuNaissance = "";
    /**
     * Adresse du membre
     */
    private string $adresse = "";
    /**
     * Code postal du membre
     */
    private string $codePostal = "";
    /**
     * Ville du membres
     */
    private string $ville = "";
    /**
     * Téléphone du membre
     */
    private string $tel = "";
    /**
     * Email du membre
     */
    private string $mail = "";
    /**
     * Profession du membre
     */
    private string $profession = "";
    /**
     * Numéro civil du membre
     */
    private string $numCivil = "";
    /**
     * Numéro de qualification du membre
     */
    private int $numQualif = 0;
    /**
     * Numéro de badge du membre
     */
    private int $numBadge = 0;
    /**
     * Numéro de carte fédérale du membre
     */
    private string $carteFederale = "";
    /**
     * Date théorique bb
     */
    private string $dateTheoriquebb = "";
    /**
     * Date bb
     */
    private string $datebb = "";
    /**
     * Date théorique du planing
     */
    private string $dateTheoriquePlanning = "";
    /**
     * Date du planing
     */
    private string $datePlanning = "";
    /**
     * Mots de passe du membres
     */
    private string $password = "";


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
     * Récupère les données d'un membres en particulier
     * @return array Les données en fonction de l'id
     */
    public function SelectInfosProfil(int $numMembres):array {
        $requete = "SELECT * FROM membres WHERE nummembres = :id;";
        $prep = $this->pdo->prepare($requete);
        $prep->bindValue(':id', $numMembres);
        $prep->execute();
        $membres = $prep->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($membres[0] as $clef =>$data){
            $this->$clef = $data;
        }
        return $membres;
    }

    
}
