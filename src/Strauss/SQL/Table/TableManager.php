<?php 

namespace Strauss\SQL\Table;

use \Strauss\Dev\Util\Logger\Logger;
use \Strauss\SQL\DB;
use \Strauss\SQL\Table;

class TableManager 
{

    private static $instance = null;

    public static function getInstance() 
    {
        if (empty(static::$instance))
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    private function __construct()
    {
        $this->DB = DB::getInstance();

        $this->Logger = Logger::getLogger();
        $this->Logger->debug('Table manager instantiated');
    }

    private $DB;
    private $Logger;
    private $Tables = [];

    public function create($name, $Model, $options = [])
    {
        $this->Logger->debug("Creating new table object [{$name}]...");

        if (!isset($this->Tables[$name]))
            $this->Tables[$name] = new Table($name, $Model, $options);

        return $this->Tables[$name];
    }

}