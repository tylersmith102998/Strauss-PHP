<?php 

function StraussAutoload($class)
{
    $class = str_replace('\\', DS, $class);
    //echo SRC . $class . '.php';
    @include(SRC . $class . '.php');
}

function AppAutoload($class)
{
    $class = str_replace('\\', DS, $class);
    @include(APP . $class . '.php');
}

spl_autoload_register('StraussAutoload');
spl_autoload_register('AppAutoload');