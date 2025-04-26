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

    
    public function getRoutes():void {
        $routes = $this->get();  // Get all routes
       
       
          
        $projectRoot = dirname(path:__DIR__);

// Now build the correct path to the resources/views folder
$viewsPath = $projectRoot . '/resources/views';


// Optionally, use realpath to resolve any symbolic links and verify the path exists
$viewsPath = realpath(path:$viewsPath);



if ($viewsPath === false) {
    echo "Directory not found: $viewsPath";
} else {
    // Scan the directory
    $files = scandir($viewsPath);
    echo "<pre>";
     
     //all files except index 0 and 1
     $spliced_files=array_splice(offset:2,length:count($files),array:$files);
     
     
    echo "</pre>";
}

         

         //s

         //Scan the current directory

         

         $all_routes=array_column(column_key:'path',array:$routes);
         
        
           
          
           
        

          $user_route_path=parse_url(url:$_SERVER['REQUEST_URI']);
       
          
           
            $user_route=explode(separator:'/',string:trim($user_route_path['path']));
            

     
          
          
        

         

          
          $user_route_method=array_filter(array:$routes,callback:function($q) use ($user_route){
              return $q['path']===$user_route[2];
          });
   
         
        

        
          
          
          if(count($user_route_method)===1){
            $user_route_method_data=reset($user_route_method);
           
            
           
            if(in_array(needle:$user_route_method_data['current_method'],haystack:$this->allowed_methods)){
              
             
             
        if (file_exists(filename:$viewsPath)) {
          

          if (isset($user_route_method_data['view'])) { 
              include($viewsPath . '/' . $user_route_method_data['view']); // Proper string concatenation
          }
            exit();
        } else {
            var_dump("View file does not exist");
        }
    } else {
        echo "Method does not exist";
    }
              
            
          }else{
            echo "Route does not exist";
          }
          }
          

          
        }

          
                
         


?>
