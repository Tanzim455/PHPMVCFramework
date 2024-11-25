<?php

// Retrieve controller and action from the query parameters
$controller = $_GET['controller'];
$action = $_GET['action'];
//Dumping the controller

var_dump($controller);
$controllerFile = "./src/Controller/" . $controller . ".php";


// Check if the controller file exists
if (file_exists($controllerFile)) {
    include $controllerFile;

    // Check if the class exists
    if (class_exists(class:$controller)) {
        $about = new $controller();

        // Check if the action method exists
        if (method_exists($about, $action)) {
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
