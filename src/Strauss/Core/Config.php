<?php 

namespace Strauss\Core;

class Config 
{

    private static $config = [];

    public static function load($name)
    {
        $name = str_replace(['/', '\\', '.'], [DS,DS,DS], $name);

        $filepath = CONFIG . $name . '.php';
        if (!file_exists($filepath))
        {
            throw new \Exception("Config file '{$name}.php' not found...");
        }

        $data = include($filepath);

        static::$config = array_merge(static::$config, $data);
    }

}