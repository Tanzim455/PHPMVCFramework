<?php

use App\Controller\PostController;
use App\Router;

require '../vendor/autoload.php';
$router=new Router();
require_once '../routes.php';


 $router->getRoutes();

// if(class_exists(PostController::class)){
//     $post_controller= new ReflectionClass(PostController::class);
    
//      var_dump("The reflection class using PostController::class is \n");
    

//      $post=new $post_controller->name;
    
    
//      $all_methods=$post_controller->getMethods();
//      $method_name="index";
//      $method_names=array_column(array:$all_methods,column_key:'name');
//      var_dump($method_names);
     
//      if(in_array(needle:trim($method_name),haystack:$method_names)){
//         $post->$method_name();
//         die();
//      }
//     die();
   
    
    
    
// }









$reflection_post = new ReflectionClass(PostController::class);

echo "Reflection method is<br>";
echo "Reflection post is<br>";
var_dump($reflection_post);

 var_dump($reflection_post->getMethods());


$all_methods=array_column(array:$reflection_post->getMethods(),column_key:'name');

var_dump($all_methods);

if(($all_methods)){
    echo "Method is there";
}else{
    echo "Method is not there";
}


// if(in_array(needle:$method_name,haystack:$reflection_post->getMethods())){
//     echo "Method exists";
// }









