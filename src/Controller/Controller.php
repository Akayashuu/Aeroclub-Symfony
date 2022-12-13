<?php

namespace App\Controller;
use App\Metier\LogicAccueil;
use App\Metier\LogicProfile;
use App\Metier\LogicAvions;
use App\Metier\LogicConnection;
use App\Metier\Logic;
use App\Metier\LogicSession;
use App\Metier\LogicCookie;
use App\Config\ConfigWeb;



/**
 * Class controller 
 * @Namespace App\Controller
 * 
 * Elle fait la redirection des pages
 * 
 * Default => URL : / [Page Accueil]
 * Profile => URL : /profile [Page Profile]
 * Avions => URL : /avions [Page Avions]
 * Connection => URL : /connection [Page Connection]
 * 
 */
class Controller {
    
    /**
     * Constructor
     */
    public function __construct() {}

    /**
     * Default redirection
     */
    static function default():void {
        $k = new LogicAccueil();
    }

    /**
     * Profile redirection
     */
    static function profile():void {
        $k = new LogicProfile();
    }

    /**
     * Avions redirection
     */
    static function avions():void {
        $k = new LogicAvions();
    }

    /**
     * Connection redirection
     */
    static function connection():void {
        $k = new LogicConnection();
    }

    /**
     * Gère la deconnection
     */
    static function logoff():void {
        /**
         * Destruction de session
         */
        $sessionHandler = new LogicSession();
            $sessionHandler->initSession();
            $sessionHandler->destroySession();
        $config = new ConfigWeb();
        /**
         * Set le cookie à nul
         */
        $cookieHandler = new LogicCookie();
            $cookieHandler->setAuthCookie(null);
        header("Location: ".$config->defaultDir."/");
    }

}