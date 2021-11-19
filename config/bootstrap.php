<?php 

define("DS", DIRECTORY_SEPARATOR);

define("ROOT", dirname(__DIR__) . DS);

define("APP", ROOT . 'application' . DS);
define("CONTROLLERS", APP . 'controllers' . DS);
define("MODELS", APP . 'models' . DS);
define("VIEWS", APP. 'views' . DS);

define("CONFIG", ROOT . 'config' . DS);

define("SRC", ROOT . 'src' . DS);

define("SRV_ROOT", str_replace('/', DS, $_SERVER['DOCUMENT_ROOT']) . DS);