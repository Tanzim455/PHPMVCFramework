<?php 
declare (strict_types=1);
namespace App;


class Router {
    // Store routes (with path and method)
    public function get(?string $path = null, ?string $method = null) {
        static $routes = [];

        // If path is provided, store the route with the method
        if ($path !== null && $method !== null) {
            $routes[] = ['path' => $path, 'method' => $method];
        }

        // Return all routes
        return $routes;
    }

    // Get and check if a route exists
    public function getRoutes() {
        $routes = $this->get();  // Get all routes
        
        
        $all_path=array_column(array:$routes,column_key:"path");
        var_dump($all_path);
        // $route = 'posts';
        // $method = 'GET';  // Example: Check if GET request to 'posts' exists

        // // Search for the route with the specific method
        // $routeFound = false;
        // foreach ($routes as $r) {
        //     if ($r['path'] === $route && $r['method'] === $method) {
        //         $routeFound = true;
        //         break;
        //     }
        // }

        // // Output result
        // if ($routeFound) {
        //     echo "Route found\n";
        // } else {
        //     echo "Route not found\n";
        // }
    }
}

// Example usage:


?>
