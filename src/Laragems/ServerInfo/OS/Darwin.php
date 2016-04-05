<?php

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInterface;

class Darwin extends BaseOS implements OSInterface
{
    function __construct()
    {
        $this->type = OSType::MACOS;
        $this->name = 'MacOS';
    }
}