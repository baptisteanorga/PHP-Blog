<?php
namespace models;
class Manager {

    // Connexion bdd
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=;dbname=;charset=utf8', '', '');
        return $db;
    }

}
