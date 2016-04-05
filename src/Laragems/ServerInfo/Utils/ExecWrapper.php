<?php

/**
 * Copyright Marius Puiu <puiumarius@gmail.com>
 *
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Laragems\ServerInfo\Utils;

/**
 * Class ExecWrapper
 * @package Laragems\ServerInfo\Utils
 */
class ExecWrapper
{
    /**
     * Get the output of the specified command
     *
     * @param $command string
     * @return string|null
     */
    public static function getOutput($command)
    {
        if($output = trim(shell_exec($command)))
        {
            return $output;
        }

        return null;
    }
}