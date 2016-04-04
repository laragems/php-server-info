<?php

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInfoInterface;

class Linux implements OSInfoInterface
{

    public function getName()
    {
        return 'linux';
    }

    public function getVersion()
    {

    }
}