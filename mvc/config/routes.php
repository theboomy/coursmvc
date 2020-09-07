<?php

require(__DIR__ . "/../controller/FrontController.php");

return [
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
