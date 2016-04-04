<?php

namespace Laragems\ServerInfo;

use Laragems\ServerInfo\Exceptions\OSNotFoundException;

class ServerInfo
{
    public static function get()
    {
        $osName = str_replace(' ', '', php_uname('s'));
        $className = "\\" . __NAMESPACE__ . "\\OS\\$osName";

        if(class_exists($className))
        {
            return new $className();
        }

        throw new OSNotFoundException();
    }

    private function __construct() { }
}