<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;

/**
 * Class LogicSession
 * @namespace App\Metier
 * 
 * 
 * Contiens la logique relatif au session
 */
class LogicSession extends Logic {
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




?>