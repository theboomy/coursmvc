<?php

namespace OpenClassrooms\Blog\Model;

require_once(__DIR__ . "/Manager.php");

class MinichatManager extends Manager
{
    public function dbMinichat()
    {
        $db = $this->dbConnect();

        $dbMessage = $db->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
        $dbMessage->execute(array($_POST['pseudo'], $_POST['message']));

        $reqMsg = $db->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 100');
        return $reqMsg;
    }
}
