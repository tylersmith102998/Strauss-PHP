<?php 

namespace Strauss\Core;

use \Strauss\Core\Config;

class Application 
{

    private $Config;

    public function __construct()
    {
        $this->Config = new Config();
    }

}