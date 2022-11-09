<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;

class LogicConnection extends Logic {

    public function __construct() {
        parent::__construct();
        $this->files = file_get_contents("./src/View/connection.html");
        $this->makeView();
    }
       
    public function __get($name) {
        return isset($this->$name) ? $this->$name : false;
    }
   
    // setteur magique
    public function __set($name, $value) {
        return isset($this->$name) ? $this->$name = $this->$name = $value : false;
    }


    
   

    public function makeView() {
        echo $this->files;
    }
   
   
}