<?php 

function StraussAutoload($class)
{
    $class = str_replace('\\', DS, $class);
    //echo SRC . $class . '.php';
    @include(SRC . $class . '.php');
}

spl_autoload_register('StraussAutoload');