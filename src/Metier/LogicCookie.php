<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;

/**
 * Class LogicCookie
 * @namespace App\Metier
 * 
 * 
 * Contiens la logique relatif au Cookie
 */
class LogicCookie extends Logic {
    /**
     * Constructor
     */
    public function __construct() {}
    
    /**
     * Get Properties in the class if it exist
     * @return String Properties 
     */
    public function __get(String $name):String|false {
        return isset($this->$name) ? $this->$name : false;
    }

    /**
     * Set le cookie d'auth pour vérifier si l'utilisateurs est le bon
     * @param string token The token
     */
    public function setAuthCookie(string|null $token) {
        setcookie("auth", $token, time() + (900), "/"); // 86400 = 1 day
    }
    
}




?>