<?php

/**
 * Copyright Marius Puiu <puiumarius@gmail.com>
 *
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Laragems\ServerInfo;

use Laragems\ServerInfo\Exceptions\OSNotFoundException;
use Laragems\ServerInfo\Interfaces\OSInterface;

/**
 * Class ServerInfo
 * @package Laragems\ServerInfo
 */
class ServerInfo
{
    /**
     * Get a server instance based on the Operating System type.
     *
     * @return OSInterface
     * @throws OSNotFoundException
     */
    public static function getServer()
    {
        $osName = str_replace(' ', '', php_uname('s'));
        $className = "\\" . __NAMESPACE__ . "\\OS\\$osName";

        if(class_exists($className))
        {
            return new $className();
        }

        throw new OSNotFoundException();
    }

    /**
     * You should not new this class by yourself.
     */
    private function __construct() { }
}