<?php
include 'router.config.php';
class Router
{
  private $request;
  private $routes;
  private $forbidden;

  public function __construct($request)
  {
    $this->request = $request['REQUEST_URI'];
    $this->routes = [];
    // forbidden routes to visit via http
    $this->forbidden = array(
      '/config' => false,
      '/public' => false
    );
  }
  // add route function
  public function add($route, $expectedparams = null)
  {
    $this->routes[$route] = array('exp' => $expectedparams);
  }
  // check if route exists
  private function exists($route)
  {
    return array_key_exists($route, $this->routes);
  }
  // check if route is forbidden
  private function forbidden($route)
  {
    return array_key_exists($route, $this->forbidden);
  }

  // run application router
  public function run()
  {
    // root application path
    $root = "/php-web-framework";
    $routeArray = explode("/", $this->request);
    // if route is not forbidden and exists in routes[]
    if (!$this->forbidden("/" . $routeArray[1]) && $this->exists("/" . $routeArray[1])) {
      //get the number of expected parameters
      // expected params = params a route needs to be complete e.g /products/single/:productid
      // exp in above link is 1 and route will not be valid unless productid is provided
      $paramCount = $this->routes["/" . $routeArray[1]]['exp'];
      $params = [];
      if (sizeof($routeArray) < $paramCount + 2) {
        display_error("Some URL Parameters are missing", "504", "full");
        return;
      }
      //loop through all the params and construct an array
      for ($i = 1; $i < ($paramCount + 1); $i++) {
        $params[$i] = $routeArray[$i + 1];
      }
      routerFunction($routeArray[1], $paramCount, $params);
    } else {
      // forbidden route or route not found
      display_error("/{$routeArray[1]} could not be found", "404", "full");
    }
  }
}
