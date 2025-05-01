<?php

//DEJO ÉSTE CÓDIGO POR LAS DUDAS
/*class Route {
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

        if(count($partsRoute) != count($partsURL))
            return false;
        
        //La anotacion de los parametros es :ID
        foreach($partsRoute as $key => $part) {
            //Si tiene :, es un parametro
            if($part[0] != ":"){
                if($part != $partsURL[$key])
                    return false;
            } else
                $this->params[$part] = $partsURL[$key];
        }

        return true;
    }

    public function run(){
        $controller = $this->controller;  
        $method = $this->method;
        $params = $this->params;
        
        $controller->$method($params);
    }
}*/

/*class Router {
    private $routeTable = [];
    private $defaultRoute;

    public function __construct() {
        $this->defaultRoute = null;
    }

    public function route($url) {
        foreach($this->routeTable as $route) {
            //Delega la responsabilidad al metodo de match de parsear la URL
            if($route->match($url)){
                //TODO: ejecutar el controller
                $route->run();
                return;
            }
        }

        //Si ninguna ruta coincide con el pedido y se configuró ruta por defecto.
        if(isset($this->defaultRoute)) {
            $this->defaultRoute->run();
        }
    }
    
    public function addRoute($url, $controller, $method) {
        $this->routeTable[] = new Route($url, $controller, $method);
    }

    public function setDefaultRoute($controller, $method) {
        $this->defaultRoute = new Route("", $controller, $method);
    }
}*/

declare(strict_types=1);

/**
 * Representa una ruta con un parámetro opcional y ejecuta el método asociado.
 */
class Route
{
    /** @var object Instancia del controlador */
    private object $controller;

    /** @var string Nombre del método a invocar en el controlador */
    private string $method;

    /**
     * @param string $paramName Nombre del parámetro (incluye ':') o cadena vacía
     * @param object $controller Instancia del controlador
     * @param string $method Nombre del método a ejecutar
     */
    public function __construct(object $controller, string $method) {
        $this->controller = $controller;
        $this->method = $method;
    }

    /**
     * Ejecuta el método del controlador, pasando el valor del parámetro si aplica.
     *
     * @param string|null $value Valor extraído de la URL (p.e. '12')
     */
    public function run(?string $value = null): void {
        //Invocación con parámetro
        if(!empty($value)) {
            $this->controller->{$this->method}($value);
            return;
        }
       
        //Invocación sin parámetros
        $this->controller->{$this->method}();
    }
}

/**
 * Maneja rutas estáticas y con un solo path param. No sabe manejar query params
 */
class Router {

    /** @var Route[] Tabla de rutas: clave = path base, valor = objeto Route */
    private static array $routeTable = [];

    /** @var Route|null Ruta por defecto cuando no hay match */
    private static ?Route $defaultRoute = null;

    /**
     * Registra la ruta por defecto.
     *
     * @param object $controller Instancia del controlador
     * @param string $method Nombre del método a ejecutar
     * @return void
     */
    public static function setDefaultRoute(object $controller, string $method): void {
        self::$defaultRoute = new Route($controller, $method);
    }

    /**
     * Agrega una ruta con parámetro opcional.
     *
     * @param string $route Ruta con o sin parámetro (p.e. 'save/car' o 'remove/account/:ID')
     * @param object $controller Instancia del controlador
     * @param string $method Nombre del método a ejecutar
     * @return void
     */
    public static function addRoute(string $route, object $controller, string $method): void {
        $route = trim($route, '/');

        if(!isset(self::$routeTable[$route]))
            self::$routeTable[$route] = new Route($controller, $method);
    }

    /**
     * Despacha la petición según la acción solicitada. Delega la responsabilidad a la ruta de ejecutarse
     *
     * @param string $action Acción solicitada (p.e. 'save/car' o 'remove/account/12')
     * @return void
     */
    public static function route(string $action): void {
        $action = trim($action, '/');
        
        //Match directo
        if(isset(self::$routeTable[$action])) {
            self::$routeTable[$action]->run();
            return;
        }
        
        //Si falla, viene con parámetro
        $parts = explode('/', $action);
        $param = end($parts);
        array_pop($parts);
        $path  = implode('/', $parts);

        if(isset(self::$routeTable[$path])) {
            self::$routeTable[$path]->run($param);
            return;
        }

        //Si falla, me voy a la ruta por defecto
        if(self::$defaultRoute !== null)
            self::$defaultRoute->run();
    }
}
