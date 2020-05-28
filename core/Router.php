<?php

namespace Wiar\Core;
use Exception;
/**
 * Class Router
 *
 * directs the traffic
 */
class Router
{

    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * loads a file
     *
     * @param String $file name_of_file
     * @return static router instance
     */
    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    /**
     * sets the route as GET
     *
     * @param String $uri
     * @param String $controller
     */
    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * sets the route as POST
     *
     * @param String $uri
     * @param String $controller
     */
    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * directs the traffic to a dedicated controller
     * based on the URI
     *
     * @param String $uri the URL of the current page
     * @return String route to controller
     * @throws Exception no route found
     */
    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callMethod(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        }
        throw new Exception('No route defined');
    }

    protected function callMethod($controller, $method)
    {
        $controller = "Wiar\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $method)) {
            throw new Exception("`{$controller}` does not respond to `{$method}` method.");
        }
        return $controller->$method();
    }
}