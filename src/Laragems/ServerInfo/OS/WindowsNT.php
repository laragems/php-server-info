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