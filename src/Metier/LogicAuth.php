<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;
use App\Metier\LogicSession
;
use App\Data\DataMembres;
require '../../vendor/autoload.php';

/**
 * Class LogicAuth
 * @namespace App\Metier
 * 
 * 
 * Contiens la logique relatif à l'authentification
 */
class LogicAuth extends Logic {

    /**
     * The input password
     */
    private string $password;
    /**
     * The input email 
     */
    private string $email;
    /**
     * The member Data
     */
    private array $data;
    /**
     * Auth check
     */
    private bool $auth;
    /**
     * Constructor
     * @param string $paswword The user password
     * @param string $email The user email
     */
    public function __construct(string $password, string $email) {
        $this->password = $password;
        $this->email = $email;
        $this->data = $this->getMemberData();
        $this->auth = $this->authentification();
    }
    

    /**
     * Retourne les données du membres en fonction du mots de passe et de l'email
     * @return array Les données
     */
    private function getMemberData():array {
        $t = new DataMembres();
        $data = $t->getUserFromHisPasswordAndEmail($this->email);
        return $data[0];
    }

    /**
     * Vérifie si le mots de passe est le bon
     */
    public function authentification() {
        return password_verify($this->password, $this->data["password"]) && $this->email == $this->data["email"] ? true : false;
    }

    /**
     * Retourn le mots de passé hash
     * @return string Le mot de passe hashé
     */
    private function getHashPassword(string $password):string {
        return password_hash($password, PASSWORD_DEFAULT);
    }
       
    /**
     * Get Properties in the class if she exist
     * @return String Properties 
     */
    public function __get(String $name):String|false {
        return isset($this->$name) ? $this->$name : false;
    }

    /**
     * Active la session
     * @return bool
     */
    private function initSession():bool {
        if(!session_id()) {
            session_start();
            session_regenerate_id();
            return true;
        }
        return false;
    }

    /**
     * Détruit la session
     */
    private function destroySession():void {
        session_unset();
        session_destroy();
    }
    
}


$password = "";
$email = "";
if($_POST) {
    $password = htmlspecialchars($_POST["password"]);
    $email = htmlspecialchars($_POST["email"]);
    if(!$email || !$password) return;
}


$k = new LogicAuth($password, $email);

echo json_encode($k->auth);





?>