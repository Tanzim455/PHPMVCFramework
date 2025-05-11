<?php


use App\Router;

require '../vendor/autoload.php';
$router=new Router();
require_once '../routes.php';


 $router->getRoutes();













// if(in_array(needle:$method_name,haystack:$reflection_post->getMethods())){
//     echo "Method exists";
// }









