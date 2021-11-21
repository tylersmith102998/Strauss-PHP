<?php 

namespace Strauss\Application;

use \Strauss\Application\Model\ModelManager;
use \Strauss\Dev\Util\Logger\Logger;

class Controller 
{

    protected $Logger;
    protected $Model;
    protected $Route;

    public function __construct($Route)
    {
        $this->Route = $Route;
        $this->Logger = Logger::getLogger();

        $this->Logger->debug(get_class($this) . ' loaded');

        $this->Model = ModelManager::getInstance();
    }

}