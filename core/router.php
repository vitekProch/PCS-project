<?php

namespace Core;

class Router
{
    public $routes = [];

    // Přidává novou trasu do routovacího systému pro GET metodu
    public function get(string $url, string $controller, string $callback, array $midware = [])
    {
        $this->addRoute($url, $controller, $callback, "GET", $midware);
    }

    // Přidává novou trasu do routovacího systému pro POST metodu
    public function post(string $url, $controller, $callback)
    {
        $this->addRoute($url, $controller, $callback, "POST");
    }

    // Přidává novou trasu do routovacího systému pro libovolné metody
    public function addRoute(string $url, string $controller, string $callback, string $http_method, array $midware = [])
    {
        $this->routes[$http_method . $url] = [
            'controller' => $controller,
            'callback' => $callback,
            'http_method' => $http_method,
            'midware' => $midware,
        ];
    }

    public function dispatch(string $url): void
    {
        if (!array_key_exists($url, $this->routes)) {
            View::render('error-page', [
                'title' => 'Page not found 404',
            ]);
            exit;
        }
        
        $route = $this->routes[$url];

        $middlewareResult = $this->runMiddlewares($route['midware']);
        if (!$middlewareResult['success']) {
            header('Location: ' . $middlewareResult['redirect']);
            exit;
        }

        $controller = $this->routes[$url]['controller'];
        $callback = $this->routes[$url]['callback'];

        $controllerInit = new $controller();
        
        $controllerInit->$callback($_POST ? $_POST : []);
    }

    private function runMiddlewares(array $middlewares): array
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
