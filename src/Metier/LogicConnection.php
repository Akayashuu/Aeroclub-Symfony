<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;


/**
 * Class LogicConnection
 * @namespace App\Metier
 * 
 * 
 * Contiens la logique de la page Connection
 */
class LogicConnection extends Logic {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        if(!session_id()) {
            session_start();
        }   
        if(isset($_COOKIE["auth"]) && isset($_SESSION["jwt"])) {
            header("Location: ".$this->config->defaultDir."/profile");
        }
        $this->files = file_get_contents("./src/View/connection.html");
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
    public function makeView():void {
        echo $this->files;
    }
   
   
}