<?php

namespace Core;

class Container
{
    private $bindings = [];

    public function bind(String $key, callable $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(String $key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("Not found binding key: $key");
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}
