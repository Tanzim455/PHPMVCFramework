<?php 
/**
 * @var App\Router $router
 */

use App\Controller\PostController;

$router->get(path:'post',controller:[PostController::class,'index']);
$router->get(path:'post_two',controller:[PostController::class,'index_TWO']);
// $router->get(path:'post_two',view:'index2.php');




 