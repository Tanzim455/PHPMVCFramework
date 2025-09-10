<?php 
declare(strict_types=1);
 namespace App\Controller;

use App\Traits\View;

class PostController{
   use View;

   public function index(){
    $array=['first','second','third'];
   
   
    $my_name="Tanzim";
    $this->views(view:'posts/index.php',data:compact('array','my_name'));
   }
    public function index_TWO(){
        $this->views(view:'posts/index2.php');
    }
    public function create(){
        $this->views(view:'posts/create.php');
    }

    public function show($id){
        var_dump("show",$id);
    }
}


?>