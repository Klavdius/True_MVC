<?php

namespace Core;

class Factory
{
    private static $singletons = [];

    public static function createSingleton(string $classname)
    {
        if (!isset(self::$singletons[$classname])) {
            $singleton = self::create($classname);
            if ($singleton) {
                self::$singletons[$classname] = $singleton;
            }
        }

        return self::$singletons[$classname] ?? null;
    }

    public static function create(string $classname)
    {
        if (class_exists($classname)) {
            return new $classname;
        }
        return null;
    }
}
