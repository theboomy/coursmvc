<?php

session_start();


$routes = require(__DIR__ . "/config/routes.php");

try {
    $route = $routes[$_GET["action"] ?? "listPosts"];
    $controller = new $route["controller"]();
    $controller->{$route["method"]}();
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}
