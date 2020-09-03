<?php

namespace OpenClassrooms\Blog\Model;

class Manager
{
    protected function dbConnect()
    {
        $host_name = 'localhost';
        $database = 'test';
        $user_name = 'root';
        $password = '';
        $dbh = new \PDO("mysql:host=$host_name; dbname=$database; charset=utf8", $user_name, $password);
        return $dbh;
    }
}
