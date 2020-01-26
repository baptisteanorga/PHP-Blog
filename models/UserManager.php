<?php

namespace models;

class UserManager extends Manager {

    // add User
    public function addUser($pseudo, $password, $email)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('INSERT INTO users (pseudo, password, email) VALUES (?, ?, ?)');
        $request->execute(array($pseudo, $password, $email));
    }

    // Check User
    public function checkUserPseudo($pseudo)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
        $request->execute(array($pseudo));
        global $checkedUserPseudo;
        $checkedUserPseudo = $request->rowCount();
        return $checkedUserPseudo;
    }

    // check User Email
    public function checkUserEmail($email)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('SELECT * FROM users WHERE email = ?');
        $request->execute(array($email));
        global $checkedUserEmail;
        $checkedUserEmail = $request->rowCount();
        return $checkedUserEmail;
    }


    // Check User Params
    public function checkUserParams($pseudo)
    {
        $db = $this->dbConnect();
        $request = $db->prepare('SELECT * FROM users WHERE pseudo = ?');
        $request->execute(array($pseudo));
        global $checkedUserParams;
        $checkedUserParams = $request->fetch();
        return $checkedUserParams;
    }

}