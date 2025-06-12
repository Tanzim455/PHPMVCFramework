<?php 
declare (strict_types=1);
namespace App;

use ReflectionClass;

class Router {
    // Store routes (with path and method)
     private $routes=[];
     private array $allowed_methods=["GET","POST","DELETE","PUT","PATCH"];
    public function __call(string $method, array $arguments): array {
        
        $method = strtoupper($method);
      
          
        if (!in_array($method, $this->allowed_methods, true)) {
            throw new BadMethodCallException("Method '$method' is not allowed.");
        }

        // Ensure the route and controller are provided
        if (count($arguments) < 2) {
            throw new InvalidArgumentException("Route definition requires a path and a controller.");
        }
        
     
        
        [$path, $controller,$method] = $arguments;
        
         
     
        // Store the route
        $this->routes[] = [
            'path' => $path,
            'http_method' =>$_SERVER['REQUEST_METHOD'],
            'controller' => $controller,
            'method'=>$method
        ];

        return $this->routes;
    }
    
    public function getRoutes(){
         $user_route_path=parse_url(url:$_SERVER['REQUEST_URI']);
          $user_route=explode(separator:'/',string:trim($user_route_path['path']));
         
         $user_route_method=array_filter(array:$this->routes,callback:function($q) use ($user_route){
            return $q['path']===$user_route[2];
        });
        if(count($user_route_method)){
            $user_route_method_data=reset($user_route_method);
  
            //  $controller_obj=new $user_route_method_data['controller'][0];
              $controller_obj=new $user_route_method_data['controller'];
              
              if(class_exists(class:$user_route_method_data['controller'])){
                $reflection=new ReflectionClass(objectOrClass:$controller_obj);
             
                 
                 $current_route_controller_method=trim($user_route_method_data['method']);
                 
                
                 //Convert array of Stdclasses to multidimenisonal array
                if ($reflection->hasMethod(name:$current_route_controller_method)) {
                      $controller_obj->$current_route_controller_method();
} else {
    echo "Method does not exist!";
}
                
              }
        }
        return $this->routes;      
   
       
     
   
        
        
        
       

       
             
             
        }
       
          

}

         

         //s

         //Scan the current directory

         

 

          
                
         


?>
