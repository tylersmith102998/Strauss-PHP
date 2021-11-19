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
    }

    public static function add(\Strauss\Core\Routing\Route ...$routes)
    {
        foreach ($routes as $route)
        {
            static::$routes[$route->getPath()] = $route;
        }
    }

}