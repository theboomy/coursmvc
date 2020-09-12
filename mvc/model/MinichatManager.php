<?php

namespace OpenClassrooms\Blog\Model;

require_once(__DIR__ . "/Manager.php");

class MinichatManager extends Manager
{
    public function dbMinichat($pseudo, $message)
    {
        $db = $this->dbConnect();

        $dbMessage = $db->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
        $dbMessage->execute(array($pseudo, $message));

        return $dbMessage;
    }

    public function displayDbMinichat()
    {
        $db = $this->dbConnect();

        $reqMsg = $db->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 100');

        return $reqMsg;
    }
}
