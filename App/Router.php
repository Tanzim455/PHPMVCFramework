<?php 
declare (strict_types=1);
namespace App;
class Router {
    private $routes = [];

    // Method to add a route
    public function get(string $path,string $method) {
        $this->routes[] = $path;  // Add the path to the $routes array

    //  var_dump($this->getAllRoutes());
     var_dump($this->getLastRoute());
     
    }

    // Method to get all stored routes
    public function getAllRoutes() {
        return $this->routes;
    }

    // Method to get the last invoked route
    public function getLastRoute() {
        return end($this->routes[]);  // Get the last route from the array
    }
}