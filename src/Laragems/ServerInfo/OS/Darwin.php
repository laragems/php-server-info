<?php

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInterface;

class Darwin extends BaseOS implements OSInterface
{
    function __construct()
    {
        $this->type = OSType::MACOS;
        $this->basicName = 'MacOS';
    }

    public function getType()
    {
        return $this->type;
    }

    public function getBasicName()
    {
        return $this->basicName;
    }

    public function getOSVersion()
    {
        // TODO: Implement getOSVersion() method.
    }

    public function getKernelVersion()
    {
        // TODO: Implement getKernelVersion() method.
    }
}