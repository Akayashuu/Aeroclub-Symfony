<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;


/**
 * Class LogicAvions
 * @namespace App\Metier
 * 
 * 
 * Contiens la logique de la page Avions
 */
class LogicAvions extends Logic {
    /**
     * Contenu de la page
     */
    private string $content;
    /**
     * Tableau d'argument dans la page à remplacer
     */
    private array $table;
    /**
     * Liste des avions
     */
    private array $contentTable;

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->contentTable = Array(
            "%firstCard%"=>$this->getCard(0),
            "%secondCard%"=>$this->getCard(1),
        );
        $this->content = file_get_contents("./src/View/avions.html");
        $this->content = strtr($this->content, $this->contentTable);
        $this->table = Array(
            "#CONTENT#"=>$this->content,
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
     * Créer les cartes HTML 
     * @param string|int $id Id de la carte dans le json
     * @return string Renvoie l'HTML de la carte
     */
    private function getCard(string|int $id):string {
        $json = file_get_contents("./src/View/assets/json/card.json");
        $card = json_decode($json, true)[$id];
        $k = "<div class='card'> <div class='card-image'> <figure class='image is-4by3'><img src='$card[imagePath]' alt='Placeholder image'></figure></div></div>";
        $k = $k . "<br><article class='message is-dark'> <div class='message-header'><p>$card[name]</p></div><div class='message-body'>$card[description]</div></article>";
        return $k;
    }

    /**
     * Renvoie la vu au client
     */
    private function makeView():void {
        $this->files = strtr($this->files, $this->table);
        echo $this->files;
    }
   
   
}

?>