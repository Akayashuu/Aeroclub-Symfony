<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;
use App\Data\DataMembres;

class LogicProfile extends Logic {

    private $profileFiles;
    private $tableProfile;

    public function __construct() {
        parent::__construct();
        $this->files = file_get_contents("./src/View/body.html");
        $this->content = file_get_contents("./src/View/accueil.html");
        $this->connectionFiles = file_get_contents("./src/View/connection.html");
        $this->profileFiles = file_get_contents("./src/View/profil.html");
        $this->updateProfile();
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


    private function updateProfile() {
        $v = $this->ProfileData()[0];
        $a = array();
        foreach($v as $k => $s) {
            $a["#".strtoupper($k)."#"] = $s;
        }
        $this->content = strtr($this->profileFiles, $a);
    }

    private function ProfileData() {
        $t= new DataMembres();
        $d = $t->SelectInfosProfil(1);
        return $d;
    }
   
   
}