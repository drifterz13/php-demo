<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected $errors = [];

    private function __construct(public array $attributes)
    {
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide an invalid email';
        }

        if (!Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = 'Password must be at least 7 characters long';
        }
    }

    public static function validate($attributes)
    {
        $instance = new self($attributes);

        return $instance->hasErrors() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors, $this->attributes);
    }

    protected function hasErrors()
    {
        return count($this->errors);
    }

    public function error(String $field, String $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }


    public function errors()
    {
        return $this->errors;
    }
}
