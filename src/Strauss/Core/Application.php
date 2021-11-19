<?php 

namespace Strauss\Core;

use \Strauss\Core\Config;
use \Strauss\Dev\Util\Logger\TextLoggerFactory;

class Application 
{

    public $Logger;

    public function __construct()
    {
        Config::load('strauss.core');   
        
        if (Config::get('Strauss.Core.Logger.enabled'))
        {
            try 
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
        }
    }

}