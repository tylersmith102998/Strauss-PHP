<?php 

namespace Strauss\Core\Routing;

use \Strauss\Networking;

class Router 
{

    private $App;
    private $Route;

    private $params = [];

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
            $App->Logger->error("Routes file not found at {$file_path}");
            throw new \Exception("Routes file not found at {$file_path}");
        }

        require($file_path);

        if (!$this->detectRoute())
        {
            Networking::redirect('/404');
        }
    }

    public function execute()
    {
        if (is_object($this->Route))
        {
            $C = $this->Route->getControllerObject();
            return $this->Route->execute($this->params);
        }
        else 
        {
            $this->App->Logger->error('Attempted to execute route on a non-object');
        }
    }

    public static function add(\Strauss\Core\Routing\Route ...$routes)
    {
        foreach ($routes as $route)
        {
            static::$routes[$route->getPath()] = $route;
        }
    }

    private function detectRoute()
    {
        $req = explode('/', ltrim(Networking::getURI(), '/'));
        $attempt = $req;

        foreach ($req as $uri_piece)
        {
            $path = '/' . implode('/', $attempt);
            $this->App->Logger->debug("Searching known routes for [{$path}]");

            if (isset(static::$routes[$path]))
            {
                $this->params = array_filter(explode('/', str_replace($path, '', Networking::getURI())));

                $this->Route = static::$routes[$path];
                $this->App->Logger->debug("Determined route to be [{$path}]");
                $this->App->Logger->debug("-- Controller Name: " . $this->Route->getControllerName());
                $this->App->Logger->debug("-- Method Name: " . $this->Route->getMethodName());
                $this->App->Logger->debug("-- Parameters: [" . implode(', ', $this->params) . "]");
                return true;
            }
            else 
            {
                array_pop($attempt);
            }
        }

        // Runs only if route not found.
        $this->App->Logger->warn("Route not determined from path [" . Networking::getURI() . "]");
        return false;
    }

}