<?php 

namespace Strauss\Dev\Util\Logger;

interface iLogger 
{
    public function info($message);
    public function debug($message);
    public function error($message);
    public function warn($message);
}