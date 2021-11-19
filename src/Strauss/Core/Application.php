<?php 

namespace Strauss\Core;

use \Strauss\Core\Config;
use \Strauss\Core\Routing\Router;
use \Strauss\Dev\Util\Logger\Logger;

class Application 
{

    public $Logger;

    private $Router;

    public function __construct()
    {
        Config::load('strauss.core');   
        
        $this->Logger = Logger::getLogger();
        $this->Logger->debug('Logger instantiated.');

        $this->Router = new Router($this);

        try 
        {
            $this->Router->execute();
            $this->Logger->info("Router execution completed successfully");
        }
        catch (\Exception $e)
        {
            $this->Logger->error($e->getMessage());
            die($e->getMessage());
        }
    }

}