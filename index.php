<?php 

// include_once 'database.php';
include './src/Controller/ProductController.php';


//Transferring the view
$product=new ProductController();

$product->getAllProducts();
?>


