<?php 
/**
 * @var App\Router $router
 */

use App\Controller\PostController;


$router->get('post/create/new',PostController::class,'create');
$router->get('post/create/Neuuu',PostController::class,'create_index');
 $router->get('post',PostController::class,'index');
 $router->get('user/{id}',PostController::class,'user');
 $router->get('post/{id}',PostController::class,'show');
  
$router->getRoutes();



 