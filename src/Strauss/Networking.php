<?php 

namespace Strauss;

use \Strauss\Dev\Util\Logger\Logger;

class Networking 
{

    public static function getRemoteIPAddress()
    {
        $ip = "";

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else 
            $ip = $_SERVER['REMOTE_ADDR'];

        return $ip;
    }

    public static function getURI()
    {
        $rel_path = str_replace(SRV_ROOT, "", ROOT); // Remove server root from project root
        $rel_path = '/' . rtrim($rel_path, DS); // Reformat as URI

        return str_replace($rel_path, "", $_SERVER['REQUEST_URI']); // Return relative URI to project root
    }

    public static function redirect($path)
    {
        $rel_path = str_replace(SRV_ROOT, '', ROOT);
        $rel_path = '/' . rtrim($rel_path, DS);
        $path = $rel_path . $path;

        self::log("Redirecting user to {$path}");

        header('Location: ' . $path);
    }

    private static function log($message)
    {
        $Logger = Logger::getLogger();
        $Logger->info($message);
    }

}