<?php 
/**
 * @var App\Router $router
 */

use App\Controller\PostController;


$router->get('post/new',PostController::class,'index');
$router->get('post_two',PostController::class,'index_TWO');
$router->getRoutes();



 