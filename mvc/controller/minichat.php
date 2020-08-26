<?php

use OpenClassrooms\Blog\Model\MinichatManager;

require_once(__DIR__ . '/../model/MinichatManager.php');

function miniChat()
{
    $minichatManager = new MinichatManager();

    $messages = $minichatManager->dbMinichat();

    require(__DIR__ . '/../view/minichatView.php');
}
