<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;

/**
 * Class LogicAccueil
 * @namespace App\Metier
 * 
 * 
 * Contiens la logique de la page Accueil
 */
class LogicAccueil extends Logic  {
    /**
     * Contenu de la page
     */
    private string $content;
    /**
     * Tableau d'argument dans la page à remplacer
     */
    private array $table;

    /**
     * Constructeur
     */
    public function __construct() {
        parent::__construct();
        $this->content = file_get_contents("./src/View/accueil.html");
        $this->table = Array(
            "#CONTENT#"=>$this->content
        );
        $this->makeView();
    }
       
    /**
     * Get Properties in the class if she exist
     * @return String Properties 
     */
    public function __get(String $name):String {
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
    private function makeView():void {
        $this->files = strtr($this->files, $this->table);
        echo $this->files;
    }
   
   
}