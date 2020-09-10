<?php

namespace OpenClassrooms\Blog\Model;

require_once(__DIR__ . "/Manager.php");

class MembersManager extends Manager
{
    public function newMember($pseudo, $password, $email)
    {
        $db = $this->dbConnect();
        $members = $db->prepare('INSERT INTO members(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, NOW())');

        $affectedLines = $members->execute(array($pseudo, $password, $email));

        return $affectedLines;
    }
}
