<?php 

namespace Controllers\Strauss;

class Main extends \Strauss\Application\Controller
{

    public function Index() 
    {
        $this->Model->get('Strauss.Test');
    }

}