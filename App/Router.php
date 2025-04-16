<?php 
declare (strict_types=1);
namespace App;


class Router {
    // Store routes (with path and method)
    public array $methods=['GET','POST'];
    public function get(?string $path = null, ?string $method = null):array {
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
        // var_dump("The routes here is");
        // var_dump($routes);
        
        echo "<pre>";
        print_r($routes);
        echo "</pre>";
          $all_path=array_column(array:$routes,column_key:"path");
          
        //   var_dump($all_path);
        //   var_dump("All methods");
          
          //Find all the on related route

         $user_route_path=parse_url(url:$_SERVER['REQUEST_URI']);
         
           $user_route=explode(separator:'/',string:trim($user_route_path['path']));
        //    var_dump("User route");
        //   var_dump($user_route[2]);

          //find the method of the route
         var_dump($user_route[2]);
          $user_route_method=array_filter(array:$routes,callback:function($q) use ($user_route){
              return $q['path']===$user_route[2];
          });
                
          if(count($user_route_method)==1){
            ;
            ['method'=>$route_method]=$user_route_method[0];

            var_dump($route_method);
          }

         if(in_array(needle:$route_method,haystack:$this->methods)){
             echo "method is macthed";
         }else{
            echo "Method not matched";
         }
        //   var_dump($all_path);
        //  var_dump($user_route[2]);
         //Find the method of the user route if its there
        // if(in_array(needle:trim($user_route[2]),haystack:$all_path)){
            
        // }else{
        //     var_dump("it is not there");
        // }
        // var_dump($all_path);
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
