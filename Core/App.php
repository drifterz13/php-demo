<?php

namespace Core;

class App
{
    private static $container;

    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }

    public static function bind(String $key, callable $resolver)
    {
        static::$container->bind($key, $resolver);
    }

    public static function resolve(String $key)
    {
        return static::$container->resolve($key);
    }
}
