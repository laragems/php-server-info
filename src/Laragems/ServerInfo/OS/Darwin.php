<?php

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInfoInterface;

class Darwin implements OSInfoInterface
{

    public function getName()
    {
        return 'MacOS';
    }

    public function getVersion()
    {

    }
}