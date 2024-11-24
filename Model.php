<?php 
include 'database.php';
class Model{
    private $conn;
    public function fetchProducts():array{
        $sql = 'SELECT title, description 
		FROM products';

// $products_conn = $this->conn->query($sql);
       $database=new Database();
      $conn=$database->connect();
      
       $products_conn = $database->connect()->query($sql);
      
// var_dump($products_conns);
//Output 
// object(PDOStatement)#2 (1) { ["queryString"]=> string(43) "SELECT title, description FROM products" }

$products = $products_conn->fetchAll(PDO::FETCH_ASSOC);

return $products;



    }
}