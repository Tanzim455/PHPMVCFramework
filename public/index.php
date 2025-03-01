<?php

use App\Router;

require '../vendor/autoload.php';
$router=new Router();
require_once '../routes.php';


$method=$_SERVER['REQUEST_METHOD'];

var_dump($method);

$parse_url=parse_url($_SERVER['REQUEST_URI']);

var_dump($parse_url);



// $router->get(method:$_SERVER['REQUEST_METHOD'],path:'two');



