<?php 

namespace Strauss\Core\Routing;

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
    }

    public function getPath()
    {
        return $this->path;
    }

}