<?php 
declare(strict_types=1);
 namespace App\Controller;

use App\Traits\View;

class PostController{
   use View;

   public function index(){
    $this->views(view:'posts/index.php');
   }
    public function index_TWO(){
        echo "Index  method two from Post Controller";
    }
}


?>