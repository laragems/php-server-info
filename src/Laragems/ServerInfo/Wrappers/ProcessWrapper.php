<?php

/**
 * Copyright Marius Puiu <puiumarius@gmail.com>
 *
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Laragems\ServerInfo\Wrappers;

use Symfony\Component\Process\Process;

/**
 * Class ProcessWrapper
 * @package Laragems\ServerInfo\Wrappers
 */
class ProcessWrapper
{
    /**
     * Get the output of the specified command
     *
     * @param $command string
     * @return string|null
     */
    public static function getOutput($command)
    {
        try
        {
            $process = new Process($command);
            $process->run();

            if($process->isSuccessful())
            {
                return $process->getOutput();
            }
        }
        catch(\Exception $e)
        {
            // We don't care about the Process Exception.
        }

        return null;
    }
}