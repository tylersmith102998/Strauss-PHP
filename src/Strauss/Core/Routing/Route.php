<?php 

namespace Strauss\Core\Routing;

use \Strauss\Dev\Util\Logger\Logger;

class Route 
{

    private $Controller;
    private $Logger;

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

    public function execute($params)
    {
        $this->Logger->debug("Attempting to execute route...");

        if (!method_exists($this->Controller, $this->method_name))
        {
            throw new \Exception("Method [{$this->method_name}] not present in " . get_class($this->Controller));
        }

        return call_user_func_array([$this->Controller, $this->method_name], $params);
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getControllerName()
    {
        return $this->controller_name;
    }

    public function getControllerObject()
    {
        $namespace = "Controllers\\" . $this->controller_name;

        $this->Logger->debug("Attempting to instantiate controller object");

        try 
        {
            $this->Controller = new $namespace($this);
        }
        catch (\Exception $e)
        {
            $this->Logger->error("Error instantiating controller object: " . $e->getMessage());
            die();
        }

        return $this->Controller;
    }

    public function getMethodName() 
    {
        return $this->method_name;
    }

}