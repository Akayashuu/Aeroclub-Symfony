<?php
namespace App\Metier;
use App\Config\ConfigWeb;


/**
 * Class Logic
 * @namespace App\Metier
 * 
 * 
 * Contiens la logique commune à tous les logiques des pages
 * + Gère l'update du body
 */
class Logic {
    /**
     * Composant Logoff HTML
     */
    private string $logoffComposent;
    /**
     * Le fichier body soit l'entete de la page et le footer
     */
    protected string $files;
    /**
     * Les congig web par défaut
     */
    protected ConfigWeb $config;
 
    /**
     * Constructor
     */
    public function __construct() {
        $this->files = file_get_contents("./src/View/body.html");
        $this->logoffComposent = file_get_contents("./src/View/components/logoff.html");
        $this->config = new ConfigWeb();
        $this->logOff();
        $this->bodyUpdate();
    }   


    /**
     * Modifie les element présent sur le body
     * @return string Renvoie le fichier modifier avec les element de base
     */
    private function bodyUpdate():string {
        $a = array(
            "#LINKACC#"=>$this->config->defaultDir."/",
            "#LINKCONNECTION#"=>$this->getButtonConPro(),
            "#TXTBUTTONPROFILE#"=>$this->getButtonText(),
            "#LINKPROFILE#"=>$this->config->defaultDir."/profile",
            "#LINKPLANESLIST#"=>$this->config->defaultDir."/avions",
            "#LOGOFF#"=>$this->sessionChecker() == true ? $this->logoffComposent : "",
        );
        $this->files = strtr($this->files, $a);
        return $this->files;
    }
       

    /**
     * Update le composant avant de l'envoyer à la page
     */
    private function logOff():void {
        $arr = array( 
            "#LINKLOGOFF#"=>$this->config->defaultDir."/logoff"
        );
        $this->logoffComposent = strtr($this->logoffComposent, $arr);
    }

    /**
     * Récupère la bonne redirection en fonction de si l'utilisateur est connecté 
     * @return string Le liens du button
     */
    protected function getButtonConPro():string {
        if($this->sessionChecker() == false) {
            return $this->config->defaultDir."/connection";
        } else {
            return $this->config->defaultDir."/profile";
        }
    }

    /**
     * Récupère le bon texte en fonction de si l'utilisateur est connecté 
     * @return string Le texte du button
     */
    protected function getButtonText():string {
        if($this->sessionChecker() == false) {
            return "Connection";
        } else {
            return "Profile";
        }
    }

    protected function sessionChecker() {
        if(!session_id()) {
            session_start();
        }
        if(isset($_SESSION["jwt"]) && isset($_COOKIE["auth"])) {
            return $_SESSION["jwt"] == $_COOKIE["auth"];    
        }
        return false;
    }
   
   
}