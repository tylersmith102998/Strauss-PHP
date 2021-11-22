<?php 

namespace Models\Strauss;

class Test extends \Strauss\Application\Model
{

    public function __construct()
    {
        parent::__construct();

        $TUsers = $this->Table->create('users', $this);
    }

    public function table_build_users($TB)
    {
        echo 'build a table';
    }

}