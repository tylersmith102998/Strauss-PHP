<?php 

namespace Strauss\Application;

use \Strauss\Dev\Util\Logger\Logger;

class Controller 
{

    protected $Logger;
    protected $Route;

    public function __construct($Route)
    {
        $this->Route = $Route;
        $this->Logger = Logger::getLogger();

        $this->Logger->debug(get_class($this) . ' loaded');
    }

}