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
             
            
                
               array_splice(array:$user_route,offset:0,length:2);
                    var_dump($user_route);
               
               
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
                 if(count($numericValues)===1){
                    //user route which has a number
    $index_of_the_number_in_array=array_keys($numericValues)[0];
    $all_route_with_parameters=array_filter(array:$mapped_routes,callback:function($q)use($index_of_the_number_in_array){
      return str_starts_with(haystack:$q['path'][$index_of_the_number_in_array],needle:'{') && str_ends_with(haystack:$q['path'][$index_of_the_number_in_array],needle:'}');
});


                 $filtered_routes=array_filter(array:$all_route_with_parameters,callback:function($q)use($user_route,$index_of_the_number_in_array){
   
   
    if(count($q['path'])===count($user_route)){
        return   $q['path'][0]===$user_route[0] && str_starts_with(haystack:$q['path'][$index_of_the_number_in_array],needle:'{') && str_ends_with(haystack:$q['path'][$index_of_the_number_in_array],needle:'}');
    }
        
});
    echo "<pre>";

   print_r($filtered_routes);
    echo "</pre>";
     die();
}else{
    var_dump("It is not");
}

           


                
                 if(count($filter_with_correct_columns)===1){
                   
                    
                    $path=explode(separator:"/",string:$filter_with_correct_columns[0]['path']);
                   

                    $common_elements=array_intersect($user_route,$path);
                    
                    if(count($user_route)===count($common_elements) && count($path)===count($common_elements)){
                      
                        
                         $all_route_info=reset($filter_with_correct_columns);
                        
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
                        
                        
                     
                    }else{
                         $this->views(view:'error/404.php');
                    }
                   
                    
                 }
               }
              
              
      
       
       

        return $this->routes;      
   
       
     
   
        
        
        
       

       
             
             
        }
       
          

}

         

         //s

         //Scan the current directory

         

 

          
                
         


?>