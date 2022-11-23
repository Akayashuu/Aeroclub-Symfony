<?php

namespace App\Data;

use App\Data\Connection;

class DataMembres extends Connection {
    protected $numMembres="";
    protected $prenom="";
    protected $nom="";
    protected $dateNaissance="";
    protected $lieuNaissance="";
    protected $adresse="";
    protected $codePostal="";
    protected $ville="";
    protected $tel="";
    protected $mail="";
    protected $profession="";
    protected $numCivil="";
    protected $numMembre="";
    protected $numBadge="";
    protected $carteFederale="";
    protected $dateTheoriquebb="";
    protected $datebb="";
    protected $dateTheoriquePlanning="";
    protected $datePlanning="";


    public function __construct() {
        parent::__construct();
    }

    public function __get($name) 
    {
        if(isset($this->$name))
            return $this->$name;
        
    }
    
    public function __set($name, $value) 
    {
        if(isset($this->$name) || $this->$name === null) $this->$name = $value;
        
    }
    
    public function getLastInsertId(){
        return $this->pdo->lastInsertId();
    }
    
    public function SelectInfosProfil($numMembres) {
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
