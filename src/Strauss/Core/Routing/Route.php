<?php 

namespace Strauss\Core\Routing;

use \Strauss\Dev\Util\Logger\Logger;

class Route 
{

    private $path;
    private $controller_name;
    private $method_name;

    public function __construct($path, array $route)
    {
        if (count($route) > 1 || count($route) < 1)
        {
            throw new \Exception("Routes are to be formatted as an array containing 1 index, assigned as <controller> => <method>");
        }

        $this->path = $path;

        foreach ($route as $c => $m)
        {
            $this->controller_name = str_replace('.', '\\', $c);
            $this->method_name = $m;
        }

        $this->Logger = Logger::getLogger();
        $this->Logger->debug("New route added for {$this->path}");
        $this->Logger->debug("-- Controller: {$this->controller_name} | Method: {$this->method_name}");
    }

    public function getPath()
    {
        return $this->path;
    }

}