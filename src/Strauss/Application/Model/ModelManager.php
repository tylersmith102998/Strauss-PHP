<?php 

namespace Strauss\Application\Model;

use \Strauss\Dev\Util\Logger\Logger;

class ModelManager 
{

    private $Logger;
    private $Models = [];

    private static $instance = null;

    public function get($model_name, $params = [])
    {
        $model_name = "Models\\" . str_replace(['.', '/'], '\\', $model_name);
        $this->Logger->debug("Attempting to find model [{$model_name}]");

        if (!class_exists($model_name))
        {
            $this->Logger->error("Model [{$model_name}] not found in application folder!");
            die();
        }

        $M = new $model_name($params);
        $this->Logger->info("Model [{$model_name}] loaded!");
        return $M;
    }

    public static function getInstance()
    {
        if (static::$instance == null)
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
        $this->Logger = Logger::getLogger();
        $this->Logger->debug('Model Manager instantiated');
    }

}