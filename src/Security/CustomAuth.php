<?php


namespace App\Security;

use App\Entity\Permissions;
use App\Repository\MembresRepository;
use App\Repository\PermissionsRepository;
use Symfony\Component\HttpFoundation\Request;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CustomAuth {

    private string $raw_password;
    private string $hashed_password;
    private string $email;
    private MembresRepository $membreRepository;
    private Request $request;
    private mixed $data;

    public function __construct(string $password, string $email,  MembresRepository $mbRepo, Request $request) 
    {
        $this->raw_password = $password;
        $this->hashed_password = $this->getHashPassword($password);
        $this->email = $email;
        $this->membreRepository = $mbRepo;
        $this->request = $request;
        $this->data = $this->membreRepository->findByEmailAuth($email)[0] ?? null;
    }

    public function loadAuthentication():Response {
        $session = $this->request->getSession();
        $key = $this->getRandomKey();
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
        $response = new Response();
        $session->set('key', $key);
        $session->set('jwt', $jwt);
        $session->set('userid', $this->data["numMembres"]);
        $cookie = new Cookie("auth", $jwt, time() + (86400), "/");
        $response->setStatusCode(Response::HTTP_FOUND);
        $response->headers->set('Location', '/profile');
        $response->headers->setCookie($cookie);
        return $response->sendHeaders();;
    }
    
    public function authentification() {
        return (password_verify($this->raw_password, $this->data["password"]) && $this->email == $this->data["email"]) ? true : false;
    }

    private function getHashPassword(string $password):string {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    private function getRandomKey():string {
        $n = rand(10, 30);
        $result = bin2hex(random_bytes($n));
        return $result;
    }

    static function isConnected(Request $request) {
        $session = $request->getSession();
        $jwt = $session->get("jwt");
        return (isset($_COOKIE["auth"]) && isset($jwt) && $jwt == $_COOKIE["auth"]);
    }
    
    static function hasPermission($t, array $requiredPermission, Request $request, PermissionsRepository $permissionsRepository) {
        $session = $request->getSession();
        $memberId = $session->get("userid");
        $permission = $permissionsRepository->findOneBy(["numMembres" => $memberId]); 
        if($permission != null) {if($permission->isIsAdmin()) {return true;}};
        if($permission == null) {return false;}
        foreach($requiredPermission as $perm) {
            $k = "is".$perm;
            if(!$permission->$k()) {
                return false;
            }
        }
        return true;
    }
}
