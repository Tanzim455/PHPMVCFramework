<?php

use App\Controller\PostController;
use App\Router;

require '../vendor/autoload.php';
$router=new Router();
require_once '../routes.php';


// $router->getRoutes();
$post = PostController::class;


$post_instantiate=new PostController();

var_dump($post_instantiate);

$post_controller=(object)(PostController::class);
var_dump($post_controller->scalar);
$new_post=new $post_controller->scalar();

$new_post->index();
die();





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









