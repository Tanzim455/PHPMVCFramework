<?php


echo "Hello World";

$method=$_SERVER['REQUEST_METHOD'];

$parse_url=parse_url($_SERVER['REQUEST_URI']);

var_dump($parse_url["path"]);

