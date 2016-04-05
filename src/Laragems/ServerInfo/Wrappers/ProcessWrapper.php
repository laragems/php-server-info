<?php

namespace Laragems\ServerInfo\Wrappers;


class ProcessWrapper
{
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