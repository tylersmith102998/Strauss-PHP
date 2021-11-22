<?php 

namespace Strauss\SQL\Table;

use \Strauss\Dev\Util\Logger\Logger;
use \Strauss\SQL\DB;

class TableBuilder 
{

    private $DB;
    private $Logger;
    private $Table;

    private $cols = [];

    public function __construct(\Strauss\SQL\Table $Table)
    {
        $this->DB = DB::getInstance();
        $this->Logger = Logger::getLogger();
        $this->Table = $Table;

        $this->Logger->debug("Building CREATE TABLE query for [{$this->Table->name}]");
    }

    public function addCol()
    {

    }

}