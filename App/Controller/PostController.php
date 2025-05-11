<?php 
declare(strict_types=1);
 namespace App\Controller;



class PostController{
    public function index(){
        $twoDirectoriesUp = dirname(path:__DIR__,levels:2);
        $resource_path=$twoDirectoriesUp.'/resources/views';
        var_dump($resource_path);
        //Check whether its a directory or not
       
        
        if (is_dir($resource_path)) {
            $viewsContents = scandir($resource_path);
            var_dump($viewsContents);
            $specific_path='posts/index.php';

            $find_if_folders_exist_or_not=explode(separator:"/",string:$specific_path);
               var_dump("All files and folders");
            var_dump($find_if_folders_exist_or_not);
        }else{
            var_dump("Directory is not there");
        }
        


 


 die();

// // Optionally, use realpath to resolve any symbolic links and verify the path exists
 var_dump($viewsPath);
 die();
    }
    public function index_TWO(){
        echo "Index  method two from Post Controller";
    }
}


?>