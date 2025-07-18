<?php 
declare (strict_types=1);
namespace App;
use App\Traits\View;
use ReflectionClass;

class Router {
    use View;
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
              echo "User route is";
                   
               array_splice(array:$user_route,offset:0,length:2);

               
               
               if(count($user_route)===1)
               {
                    $user_route_method=array_filter(array:$this->routes,callback:function($q) use ($user_route){
            return $q['path']===$user_route[0];
        });
        echo "<pre>";
         var_dump($user_route_method);
        echo "</pre>";
               }else if(count($user_route)>1){
                var_dump($user_route);
                //echo the route to pre tags
                echo "<pre>";
                 print_r($this->routes);
                 //with array column select all the paths
                 $all_paths=array_column(array:$this->routes,column_key:'path');
                 var_dump($all_paths);
                 //filter and check if the string has 
                 $filter_with_correct_columns=array_filter(array:$all_paths,callback:function($q){
                      return str_contains(haystack:$q,needle:'/');
                 });
                 var_dump($filter_with_correct_columns);
                 if(count($filter_with_correct_columns)===1){
                  
                    $path=explode(separator:"/",string:$filter_with_correct_columns[0]);
                    echo "User route is";
                    
                    $common_elements=array_intersect($user_route,$path);
                    
                    if(count($user_route)===count($common_elements) && count($path)===count($common_elements)){
                        echo "It is there";
                    }else{
                        echo "It is not there";
                    }
                    die();
                    // if(count($user_route)===count($path) && count($common_elements)===$path || count($common_elements)===$user_route){
                    //     echo "proceed here";
                    // }else{
                    //     echo "dont proceed";
                    // }
                    // die();
                 }
               }
               die();
              
        //   //Check for start of string 
        //fILTERING METHOD WOULD
       
        die();
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
        }else{
            $this->views(view:'error/404.php');
            
        }
        return $this->routes;      
   
       
     
   
        
        
        
       

       
             
             
        }
       
          

}

         

         //s

         //Scan the current directory

         

 

          
                
         


?>
