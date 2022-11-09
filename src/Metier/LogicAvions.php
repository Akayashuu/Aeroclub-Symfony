<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;

class LogicAvions extends Logic {

    private $contentTable;

    public function __construct() {
        parent::__construct();
        $this->contentTable = Array(
            "%firstCard%"=>$this->getCard(0),
            "%secondCard%"=>$this->getCard(1),
        );
        $this->files = file_get_contents("./src/View/body.html");
        $this->content = file_get_contents("./src/View/avions.html");
        $this->content = strtr($this->content, $this->contentTable);
        $this->table = Array(
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
   

    public function getCard($id) {
        $json = file_get_contents("./src/View/assets/json/card.json");
        $card = json_decode($json, true)[$id];
        $k = "<div class='card'> <div class='card-image'> <figure class='image is-4by3'><img src='$card[imagePath]' alt='Placeholder image'></figure></div></div>";
        $k = $k . "<br><article class='message is-dark'><div class='message-body'>$card[description]</div></article>";
        return $k;
    }


    public function makeView() {
        $this->files = strtr($this->files, $this->table);
        echo $this->files;
    }
   
   
}

?>