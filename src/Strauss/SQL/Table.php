<?php 

namespace Strauss\SQL;

use \Strauss\Dev\Util\Logger\Logger;
use \Strauss\SQL\Table\TableBuilder;

class Table 
{

    private $options = [];

    public $name;

    private $DB;
    private $Logger;
    private $Model;

    public function __construct($name, $Model, $options)
    {
        $this->Logger = Logger::getLogger();
        $this->Logger->debug("Table object [{$name}] instantiated");

        $this->DB = DB::getInstance();
        $this->Model = $Model;

        $this->name = $name;

        $build_method = "table_build_" . $name;

        if (!$this->DB->hasTable($name))
        {
            $this->Logger->warn("Table [{$name}] not found. Attempting to create it...");

            if (!method_exists($this->Model, $build_method))
            {
                $this->Logger->error("Model [" . get_class($this->Model) . "] does not have method [{$build_method}]. Unable to create table [{$name}]");
                die();
            }

            $B = new TableBuilder($this);
            $this->Model->$build_method($B);
        }
    }

}