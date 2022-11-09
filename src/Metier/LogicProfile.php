<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;

class LogicProfile extends Logic {

    public function __construct() {
        parent::__construct();
        $this->files = file_get_contents("./src/View/body.html");
        $this->content = file_get_contents("./src/View/accueil.html");
        $this->connectionFiles = file_get_contents("./src/View/connection.html");
        $this->tableProfile = Array(
            "#LINKACC#"=>$this->config->defaultDir."/",
            "#CONTENT#"=>$this->content,
            "%LINKCONNECTION%"=>$this->getButtonConPro(),
            "%TXTBUTTONPROFILE%"=>$this->getButtonText(),
            "%LINKPROFILE%"=>$this->config->defaultDir."/profile",
            "%LINKPLANESLIST%"=>$this->config->defaultDir."/avions",
        );
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
            $this->files = strtr($this->files, $this->tableProfile);
            echo $this->files;
    }
   
   
}