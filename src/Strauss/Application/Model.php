<?php 

namespace Strauss\Application;

use Strauss\SQL\DB;
use Strauss\SQL\Table\TableManager;

class Model 
{

    protected $Table;

    private $DB;

    public function __construct()
    {
        $this->DB = DB::getInstance();
        $this->Table = TableManager::getInstance();
    }

}