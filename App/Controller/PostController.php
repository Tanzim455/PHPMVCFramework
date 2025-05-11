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
             array_splice(offset:0,length:2,array:$viewsContents);
              
            //  var_dump($viewsContents);
             //Find names of all folders
             $filenames=array_filter(array:$viewsContents,callback:function($q){
                $trimmed_file=trim($q);

                $len=strlen($trimmed_file);
                $last_four=substr($trimmed_file,$len-4,$len);
                return $last_four==='.php';
             });
               var_dump($filenames);
               $folder_names=$filenames=array_filter(array:$viewsContents,callback:function($q){
                $trimmed_file=trim($q);

                $len=strlen($trimmed_file);
                $last_four=substr($trimmed_file,$len-4,$len);
                return $last_four !== '.php';
             });
            //    var_dump($folder_names);
            
            $specific_path='posts/index.php';

            if(str_contains(needle:'/',haystack:$specific_path)){
                $find_if_folders_exist_or_not=explode(separator:"/",string:$specific_path);
            //     var_dump("All files and folders");
            //  var_dump($find_if_folders_exist_or_not);
             $folder_name=$find_if_folders_exist_or_not[0];
            //  var_dump("folder name is");
             //Check for folder name
             if(in_array(needle:$folder_name,haystack:$folder_names)){
                //Get inside the folder directory
               $current_folder_resource_path=$resource_path.= "/$folder_name";
               //scan the directory
            //    var_dump($current_folder_resource_path);
               
            //    $scan_dir_of_current_directory=scandir($current_folder_resource_path);
            //    var_dump($scan_dir_of_current_directory);
            //   $filenames= array_slice(offset:0,length:3,array:$scan_dir_of_current_directory);
               
                // var_dump($current_folder_resource_path);
                include 'index.php';
               die();

              
             }else{
                var_dump("folder name doesnt exist here");
             }
             die();
            }

            
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