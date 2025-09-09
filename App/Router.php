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
        
          //Parse the url that is the user route
          $user_route_path=parse_url(url:$_SERVER['REQUEST_URI']);
            
         // Splits the route path by '/' into an array after trimming leading/trailing whitespace
           $user_route=explode(separator:'/',string:trim($user_route_path['path']));
             
          
                
               array_splice(array:$user_route,offset:0,length:2);
                   
               if(count($user_route)===1)
               {
               
                
                    $user_route_method=array_filter(array:$this->routes,callback:function($q) use ($user_route){
            return $q['path']===$user_route[0];
        });

                  
              
              if(count($user_route_method)){
$user_route_method_data=reset($user_route_method);

             $controller_obj=new $user_route_method_data['controller'];
          if(class_exists(class:$user_route_method_data['controller'])){
                $reflection=new ReflectionClass(objectOrClass:$controller_obj);
             
                 
$current_route_controller_method=trim($user_route_method_data['method']);

 if($reflection->hasMethod($current_route_controller_method)){
$controller_obj->$current_route_controller_method();
 }else{
    echo "The  method does not exist";
 }
          }

              }else{
                 $this->views(view:'error/404.php');
              }
              ;
               }else if(count($user_route)>1){
               
               
                
                
                
                  $all_routes=array_filter(array:$this->routes,callback:function($q){
                      return str_contains(haystack:$q['path'],needle:'/');
                 });

               
                

                 //map here with all routes
                $mapped_routes = array_map(array:$all_routes,callback:function ($q) {
    return ['path' => explode("/", $q['path']),
           'http_method'=>$q['http_method'],
           'controller'=>$q['controller'],
           'method'=>$q['method']
];
});

                 
                

                  $numericValues = array_filter(array:$user_route,callback:'is_numeric');
                 $index_of_the_number_in_array = array_keys($numericValues)[0];

    // Routes with a placeholder parameter (e.g., {id}) at the numeric position
    $all_route_with_parameters = array_filter($mapped_routes, function($q) use ($index_of_the_number_in_array) {
        return str_starts_with($q['path'][$index_of_the_number_in_array], '{') &&
               str_ends_with($q['path'][$index_of_the_number_in_array], '}');
    });
    echo "<pre>";
    print_r($all_route_with_parameters);
    echo "</pre>";
    die();
    // Routes that match full path structure and start similarly
    $filtered_routes = array_filter($all_route_with_parameters, function($q) use ($user_route, $index_of_the_number_in_array) {
        return count($q['path']) === count($user_route) &&
               $q['path'][0] === $user_route[0];
    });

  
     
}else{
      $filter_with_correct_columns=array_filter(array:$this->routes,callback:function($q){
                      return !str_contains(haystack:$q['path'],needle:'{') ||!str_contains(haystack:$q['path'],needle:'}');
                 });
 $mapped_routes = array_map(array: $filter_with_correct_columns,callback:function ($q) {
    return ['path' => explode("/", $q['path']),
           'http_method'=>$q['http_method'],
           'controller'=>$q['controller'],
           'method'=>$q['method']
];
});


        
                 if(count($mapped_routes)){

                  
                  
                    

                  
                   $filtered_routes_with_same_number_of_columns=array_filter(array:$mapped_routes,callback:function($q)use($user_route){
                        return  count($q['path'])===count($user_route);
                   });

                  echo "<pre>";

            

                    $common_elements=array_filter(array:$filtered_routes_with_same_number_of_columns,callback:function($q)use($user_route){
                        return  $q['path']===$user_route;
                   });
                    

                    
                    
                    if(count($common_elements)){
                      
                        
                         $all_route_info=reset($common_elements);
                         
                         
                         if(class_exists(class:$all_route_info['controller']))
                         {
                           $reflection=new ReflectionClass(objectOrClass:$all_route_info['controller']);
                            
                           
                            $controller_obj=new $all_route_info['controller'];
                           
                         $method=trim($all_route_info['method']);
                       
                         
                            if($reflection->hasMethod($method)){
                               
                              
                                 
                                
                                
                                $controller_obj->$method();
                               
                                
                            }else{
                                echo "Method does not exist";
                            }
                             
                         
                         }else{
                            echo "The class does not exist";
                         }
}

           
                 
                
                        
                        
                     
                    }else{
                         $this->views(view:'error/404.php');
                    }
                   
                    
                 }
               }
              
              
      
       
       

        
   
       
     
   
        
        
        
       

       
             
             
        }
       
          



         

         //s

         //Scan the current directory

         

 

          
                
         


?>