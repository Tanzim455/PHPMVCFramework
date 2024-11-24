<?php 



class ProductController {
    public function getAllProducts() {
        require 'src/Models/Product.php';
        $product = new Product();
       
         $products = $product->getProducts();
         
        // Include the view file before returning the products
         require 'src/views/products_view.php';
        
        
    }
}
