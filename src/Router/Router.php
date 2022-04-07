<?php 

namespace Src\Router;

use Src\Router\Route;

class Router {

    private $routes = [];
    private $url;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct(string $url){
        $path = explode("/", $url);    
        
        if( count($path) <= 2 && $path[1] == '' ){
            return $this->url = '/';
        }
        array_shift($path);
        return $this->url = $path;
    }
    
//      ┌───────┐
//      │  ADD  │
//      └───────┘
    public function add(string $path, string $callable){
        $route = new Route($path, $callable);
        $this->routes[$route->callable[0]][$route->callable[1]] = $route;
    }
    
//      ┌───────────┐
//      │  GET URL  │
//      └───────────┘
    public function get_url(){
        r($this->url);
    }
    
//      ┌──────────────────┐
//      │  GET ALL ROUTES  │
//      └──────────────────┘
    public function get_all_routes(){
        r($this->routes);
    }

//      ┌──────────────────┐
//      │  ADD MIDDLEWARE  │
//      └──────────────────┘
public function add_middleware(string $controller,array $args,string $access){

    foreach ($this->routes as $route_controller) {
        foreach ($route_controller as $method => $route) {

            foreach ($args as $arg) {
                if( $method == $arg ){

                    $route->middleware = $access;
                }
            }
        }
    }
}
      
//      ┌────────┐
//      │  LOAD  │
//      └────────┘
    public function load(){
        $redirected = false;

        foreach ($this->routes as $route_controller) {
            foreach ($route_controller as $route) {
                $path = $route->path;

                if( gettype($this->url) == 'array' ){
                    $this->url = join("/",$this->url);
                }

                if( $this->url == $path ){
                    
                    $access = $route->middleware($route);
                    
                    if( $access == true){
                        $route->redirect($route->callable);
                        $redirected = true;
                    }else{
                        require($_SERVER['DOCUMENT_ROOT'] . '/app/View/Error/404.php');
                        // require($_SERVER['DOCUMENT_ROOT'] . '/app/View/Home/index.php');
                        $redirected = true;
                    }
                }
            }
        }

        if( !$redirected ){
            require($_SERVER['DOCUMENT_ROOT'] . '/app/View/Error/404.php');
        }
    }
}