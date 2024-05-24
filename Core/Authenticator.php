<?php

namespace Core;

use Core\Database;

class Authenticator
{
    protected Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function attempt(String $email, String $password)
    {
        $user = $this->db->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }

        $this->login($user);

        return true;
    }

    public function login($user)
    {
        $_SESSION['user'] = $user;
        session_regenerate_id(true);
    }

    public static function logout()
    {
        Session::destroy();
    }

    public static function authorize($cond, $status = Response::FORBIDDEN)
    {
        if (!$cond) {
            Router::abort($status);
        }

        return true;
    }
}
