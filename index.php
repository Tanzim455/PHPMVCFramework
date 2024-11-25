<?php 



$controller=$_GET['controller'];

$action=$_GET['action'];



    include "./src/Controller/$controller.php";
    $about=new $controller();
    $about->$action();

?>


