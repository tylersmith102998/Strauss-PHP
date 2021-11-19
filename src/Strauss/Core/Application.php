<?php 

namespace Strauss\Core;

use \Strauss\Core\Config;
use \Strauss\Dev\Util\Logger;

class Application 
{

    public $Logger;

    public function __construct()
    {
        Config::load('strauss.core');            
    }

}