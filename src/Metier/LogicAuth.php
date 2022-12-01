<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;
use App\Data\DataMembres;

require 'Logic.php';

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
     * Constructor
     * @param string $paswword The user password
     * @param string $email The user email
     */
    public function __construct(string $password, string $email) {
        $this->password = $this->getHashPassword($password);
        $this->email = $email;
    }
    

    private function getMemberData():array {
        $t = new DataMembres();
        $data = $t->getUserFromHisPasswordAndEmail($this->password, $this->email);
        return $data;
    }


    private function getHashPassword(string $password):string {
        return password_hash($password, PASSWORD_BCRYPT);
    }

}



if($_POST) {
    $password = htmlspecialchars($_POST("password"));
    $email = htmlspecialchars($_POST("email"));
    if(!$email || !$password) return;
}


new LogicAuth($paswword, $email);

echo json_encode($_POST);





?>