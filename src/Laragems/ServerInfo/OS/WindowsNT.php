<?php

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInfoInterface;

class WindowsNT implements OSInfoInterface
{

    public function getName()
    {
        return 'Windows';
    }

    public function getVersion()
    {

    }
}