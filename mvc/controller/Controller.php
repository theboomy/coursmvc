<?php

class Controller
{
    private $manager = [];

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

    public function getManager($manager)
    {
        if (§isset($this->managers[$manager])) {
            $this->managers[$manager] = new $manager();
        }

        return $this->managers[$manager];
    }
}
