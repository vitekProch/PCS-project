<?php

namespace Core;

class Router
{
    public $routes = [];

    // Přidává novou trasu do routovacího systému pro GET metodu
    public function get($url, $controller, $callback, $midware = [])
    {
        $this->addRoute($url, $controller, $callback, "GET", $midware);
    }

    // Přidává novou trasu do routovacího systému pro POST metodu
    public function post($url, $controller, $callback)
    {
        $this->addRoute($url, $controller, $callback, "POST");
    }

    // Přidává novou trasu do routovacího systému pro libovolné metody
    public function addRoute($url, $controller, $callback, $http_method, $midware = [])
    {
        $this->routes[$http_method . $url] = [
            'controller' => $controller,
            'callback' => $callback,
            'http_method' => $http_method,
            'midware' => $midware,
        ];
    }

    public function dispatch($url)
    {

        if (!array_key_exists($url, $this->routes)) {
            echo "404 not found";
        }
        
        $route = $this->routes[$url];
        // Pokud některý z middleware vrátí false, přerušíme zpracování

        $middlewareResult = $this->runMiddlewares($route['midware']);
        if (!$middlewareResult['success']) {
            return header('Location: ' . $middlewareResult['redirect']);
        }

        $controller = $this->routes[$url]['controller'];
        $callback = $this->routes[$url]['callback'];

        $controllerInit = new $controller();
        
        $controllerInit->$callback($_POST ? $_POST : []);
    }

    private function runMiddlewares($middlewares)
    {
        foreach ($middlewares as $middleware) {
            $separateParams = explode(':', $middleware);
            $middlewareName = $separateParams[0];
            $middlewareParam = $separateParams[1];

            $middlewareClass = "App\\Middlewares\\" . $middlewareName;
            $middlewareInstance = new $middlewareClass();
    
            $result = $middlewareInstance->$middlewareName($middlewareParam);
            
            if (!$result['success']) {
                return ['success' => false, 'redirect' => $result['redirect']];
            }
        }

        return ['success' => true];
    }
    
}
