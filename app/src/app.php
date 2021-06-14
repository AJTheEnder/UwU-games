<?php 

require_once __DIR__ . '/route/route.php';

class App
{
    const GET = "GET";
    const POST = 'POST'; 
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    /**
     * @var array
     */
    private $routes = array();

    /**
     * @var statusCode
     */
    private $statusCode;

    /**
     * Creates a route for HTTP verb Get
     * 
     * @param string $pattern
     * @param callable $callable
     * @param App $this
     */

    public function get(string $pattern,callable $callable){
        $this->registerRoute(self::GET,$pattern,$callable);
        return $this;
    }

    /**
     * Register a route in the routes array
     * 
     * @param string $pattern
     * @param callable $callable
     * @param string $method 
     */
    private function registerRoute(string $method,string $pattern,callable $callable){
        $this->routes[] = new Route($method,$pattern,$callable);

    }

    /**
     * 
     * @throws HttpException
     */
    public function run(){
        $method = $_SERVER['REQUEST_METHOD'] ?? self::GET;
        $uri = $_SERVER['REQUEST_URI'] ?? '/';

        foreach($this->routes as $route){
            if($route-> match($method,$uri)){
                return $this->process($route);
            }
        }

        throw new Error('No routes available for this uri');

    }

    /**
     * Process Route
     * 
     * @param Route route 
     * @throws HttpException
     */
    private function process(Route $route){
        try {
            http_response_code($this->statusCode);
            echo call_user_func_array($route->getCallable(),$route->getArguments());
        }catch (HttpException $e) {
            throw $e;
        }
        catch (\Exception $e){
            throw new Error('There was an error during the processing of your request');
        }
    }

}