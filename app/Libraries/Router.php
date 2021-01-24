<?php

namespace App\Libraries;

class Router {

    public $routes = [
        'GET' => [],

        'POST' => [],
    ];

    public static function load($file)
    {
        // Initialize / Construct class
        $router = new static;
    
        // File where routes are stored
        require $file;

        return $router;
    }

    /**
     * Get info about a certain route
     * @param $uri (string) the route to check
     * @param $requestType (string) GET or POST
     */
    public function direct($uri, $requestType)
    {

       
        if (array_key_exists($uri, $this->routes[$requestType])) {
            $routeData = $this->stripFunctionName($this->routes[$requestType][$uri]);

            if (isset($routeData['middleware']) && $routeData['middleware'] !== false) {
                foreach($routeData['middleware'] as $key => $middleWare)
                {
                    if (!is_string($key)) {
                        throw new \Exception('This function expects an array.');
                    }
                    
                    new $middleWare($uri, $key);
                }
            }

            return $routeData;
        }

        throw new \Exception('No route defined for this route (' . $uri . " | " . print_r($this->routes[$requestType], true) . ')');
    }

    /**
     * Get route
     * @param $uri (string) the route
     * @param $controller (string) which controller to use
     * @param $middleWare (string) optional if you want to use any middleware
     */
    public function get($uri, $controller, array $middleware = [])
    {
        $this->routes['GET'][$uri] = [
            'controller' => $controller,
            'middleware' => $middleware
        ];
    }

    /**
     * Post route
     * @param $uri (string) the route
     * @param $controller (string) which controller to use
     * @param $middleWare (string) optional if you want to use any middleware
     */
    public function post($uri, $controller, array $middleware = [])
    {
       
        $this->routes['POST'][$uri] = [
            'controller' => $controller,
            'middleware' => $middleware
        ];
     ;
    }


    /**
     * Get route, function (@{functionName} and class from route)
     * @param $uri (string) the route
     */
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