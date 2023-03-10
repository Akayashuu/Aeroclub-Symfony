<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;
use App\Data\DataMembres;


/**
 * Class LogicProfile
 * @namespace App\Metier
 * 
 * 
 * Contiens la logique de la page Profile
 */
class LogicProfile extends Logic {
    /**
     * Config web
     */
    protected ConfigWeb $config;
    /**
     * Contenu de la page
     */
    private string $content;
    /**
     * Fichier HTML de Profile
     */
    private string $profileFiles;
    /**
     * Fichier HTML de Profile
     */
    private string $connectionFiles;
    /**
     * Tableau d'argument dans la page à remplacer
     */
    private array $table;

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct("./src/View/bodyNoHeroBody.html");
        $this->config = new ConfigWeb();
        if(!session_id()) {
            session_start();
        }
        if((!$_COOKIE["auth"]) || $_COOKIE["auth"] != $_SESSION["jwt"] || !$_SESSION) {
            session_unset();
            session_destroy();
            header("Location: ".$this->config->defaultDir."/");
        }
        $this->content = file_get_contents("./src/View/accueil.html");
        $this->connectionFiles = file_get_contents("./src/View/connection.html");
        $this->profileFiles = file_get_contents("./src/View/profil.html");
        $this->updateProfile();
        $this->table = Array(
            "#CONTENT#"=>$this->content,
        );
        $this->makeView();
    }
       
    /**
     * Get Properties in the class if she exist
     * @return String|false Properties 
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
     * Renvoie la vu au client
     */
    public function makeView() {
        $this->files = strtr($this->files, $this->table);
        echo $this->files;
    }

    /**
     * Fait l'update des varriables dans le code HTML pour la vue
     */
    private function updateProfile():void {
        $v = $this->ProfileData();
        if(count($v) <= 0) {
            $sessionHandler = new LogicSession();
                $sessionHandler->initSession();
                $sessionHandler->destroySession();
            $config = new ConfigWeb();
            $cookieHandler = new LogicCookie();
                $cookieHandler->setAuthCookie(null);
            header("Location: ".$config->defaultDir."/");
        }
        $v = $v[0];
        $a = array();
        foreach($v as $k => $s) {
            $a["#".strtoupper($k)."#"] = $s;
        }
        $this->content = strtr($this->profileFiles, $a);
    }

    /**
     * Récupère les données depuis la base de données
     * @return array les données
     */
    private function ProfileData():array {
        $t = new DataMembres();
        $d = $t->SelectInfosProfil($_SESSION["userid"]);
        return $d;
    }
   
   
}