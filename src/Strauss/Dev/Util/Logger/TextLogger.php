<?php 

namespace Strauss\Dev\Util\Logger;

use \Strauss\Core\Config;
use \Strauss\Networking;

class TextLogger extends Logger 
{

    private static $instance = null;

    private $handle;

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new self;
        }

        return self::$instance;
    }

    protected function __construct()
    {
        parent::__construct();
        $this->init();
    }

    protected function write_log($message)
    {
        $this->write_string($message);
    }

    private function init()
    {
        $filename = Config::get('Strauss.Core.Logger.File.name');
        $this->handle = fopen($filename, 'a');
    }

    private function write_string($message)
    {
        $time = date("d-M-Y, h:i:s a");

        fwrite($this->handle, "[" . Networking::getRemoteIPAddress() . "] {$time} [" . strtoupper($this->message_type) . "] {$message}" . PHP_EOL);
    }

}