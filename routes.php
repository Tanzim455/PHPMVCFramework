<?php 
/**
 * @var App\Router $router
 */

use App\Controller\PostController;


$router->get('post/new/create',PostController::class,'index');
$router->get('post',PostController::class,'index_TWO');
$router->getRoutes();



 