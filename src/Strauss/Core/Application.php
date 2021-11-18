<?php 

namespace Strauss\Core;

use \Strauss\Core\Config;

class Application 
{

    public function __construct()
    {
        Config::load('strauss.core');
    }

}