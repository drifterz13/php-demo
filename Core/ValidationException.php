<?php

namespace Core;

class ValidationException extends \Exception
{
    public readonly array $errors;
    public readonly array $old;

    public static function throw(array $errors, array $old = [])
    {
        $exception = new self();
        $exception->errors = $errors;
        $exception->old = $old;

        throw $exception;
    }
}
