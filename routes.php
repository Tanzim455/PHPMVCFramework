<?php 
/**
 * @var App\Router $router
 */

use App\Controller\PostController;

// use App\Controller\PostController;

// $router->get(path:'post',controller:'PostController',method:'index');
$router->get('post',PostController::class,'index');
$router->get('post_two',PostController::class,'index_TWO');
//  $router->get(path:'post_two',controller:[PostController::class,'index_TWO']);

$router->getRoutes();

// $router->get(path:'post_three/{id}',controller:[PostController::class,'index_three']);



 