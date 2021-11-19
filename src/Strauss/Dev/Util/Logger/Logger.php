<?php 

namespace Strauss\Dev\Util\Logger;

use \Strauss\Core\Config;

class Logger implements iLogger 
{
    
    protected $message_type;

    private $level;

    public function __construct()
    {
        $this->level = Config::get('Strauss.Core.Logger.level');
    }

    public function debug($message) 
    {
        $this->message_type = 'debug';
        if ($this->level == 'debug')
            $this->write_log($message);
    }

    public function info($message)
    {
        $this->message_type = 'info';
        if ($this->level == 'debug' || $this->level == 'info')
            $this->write_log($message);
    }

    public function warn($message)
    {
        $this->message_type = 'warn';
        if ($this->level == 'debug' || $this->level == 'info' || $this->level == 'warn')
            $this->write_log($message);
    }

    public function error($message)
    {
        $this->message_type = 'error';
        if ($this->level == 'debug' || $this->level == 'info' || $this->level == 'warn' || $this->level == 'error')
            $this->write_log($message);
    }

    protected function write_log($message){}

}