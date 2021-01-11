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

            if ($routeData['middleware'] !== false) {
                new $routeData['middleware'];
            }

            return $routeData;
        }

        throw new \Exception('No route defined for this route.');
    }

    public function get($uri, $controller, $middelware = false)
    {
        $this->routes['GET'][$uri] = [
            'controller' => $controller,
            'middleware' => $middelware
        ];
    }

    public function post($uri, $controller, $middelware = false)
    {
        $this->routes['POST'][$uri] = [
            'controller' => $controller,
            'middleware' => $middelware
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