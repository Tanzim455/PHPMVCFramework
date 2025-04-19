<?php 
declare (strict_types=1);
namespace App;


class Router {
    // Store routes (with path and method)
    public array $allowed_methods=['GET','POST'];
    public function get(?string $path = null):array {
        static $routes = [];
        
        // If path is provided, store the route with the method
        if ($path !== null) {
            $routes[] = ['path' => $path, 'current_method' => $_SERVER['REQUEST_METHOD']];
        }

        // Return all routes
        return $routes;
    }

    

    // Get and check if a route exists
    public function getRoutes():void {
        $routes = $this->get();  // Get all routes
         var_dump("The routes here is");
         var_dump($routes);

         //Get all routes here

         $all_routes=array_column(column_key:'path',array:$routes);
        
        // echo "<pre>";
        // print_r($routes);
        // echo "</pre>";
        // var_dump("Allowed methods");
        // var_dump($this->allowed_methods);
           $all_path=array_column(array:$routes,column_key:"path");
          
           
        //   var_dump("All methods");
          
          //Find all the on related route

          $user_route_path=parse_url(url:$_SERVER['REQUEST_URI']);
         
            $user_route=explode(separator:'/',string:trim($user_route_path['path']));
           
            
        

         

          //find the method of the route
        //  var_dump($user_route[2]);
          $user_route_method=array_filter(array:$routes,callback:function($q) use ($user_route){
              return $q['path']===$user_route[2];
          });

          //Current method
          // if(count($user_route_method)){
          //   var_dump($user_route_method[0]['current_method']);
          // }
          


          //check whether the method exists or not 
        

          
          if(count($user_route_method)===1){
            var_dump("Route exists");
            if(in_array(needle:$user_route_method[0]['current_method'],haystack:$this->allowed_methods)){
              echo "Method exists";
          }else{
            echo "Method does not exist";
          }
          }else{
            die("Route does not exist");
          }
          // var_dump($user_route_method['current_method']);
          // //method name is 
          // $current_route_method=strtolower(trim($user_route_method['current_method']));

          // var_dump($current_route_method);

          
        }

          
                
          // if(count($user_route_method)==1){
          //   ;
          //   ['method'=>$route_method]=$user_route_method[0];

          //   var_dump($route_method);
          // }

        
    }


// Example usage:


?>
