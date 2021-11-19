<?php 

namespace Strauss\Core\Routing;

use \Strauss\Networking;

class Router 
{

    private $App;

    public function __construct($App)
    {
        $this->App = $App;
        $App->Logger->info("New connection from " . Networking::getRemoteIPAddress());
        $App->Logger->info("Requested page: " . Networking::getURI());
    }

}