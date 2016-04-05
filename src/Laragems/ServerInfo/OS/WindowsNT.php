<?php

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInterface;

class WindowsNT extends BaseOS implements OSInterface
{
    function __construct()
    {
        $this->type = OSType::WINDOWS;
        $this->name = 'Windows';
    }
}