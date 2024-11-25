<?php 


class Router{
    public function add(string $route,array $paths){

    //    var_dump($paths);

       //All in one array

    //    $all_paths=array_merge($paths);

    //    var_dump($all_paths);
            // var_dump($paths);
            // $combined_array=array_merge(...$paths);

            // var_dump($paths);

            //  echo $route;
           
            $modifiedPath = str_replace('/', '.', $route);
            $array = explode('.', trim($modifiedPath, '.'));
            

            $new_route='products';

            if($new_route===$array[0]){
              echo "It is same";
            }else{
                echo "It is not same";
            }
            
           
           
           
          
     
     }
}
            