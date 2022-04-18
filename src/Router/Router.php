<?php 

namespace Src\Router;

use Src\Router\Route;

class Router 
{
    private $routes = [];
    private $url;
    private $url_argument;
    private $url_id;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct(string $url)
    {
        $path = explode("/", $url);    
        
        if( count($path) <= 2 && $path[1] == '' ){
            return $this->url = '/';
        }
        elseif( count($path) <= 2 && strpos($url, '?') ){

            $url_argument = explode("?", $path[1]);

            if (strpos($url, '&')){
                $path = $url_argument[0];
                $url_argument = explode("&", $url_argument[1]);
            }

            $this->url = $path;
            $this->url_argument = $url_argument;
        }
        elseif( count($path) >= 2 && strpos($url, '?') ){
            $url_argument = explode("?", $path[(count($path) -1)]);

            array_shift($path);
            array_pop($path);

            if (strpos($url, '&')){
                $path[] = $url_argument[0];
                $url_argument = explode("&", $url_argument[1]);
            }

            $this->url = $path;
            $this->url_argument = $url_argument;
        }
        else{
            array_shift($path);
            $this->url = $path;
        }
    }
    
//      ┌───────┐
//      │  ADD  │
//      └───────┘
    public function add(string $path, string $callable)
    {
        $route = new Route($path, $callable);
        $this->routes[$route->callable[0]][$route->callable[1]] = $route;
    }
    
//      ┌───────────┐
//      │  GET URL  │
//      └───────────┘
    public function get_url()
    {
        return $this->url;
    }
        
    public function print_url()
    {
        echo '<pre>';
        r($this->url);
        echo '</pre>';
    }

//      ┌──────────┐
//      │  GET ID  │
//      └──────────┘
    public function get_id()
    {
        return $this->url_id;
    }    

    public function print_id()
    {
        echo '<pre>';
        r($this->url_id);
        echo '</pre>';
    }

//      ┌────────────────┐
//      │  GET ARGUMENT  │
//      └────────────────┘
    public function get_argument()
    {
        return $this->url_argument;
    }
    
    public function print_argument()
    {
        echo '<pre>';
        r($this->url_argument);
        echo '</pre>';
    }

//      ┌──────────────────┐
//      │  GET ALL ROUTES  │
//      └──────────────────┘
    public function get_all_routes()
    {
        return $this->routes;
    }

    public function print_all_routes()
    {
        echo '<pre>';
        r($this->routes);
        echo '</pre>';
    }

//      ┌──────────────────┐
//      │  ADD MIDDLEWARE  │
//      └──────────────────┘
    public function add_middleware(string $controller,array $args,string $access)
    {

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
    public function load()
    {
        $redirected = false;
        $url = $this->url;

        if( gettype($url) == 'array' ){
            $url = join("/",$url);
        }

        if ( strlen($url) > 1 ){
            $url = "/" . $url;
        }

        $this->url = $url;

        foreach ($this->routes as $route_controller) {
            foreach ($route_controller as $route) {
                $path = $route->path;

                // r( $this->url == $path );
                // r($this->url);
                // r($path);

                if( $this->url == $path ){
                    
                    $access = $route->middleware($route);
                    
                    if ($access == true){
                        $route->redirect($route->callable);
                        $redirected = true;
                    }
                    else{
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