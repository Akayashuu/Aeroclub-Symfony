<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;
use App\Data\DataAvions;


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
            "#CARD#"=>$this->getCard(),
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
     * Créer les cartes HTML 
     * @param string|int $id Id de la carte dans le json
     * @return string Renvoie l'HTML de la carte
     */
    private function getCard():string {
        $str = "";
        $t = new DataAvions();
        $data = $t->getAllAvions();
        foreach($data as $card) {
            $str .= "<div class='column is-half'><br><div class='card'> <div class='card-image'> <figure class='image is-4by3'><img src='/aeroclub/src/View/assets/images/$card[image]' alt='Placeholder image'></figure></div></div>";
            $str .= "<br><article class='message is-dark'> <div class='message-header'><p>$card[name]</p></div><div class='message-body'>$card[description]</div></article><br></div>";
        }
        return $str;
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