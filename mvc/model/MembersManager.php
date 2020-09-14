<?php

namespace OpenClassrooms\Blog\Model;

require_once(__DIR__ . "/Manager.php");

class MembersManager extends Manager
{

    public function newMember($pseudo, $pass_hache, $email)
    {
        $db = $this->dbConnect();
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $members = $db->prepare('INSERT INTO members(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, NOW())');

        $affectedLines = $members->execute(array($pseudo, $pass_hache, $email));

        return $affectedLines;
    }


    public function newConnexion($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pseudo, pass FROM members WHERE pseudo = ?');

        $req->execute(array($pseudo));

        return $req->fetch();
    }
}
