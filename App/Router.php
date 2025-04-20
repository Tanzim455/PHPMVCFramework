<?php 
declare (strict_types=1);
namespace App;


class Router {
    // Store routes (with path and method)
    public array $allowed_methods=['GET','POST'];
    public function get(?string $path = null,?string $view=null):array {
        static $routes = [];
        
        // If path is provided, store the route with the method
        if ($path !== null) {
            $routes[] = ['path' => $path, 'current_method' => $_SERVER['REQUEST_METHOD'],'view'=>isset($view)?$view:''];
        }

        // Return all routes
        return $routes;
    }

    // public function view(string $path){
    //   include "../PHPMVCFramework/resources/views/`{$path}`";
    // }

    // Get and check if a route exists
    public function getRoutes():void {
        $routes = $this->get();  // Get all routes
       
          var_dump($routes);
        $projectRoot = dirname(__DIR__);

// Now build the correct path to the resources/views folder
$viewsPath = $projectRoot . '/resources/views';

// Optionally, use realpath to resolve any symbolic links and verify the path exists
$viewsPath = realpath($viewsPath);

if ($viewsPath === false) {
    echo "Directory not found: $viewsPath";
} else {
    // Scan the directory
    $files = scandir($viewsPath);
    echo "<pre>";
     var_dump($files);
     //all files except index 0 and 1
     $spliced_files=array_splice(offset:2,length:count($files),array:$files);
     var_dump("Spliced files");
     var_dump($spliced_files);
    echo "</pre>";
}

         

         //s

         //Scan the current directory

         

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
              var_dump($user_route_method[0]['view']);
              if(in_array(needle:$user_route_method[0]['view'],haystack:$spliced_files)){
                      header(header:$viewsPath.''.trim($user_route_method[0]['view']));
              }else{
                var_dump("It does not exist");
              }
          }else{
            echo "Method does not exist";
          }
          }else{
            die("Route does not exist");
          }
          

          
        }

          
                
          // if(count($user_route_method)==1){
          //   ;
          //   ['method'=>$route_method]=$user_route_method[0];

          //   var_dump($route_method);
          // }

        
    }


// Example usage:


?>
