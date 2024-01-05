<?php


class User
{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function login($username, $password)
    {
        $user = $this->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }

        return false;
    }

    private function getUserByUsername($username)
    {
        $sql = "SELECT id, username, password FROM users WHERE username = $username";
        $user = $this->db->query($sql, [$username])->fetch();

        return $user;
    }
}
