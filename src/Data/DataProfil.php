<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Data;

/**
 * Description of Data
 *
 * @author joey.hossaert
 */
class Data extends Connection {
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
    
    public function SelectInfosProfil($numMembres){
        $requete = "SELECT * FROM 'membres' WHERE nummembres = :numeromembres;";
        $prep = $this->pdo->prepare($requete);
        $prep->bindValue(':numeromembres', $numMembres);
        $prep->execute();
        $membres = $prep->fetchAll(PDO::FETCH_ASSOC);
        foreach ($membres[0] as $clef =>$data){
            $this->$clef = $data;
        }
    }
    
    
}
