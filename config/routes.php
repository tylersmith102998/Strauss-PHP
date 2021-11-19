<?php 

use \Strauss\Core\Routing\Router;
use \Strauss\Core\Routing\Route;

Router::add(
    new Route('/',           ['Strauss.Main' => 'Index']),
    new Route('/home',       ['Strauss.Main' => 'Index']),
    new Route('/home/index', ['Strauss.Main' => 'Index'])
);

Router::add(
    new Route('/404', ['Strauss.Errors' => '_404'])
);