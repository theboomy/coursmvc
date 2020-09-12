<?php

namespace OpenClassrooms\Blog\Model;

require_once(__DIR__ . "/Manager.php");

class MembersManager extends Manager
{
    public function member()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT pseudo, pass, email FROM members');

        return $req;
    }

    public function newMember($pseudo, $pass_hache, $email)
    {
        $db = $this->dbConnect();
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $members = $db->prepare('INSERT INTO members(pseudo, pass, email, date_inscription) VALUES(?, ?, ?, NOW())');

        $affectedLines = $members->execute(array($pseudo, $pass_hache, $email));

        return $affectedLines;
    }

    public function connexion()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT pseudo, pass, email FROM members');

        return $req;
    }


    public function newConnexion($pseudo)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, pass FROM members WHERE pseudo = ?');

        $req->execute(array($pseudo));

        return $req->fetch();
    }
}
