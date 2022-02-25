<?php

require_once 'Model/Manager.php';

class UserManager extends Manager
{
    public function __construct()
    {
        $this->bdd = $this->bddConnect();
    }

    public function getUser()
    {
        $req = $this->bdd->prepare('SELECT username FROM users WHERE id = ?');
        $req->execute([$_GET['id']]);
        $user = $req->fetch();

        return $user;
    }

    public function countUsers()
    {
        $req = $this->bdd->query('SELECT * FROM users');
        $countUsers = $req->rowCount();

        return $countUsers;
    }

    public function tokenUser($user_id,$token)
    {
        $req = $this->bdd->prepare('SELECT * FROM users WHERE id = ? AND token_confirm = ?');
        $req->execute([$user_id,$token]);
        $tokenUser = $req->fetch();

        return $tokenUser;
    }

    public function tokenConfirm($user_id)
    {
        $req = $this->bdd->prepare('UPDATE users SET token_confirm = NULL, token_date = NOW() WHERE id = ?');
        $req->execute([$user_id]);

    }

}    