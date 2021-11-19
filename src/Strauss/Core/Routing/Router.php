<?php 

namespace Strauss\Core\Routing;

use \Strauss\Networking;

class Router 
{

    private $App;

    private static $routes = [];

    public function __construct($App)
    {
        $this->App = $App;
        $App->Logger->info("New connection from " . Networking::getRemoteIPAddress());
        $App->Logger->info("Requested page: " . Networking::getURI());

        $App->Logger->debug("Loading in routes from routes.php");
        $file_path = CONFIG . 'routes.php';
        if (!file_exists($file_path))
        {
            throw new \Exception("Routes file not found at {$file_path}");
        }

        require($file_path);
    }

    public static function add(\Strauss\Core\Routing\Route ...$routes)
    {
        foreach ($routes as $route)
        {
            static::$routes[$route->getPath()] = $route;
        }
    }

}