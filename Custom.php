<?php
class Router {
    private $routes = [];

    public function add($route, $callback) {
        $this->routes[$route] = $callback;
    }

    public function dispatch($uri) {
        if (array_key_exists($uri, $this->routes)) {
            call_user_func($this->routes[$uri]);
        } else {
            echo "404 Not Found";
        }
    }
}

$router = new Router();
$router->add("/", function() { echo "Welcome to the Home Page!"; });
$router->add("/about", function() { echo "About Us Page"; });

$router->dispatch($_SERVER['REQUEST_URI']);
?>
