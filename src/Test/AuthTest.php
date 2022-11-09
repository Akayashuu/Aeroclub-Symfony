<?php
namespace App\Test;
use App\Metier\LogicAuth;



class AuthTest {

    public function __construct() {
        $k = new LogicAuth();
        echo $var = $k->encrypt("44444");
        echo $k->decrypt($var);
    }
}