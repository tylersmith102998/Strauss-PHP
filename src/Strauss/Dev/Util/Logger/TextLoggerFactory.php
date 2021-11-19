<?php 

namespace Strauss\Dev\Util\Logger;

class TextLoggerFactory extends LoggerFactory 
{
    
    public function getLogger()
    {
        $txtLogger = TextLogger::getInstance();
        return $txtLogger;
    }

}