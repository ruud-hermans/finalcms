<?php

namespace App\Libraries;

class Router {

    public $routes = [
        'GET' => [],

        'POST' => [],
    ];

    public static function load($file)
    {
        $router = new static;
    
        require $file;

        return $router;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            $routeData = $this->stripFunctionName($this->routes[$requestType][$uri]);

            if (isset($routeData['middleware']) && $routeData['middleware'] !== false) {
                new $routeData['middleware'];
            }

            return $routeData;
        }

        throw new \Exception('No route defined for this route (' . $uri . " | " . print_r($this->routes[$requestType], true) . ')');
    }

    public function get($uri, $controller, $middleware = false)
    {
        $this->routes['GET'][$uri] = [
            'controller' => $controller,
            'middleware' => $middleware
        ];
    }

    public function post($uri, $controller, $middleware = false)
    {
        $this->routes['POST'][$uri] = [
            'controller' => $controller,
            'middleware' => $middleware
        ];
    }

    private function stripFunctionName($uri)
    {
        $class = str_ireplace('.php', '', $uri['controller']);

        $data = [
            'uri' => $uri['controller'],
            'function' => 'index',
            'class' => str_replace('/', '\\', $class),
        ];

        $atSign = strpos($uri['controller'], '@');

        if ($atSign !== false)
        {
            $class = str_replace('/', '\\', substr($uri['controller'], 0, $atSign));
            $class = str_ireplace('.php', '', $class);
            $data = [
                'uri' => substr($uri['controller'], 0, $atSign),
                'function' => substr($uri['controller'], $atSign + 1),
                'class' => $class,
                'middleware' => $uri['middleware'],
            ];
        }

        return $data;
    }
}