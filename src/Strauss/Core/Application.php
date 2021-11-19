<?php 

namespace Strauss\Core;

use \Strauss\Core\Config;
use \Strauss\Core\Routing\Router;
use \Strauss\Dev\Util\Logger\TextLoggerFactory;

class Application 
{

    public $Logger;

    private $Router;

    public function __construct()
    {
        Config::load('strauss.core');   
        
        try // loading in Logger
        {
            $logging_type = Config::get('Strauss.Core.Logger.type');

            if ($logging_type == 'file')
            {
                $loggerFactory = new TextLoggerFactory();
            }

            $this->Logger = $loggerFactory->getLogger();

            $this->Logger->debug('Logger instantiated.');
        }
        catch (\Exception $e)
        {
            die ("Caught exception " . $e->getMessage() . "\r\n");
        }

        $this->Router = new Router($this);
    }

}