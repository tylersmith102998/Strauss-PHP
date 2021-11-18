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

    public static function get($setting)
    {
        $config = static::$config;
        $setting = explode('.', $setting);

        foreach ($setting as $i)
        {
            if (isset($config[$i]))
            {
                $config = $config[$i];
            }
            else 
            {
                return null;
            }
        }

        return $config;
    }

    public static function set($setting, $value)
    {

    }

}