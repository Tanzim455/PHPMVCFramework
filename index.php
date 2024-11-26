
<?php
include './src/Router/Router.php';

$router=new Router();

$router->add(route:'/AboutController/index',paths:[
   ['controller'=>'AboutController','method'=>'index']
]);
$router->add(route:'/ProductController/getAllProducts',paths:[
    ['controller'=>'ProductController','method'=>'getAllProducts']
 ]);
 $router->add(route:'/HomeController/index',paths:[
    ['controller'=>'HomeController','method'=>'index']
 ]);


