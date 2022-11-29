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
        $this->files = file_get_contents("./src/View/connection.html");
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
    public function makeView():void {
        echo $this->files;
    }
   
   
}