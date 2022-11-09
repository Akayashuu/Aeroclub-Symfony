<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;






class LogicAuth extends Logic {


    public function __construct() {

    }



    public function verify() {
        
    }

    public function encrypt($string) {
        $ciphering = "BF-CBC";
        // Use OpenSSl encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        // Use random_bytes() function which gives
        // randomly 16 digit values
        $encryption_iv = random_bytes($iv_length);
        // Alternatively, we can use any 16 digit
        // characters or numeric for iv
        $encryption_key = openssl_digest(php_uname(), 'MD5', TRUE);
        // Encryption of string process starts
        $encryption = openssl_encrypt($string, $ciphering,$encryption_key, $options, $encryption_iv);
        return $encryption;
    }

    public function decrypt($encryption) {
        $ciphering = "BF-CBC";
        // Use OpenSSl encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
        // Decryption of string process starts
        // Used random_bytes() which gives randomly
        // 16 digit values
        $decryption_iv = random_bytes($iv_length);
        // Store the decryption key
        $decryption_key = openssl_digest(php_uname(), 'MD5', TRUE);
        // Descrypt the string
        $decryption = openssl_decrypt ($encryption, $ciphering,$decryption_key, $options, $encryption_iv);
        return $decryption;
    }

}









?>