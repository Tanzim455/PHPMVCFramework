<?php 
/**
 * @var App\Router $router
 */

use App\Controller\PostController;


$router->get('post/create/new',PostController::class,'create');
// $router->get('post/{id}',PostController::class,'show');
// $router->get('post',PostController::class,'create');
$router->getRoutes();



 