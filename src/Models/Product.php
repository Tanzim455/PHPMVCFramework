<?php 


// die();

// require __DIR__ . '/../../Database.php';

class Product {

    public function getProducts(): array {
        require 'src/Database/Database.php';
     
        $database = new Database();
      
        $connect = $database->connect();
        $sql = 'SELECT title, description FROM products';
        
        // Run the query
        $stmt = $connect->query($sql);
        
        // Fetch results as an associative array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }
}

