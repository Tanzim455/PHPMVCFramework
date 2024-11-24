<?php 

// include_once 'database.php';
include_once 'Model.php';
// $sql = 'SELECT title, description 
// 		FROM products';

// $products_conn = $conn->query($sql);

// // var_dump($products_conns);
// //Output 
// // object(PDOStatement)#2 (1) { ["queryString"]=> string(43) "SELECT title, description FROM products" }

// $products = $products_conn->fetchAll(PDO::FETCH_ASSOC);
$model=new Model();
$products=$model->fetchProducts();
// $products=$model->fetchProducts();

 include_once 'view.php';

//Results in an associative array
// array(4) { [0]=> array(2) { ["title"]=> string(9) "Product 1" ["description"]=> string(25) "Description for product 1" } [1]=> array(2) { ["title"]=> string(9) "Product 2" ["description"]=> string(25) "Description for product 2" } [2]=> array(2) { ["title"]=> string(9) "Product 3" ["description"]=> string(25) "Description for product 3" } [3]=> array(2) { ["title"]=> string(9) "Product 4" ["description"]=> string(25) "Description for product 4" } }

// var_dump($products);

//Transferring the view

?>


