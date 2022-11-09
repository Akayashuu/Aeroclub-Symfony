<?php
namespace App\Metier;
use App\Config\ConfigWeb;

class Logic {
    protected $files;
    protected $data;
    protected $table;
    protected $content;
    protected $config;
 

    public function __construct() {
        $this->config = new ConfigWeb();
    }
       

    protected function getButtonConPro() {
        if($this->sessionChecker() == false) {
            return $this->config->defaultDir."/connection";
        } else {
            return $this->config->defaultDir."/profile";
        }
    }

    protected function getButtonText() {
        if($this->sessionChecker() == false) {
            return "Connection";
        } else {
            return "Profile";
        }
    }

    protected function sessionChecker() {
        return false;    
    }
   
   
}