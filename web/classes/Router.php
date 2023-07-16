<?php

class Router
{
    private $routes = [];

    public function add($route, $callback)
    {
        $this->routes[$route] = $callback;
    }

    public function dispatch()
    {
        $requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        #$requestMethod = $_SERVER['REQUEST_METHOD'];

        $routeFound = false;

        foreach ($this->routes as $route => $callback) {
            $pattern = '/^' . str_replace('/', '\/', $route) . '$/';

            if (strpos($route, '{id}') !== false) {
                $pattern = str_replace('{id}', '(\d+)', $pattern);
            }

            if (preg_match($pattern, $requestPath, $matches)) {
                $routeFound = true;
                array_shift($matches);

                if (is_callable($callback)) {
                    call_user_func_array($callback, $matches);
                } else {
                    list($controller, $method) = explode('@', $callback);

                    $controllerFile = 'controllers/' . $controller . '.php';

                    if (file_exists($controllerFile)) {
                        require_once $controllerFile;

                        if (class_exists($controller)) {
                            $controllerInstance = new $controller();

                            if (method_exists($controllerInstance, $method)) {
                                call_user_func_array([$controllerInstance, $method], $matches);
                            } else {
                                die('Method not found: ' . $method);
                            }
                        } else {
                            die('Controller not found: ' . $controller);
                        }
                    } else {
                        die('Controller file not found: ' . $controllerFile);
                    }
                }

                break;
            }
        }
        if (!$routeFound) {
            die('Route not found.');
        }
    }
}
?>