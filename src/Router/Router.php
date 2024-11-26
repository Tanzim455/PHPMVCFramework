<?php 


class Router{
    public function add(string $route,array $paths){

        //Parsing the Url
          
        $request=parse_url(url:$_SERVER['REQUEST_URI'])['path'];
        $explode=explode(separator:'/',string:$request);
        $requested_paths=array_slice(array:$explode,offset:2,length:count($explode));
        
        foreach($paths as $value){
            var_dump($requested_paths[0]);
             if($value['controller']===$requested_paths[0]){
                //Find the file path
                $controllerFile = "./src/Controller/" . $value['controller'] . ".php";
                //Check whether the file exists or
                if(file_exists($controllerFile)){
                    include $controllerFile;
                    // if (method_exists(object_or_class:$controller,method:$requested_paths[1])) {

                    //   }
                    if (method_exists(object_or_class:$value['controller'],method:$requested_paths[1])){
                        // $value['controller']->$requested_paths[1]();
                       
                        $controller=new $value['controller'];
                        // var_dump($requested_paths[1]);
                        $controller->{$requested_paths[1]}();
                    }else{
                        echo "The path does not exist";
                    }
                   
             }else{
                die("It does not exist");
             }
          
            
            }
        }
    }
}
            