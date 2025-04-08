<?php

class Route {
    private $url;
    private $controller;
    private $method;
    private $params;

    public function __construct($url, $controller, $method){
        $this->url = $url;
        $this->controller = $controller;
        $this->method = $method;
        $this->params = [];
    }

    public function match($url) {
        $partsURL = explode("/", trim($url,'/'));
        $partsRoute = explode("/", trim($this->url,'/'));

        if(count($partsRoute) != count($partsURL)){
            return false;
        }

        foreach ($partsRoute as $key => $part) {
            if($part[0] != ":"){
                if($part != $partsURL[$key])
                return false;
            } //es un parametro
            else
            $this->params[$part] = $partsURL[$key];
        }

        return true;
    }

    public function run(){
        $controller = $this->controller;  
        $method = $this->method;
        $params = $this->params;
        
        $controller->$method($params);
        //(new $controller())->$method($params);
    }
}

class Router {
    private $routeTable = [];
    private $defaultRoute;

    public function __construct() {
        $this->defaultRoute = null;
    }

    public function route($url) {
        //$ruta->url //no compila!
        foreach ($this->routeTable as $route) {
            //Delega la responsabilidad al metodo de match de parsear la URL
            if($route->match($url)){
                //TODO: ejecutar el controller
                // pasarle los parametros
                $route->run();
                return;
            }
        }
        //Si ninguna ruta coincide con el pedido y se configuró ruta por defecto.
        if (isset($this->defaultRoute)) {
            $this->defaultRoute->run();
        }
    }
    
    public function addRoute($url, $controller, $method) {
        $this->routeTable[] = new Route($url, $controller, $method);
    }

    public function setDefaultRoute($controller, $method) {
        $this->defaultRoute = new Route("", $controller, $method);
    }
}