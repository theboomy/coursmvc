<?php

class Controller
{
    public function render($view, $data = [])
    {
        extract($data);
        ob_start();
        require(__DIR__ . '/../view/' . $view);
        $content = ob_get_clean();
        require(__DIR__ . '/../view/frontend/template.php');
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
    }
}
