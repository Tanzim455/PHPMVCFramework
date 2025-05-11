<?php 
declare (strict_types=1);
namespace App;

use ReflectionClass;

class Router {
    // Store routes (with path and method)
    public array $allowed_methods=['GET','POST'];
    public function get(?string $path=null,?array $controller=null):array {
        static $routes = [];
        
        // If path is provided, store the route with the method
        if ($path !== null) {
            $routes[] = ['path' => $path, 'current_method' => $_SERVER['REQUEST_METHOD'],'controller'=>$controller];
        }

        // Return all routes
        return $routes;
    }

    
    public function getRoutes():void {
        $routes = $this->get();  // Get all routes
       
       
     
    //    var_dump($all_routes);
       $user_route_path=parse_url(url:$_SERVER['REQUEST_URI']);
       
          
           
        $user_route=explode(separator:'/',string:trim($user_route_path['path']));
        // var_dump($user_route);

        
        // 
        $user_route_method=array_filter(array:$routes,callback:function($q) use ($user_route){
            return $q['path']===$user_route[2];
        });

        if(count($user_route_method)){
            $user_route_method_data=reset($user_route_method);

            //  var_dump($user_route_method_data['controller'][0]);
             $controller_obj=new $user_route_method_data['controller'][0];
             //using the reflection class
            //  var_dump($controller_obj);
             if(class_exists(class:$user_route_method_data['controller'][0])){
                $reflection=new ReflectionClass($controller_obj);
                $methods=$reflection->getMethods();
                
                 
                $all_methods=array_column(array:$methods,column_key:'name');

                // var_dump($all_methods);
                $current_route_method=trim($user_route_method_data['controller'][1]);
                if(count($all_methods)){
                    if(in_array($current_route_method,$all_methods)){
                        $controller_obj->$current_route_method();
    
                    }else{
                        die('Method is not there');
                    }
                }
                
                
                // var_dump($all_methods);
               }
                //
             }else{
                die("class does not exist");
             }
             die();
             
            //  var_dump($reflection);
             //Get methods
            
            // var_dump($all_methods);
            //Check if the current class exists



        }
       
          
//         $projectRoot = dirname(path:__DIR__);

// // Now build the correct path to the resources/views folder
// $viewsPath = $projectRoot . '/resources/views';


// // Optionally, use realpath to resolve any symbolic links and verify the path exists
// $viewsPath = realpath(path:$viewsPath);



// if ($viewsPath === false) {
//     echo "Directory not found: $viewsPath";
// } else {
//     // Scan the directory
//     $files = scandir($viewsPath);
//     echo "<pre>";
     
//      //all files except index 0 and 1
//      $spliced_files=array_splice(offset:2,length:count($files),array:$files);
     
     
//     echo "</pre>";
}

         

         //s

         //Scan the current directory

         

 

          
                
         


?>
