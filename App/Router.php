<?php 
declare (strict_types=1);
namespace App;
class Router{
    private $routes_list=[];
    private $routes=[];
   

    

        public function get(string $method,string $path):void {
          
            
      
                 

            $this->routes = array_merge($this->routes, [$path]);

            // Output the updated array
            var_dump($this->routes);

            foreach($this->routes as $index=>$value){
                var_dump($index);
            }
            // $requestUri = $_SERVER['REQUEST_URI'];
            
            // $parsedUrl = parse_url($requestUri);
            
            
            //Get the exact Url 
            
         
           //Find url without params

        //    $url=explode(separator:'/',string:trim($parsedUrl['path']));

        //    var_dump($url);
            // $path_of_user=$parsedUrl['path'];

            
          
            //Convert string to an array
            // $explode=explode(separator:"/",string:$path_of_user);

            //    var_dump($explode);

              //All paths of methods


    }
}