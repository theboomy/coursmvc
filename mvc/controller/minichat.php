<?php

use OpenClassrooms\Blog\Model\MinichatManager;

require_once(__DIR__ . '../model/MinichatManager.php');

// Est ce que je dois mettre ça ?
function miniChat()
{
    $minichatManager = new MinichatManager();

    $messages = $minichatManager->dbMinichat();

    require(__DIR__ . '../view/frontend/minichatView.php');
}
