<?php
namespace App\Metier;
use App\Config\ConfigWeb;
use App\Metier\Logic;
use App\Metier\LogicCookie;
use App\Metier\LogicSession;
use Firebase\JWT\JWT;
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
        if($this->auth) {
            $this->setAuthTokenFromConnection();
        }
    }
    

    /**
     * Retourne les données du membres en fonction du mots de passe et de l'email
     * @return array Les données
     */
    private function getMemberData():array {
        $r;
        $t = new DataMembres();
        $data = $t->getUserFromHisPasswordAndEmail($this->email);
            if(count($data)>= 1) {
                return $data[0];
            }
        return array();
    }

    /**
     * Vérifie si le mots de passe est le bon
     */
    public function authentification():bool {
        return (password_verify($this->password, $this->data["password"]) && $this->email == $this->data["email"]) ? true : false;
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
     * Procédure : 
     * Première étape : On init une SESSION
     * Seconde étape : On génère une clef random pour généré le tokene JWT
     * Troisième étape on génère des DateTimeImmutable au format UNIX
     * Quatrième étape On créer le payload avec les data du token
     * Dernière étape on insert dans la session les données et on renvoie le token à l'user dans un cookie
     */
    public function setAuthTokenFromConnection():void {
        $instanceSession = new LogicSession();
            $instanceSession->initSession();
        $instanceCookie = new LogicCookie();
        $key = $this->getRandomKey();
        $secretKey  = 'PPRGcMp1GgXz8WpQqpPeepR7uScV0hb7';
        $issuedAt   = new \DateTimeImmutable();
        $expire     = $issuedAt->modify('+15 minutes')->getTimestamp();      // Ajoute 15 minutes
        $data = [
            'iat'  => $issuedAt->getTimestamp(),         // Issued at:  : heure à laquelle le jeton a été généré
            'iss'  => "localhost",                     // Émetteur
            'nbf'  => $issuedAt->getTimestamp(),         // Pas avant..
            'exp'  => $expire,                           // Expiration
            'userName' => $this->email,                     // Nom d'utilisateur
        ];
        $jwt = JWT::encode($data, $key, 'HS256');
            $instanceCookie->setAuthCookie($jwt);
        $_SESSION["key"] = $key;
        $_SESSION["jwt"] = $jwt;
        $_SESSION["userid"] = $this->data["nummembres"];
    }

    /**
     * Récupère une clef random
     * @return string La clef
     */
    private function getRandomKey():string {
        $n = rand(10, 30);
        $result = bin2hex(random_bytes($n));
        return $result;
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

$ks = array(
    "result"=>$k->auth
);
echo json_encode($ks);





?>