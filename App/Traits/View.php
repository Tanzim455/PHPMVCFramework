<?php 
declare(strict_types=1);
namespace App\Traits;

  
trait View{
  
// require_once './views/post.php';


public function views(string $view){
    $parts = explode("/", $view);
   
    
    if (count($parts) == 2) {
        $folder = $parts[0];
        $file = $parts[1];
       $user_folder = dirname(__DIR__, 2); // Moves one level up
         
       $views_path="$user_folder/resources/views";
       $scannned_directories=scandir(directory:$views_path);
       

        
           
        if (!is_dir($user_folder)) {
           return  $this->displayViewError("Directory '{$folder}' does not exist");
        }

        $files_only =$this->getPhpFilesInDir($user_folder);
          
        if (!in_array($file, $files_only)) {
            return $this->displayViewError("File '{$file}' not found in '{$folder}' directory");
        }

        include "$user_folder/$file";
    } elseif (count($parts) == 1) {
        $filename = trim($parts[0]);
        
        $user_views_folder = dirname(__DIR__, 2);
        
        
        $views_dir = "$user_views_folder/resources/views";
        
      
        if (!is_dir($views_dir)) {
            return $this->displayViewError(message:"Views directory does not exist");
        }

        $files_only =$this->getPhpFilesInDir($views_dir);
        
        if (!in_array(needle:$filename,haystack:$files_only)) {
            return $this->displayViewError(message:"File '{$filename}' not found in views directory");
        }

        include "$views_dir/$filename";
      
    } else {
        return $this->displayViewError(message:"Invalid view format. Use 'folder/file.php' or 'file.php");
    }
}

public function getPhpFilesInDir(string $dir): array {
    $scan = scandir($dir);
    if ($scan === false) return [];
    return array_filter($scan, function($item) use ($dir) {
        $path = $dir . "/" . $item;
        return is_file($path) && $item != "." && $item != ".." && str_ends_with($item, '.php');
    });
}

public function displayViewError(string $message): void {
    error_log("View Error: $message");
    echo "Error loading view: $message";
}
}