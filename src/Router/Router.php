<?php 

Namespace App\Router;

/**
 * Class Router
 * @Namespace App\Router;
 * 
 * 
 * Elle gère les liens, elle affiche les bonnes pages en fonction de l'url
 */
class Router {
    /**
     * La liste des routes existante 
     *  */
    private $routes;
    /**
     * Le chemin par défaut
     */
    private $defaultDir;

    /**
     * @param string $path Le chemin 
     * @param string $action la fonction executé
     */
    public function register(string $path, callable $action): void
    {
        $this->routes[$path] = $action;
    }

    /**
     * Résous l'url, Elle vérifie si le liens existe dans quel cas elle renvoie sur le liens sinon elle renvoie sur le default soit /
     * @param string $url L'url actuelle
     * @return callable|null la fonction qu'elle doit appeller 
     */
    public function resolve(string $uri):callable|null
    {
        $uri = $uri = str_replace($this->defaultDir, "", $uri);
        $path = explode('?', $uri)[0];
        $path = rtrim($path, "/");
        $action = $this->routes[$path] ?? null;
        if (!is_callable($action)) {
            $action = $this->routes["/"] ?? null;
            return  $action();
        }
        return $action();
    }

    /**
     * Set le dir par défaut ou se trouve l'app
     * @param string $defaultDir Le / par défaut à configurer pour éviter les problèmes avec l'arbo
     */
    public function setDefaultDir(string $defaultDir):void {
        $this->defaultDir = $defaultDir;
    }
}