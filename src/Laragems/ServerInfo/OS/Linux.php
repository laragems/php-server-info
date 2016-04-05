<?php

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInterface;

class Linux extends BaseOS implements OSInterface
{
    function __construct()
    {
        $this->type = OSType::LINUX;
        $this->name = 'Linux';
    }
}