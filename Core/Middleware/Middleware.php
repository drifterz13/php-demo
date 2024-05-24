<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class
    ];

    public static function resolve(String|null $key)
    {
        if (!$key) {
            return;
        }

        if (!array_key_exists($key, self::MAP)) {
            throw new \Exception("Middleware '$key' not found");
        }

        $middleware = self::MAP[$key];


        (new $middleware)->handle();
    }
}
