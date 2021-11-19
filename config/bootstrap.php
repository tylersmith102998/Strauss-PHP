<?php 

define("DS", DIRECTORY_SEPARATOR);
define("ROOT", dirname(__DIR__) . DS);
define("CONFIG", ROOT . 'config' . DS);
define("SRC", ROOT . 'src' . DS);

define("SRV_ROOT", str_replace('/', DS, $_SERVER['DOCUMENT_ROOT']) . DS);