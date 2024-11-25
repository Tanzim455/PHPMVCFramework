<?php

$request=parse_url(url:$_SERVER['REQUEST_URI'])['path'];

// print_r(value:$request);
//Convert the string to array
$explode=explode(separator:'/',string:$request);



$requested_paths=array_slice(array:$explode,offset:2,length:count($explode));



// // Retrieve controller and action from the query parameters
$controller = $requested_paths[0];
$action = $requested_paths[1];
//Dumping the controller

// var_dump($controller);
 $controllerFile = "./src/Controller/" . $controller . ".php";

// var_dump(class_exists(class:$controller));

// // Check if the controller file exists
if (file_exists($controllerFile)) {
    include $controllerFile;

    // Check if the class exists
    if (class_exists(class:$controller)) {
        $about = new $controller();

        // Check if the action method exists
        if (method_exists(object_or_class:$about,method:$action)) {
            // Call the action method
            $about->$action();
        } else {
            echo "The method `$action` does not exist in the `$controller` class.";
        }
    } else {
        echo "Class `$controller` does not exist.";
    }
} else {
    echo "Controller file for `$controller` does not exist.";
}

// To get all server info

