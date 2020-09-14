<?php

require(__DIR__ . "/../controller/FrontController.php");

return [
    "incription" => [
        "controller" => FrontController::class,
        "method" => "incription",
    ],
    "connect" => [
        "controller" => FrontController::class,
        "method" => "connect",
    ],

    "deconnexion" => [
        "controller" => FrontController::class,
        "method" => "deconnexion",
    ],
    "listPosts" => [
        "controller" => FrontController::class,
        "method" => "listPosts",
    ],
    "post" => [
        "controller" => FrontController::class,
        "method" => "post",
    ],
    "addPost" => [
        "controller" => FrontController::class,
        "method" => "addPost",
    ],
    "editPost" => [
        "controller" => FrontController::class,
        "method" => "editPost",
    ],
    "editedPost" => [
        "controller" => FrontController::class,
        "method" => "editedPost",
    ],
    "addComment" => [
        "controller" => FrontController::class,
        "method" => "addComment",
    ],
    "editComment" => [
        "controller" => FrontController::class,
        "method" => "editComment",
    ],
    "editedComment" => [
        "controller" => FrontController::class,
        "method" => "editedComment",
    ],
    "miniChat" => [
        "controller" => FrontController::class,
        "method" => "miniChat",
    ],
];
