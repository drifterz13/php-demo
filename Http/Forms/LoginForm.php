<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];

    public function validate(String $email, String $password)
    {

        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide an invalid email';
        }

        if (!Validator::string($password, 7, 255)) {
            $this->errors['password'] = 'Password must be at least 7 characters long';
        }

        return empty($this->errors);
    }

    public function error(String $field, String $message)
    {
        $this->errors[$field] = $message;
    }


    public function errors()
    {
        return $this->errors;
    }
}
