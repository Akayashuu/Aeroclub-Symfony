<?php

namespace App\Controller;
use App\Metier\LogicAccueil;
use App\Metier\LogicProfile;
use App\Metier\LogicAvions;
use App\Metier\LogicConnection;


class Controller {
    
    
    public function __construct() {

    }

    static function default() {
        $k = new LogicAccueil();
    }

    static function profile() {
        $k = new LogicProfile();
    }

    static function avions() {
        $k = new LogicAvions();
    }

    static function connection() {
        $k = new LogicConnection();
    }

}