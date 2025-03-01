<?php 
declare (strict_types=1);
namespace App;
class Router{
    private $routes=[];
   

    

        public function get(string $method,string $path):void {
            $this->routes[]=$path;
          
            // Get the REQUEST_URI
            $requestUri = $_SERVER['REQUEST_URI'];
            
            $parsedUrl = parse_url($requestUri);
            var_dump("The Parsed url is");
            
            //Get the exact Url 
            
           print_r($parsedUrl);
           //Find url without params

        //    $url=explode(separator:'/',string:trim($parsedUrl['path']));

        //    var_dump($url);
            $trim=$parsedUrl;

            var_dump(trim($trim['path']));
            //Filter out all arrays which are not NUll
        
        

    }
}