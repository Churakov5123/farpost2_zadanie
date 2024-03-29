<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routerPath = ROOT . '/config/routes.php';
        $this->routes = include($routerPath);
    }

    /**
     * @return string  request string
     */
    private function gerUrl()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        $uri = $this->gerUrl();

        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {


                $integralRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $integralRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parametrs = $segments;

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);

                }
               $controlerObject = new  $controllerName;
               $result = call_user_func_array(array($controlerObject, $actionName),$parametrs);
                if($result != null){
                    break;
                }
            }
        }
    }
}