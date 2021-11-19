<?php 

use \Strauss\Core\Routing\Router;
use \Strauss\Core\Routing\Route;

Router::add(
    new Route('/', ['Strauss.Main' => 'Index'])
);