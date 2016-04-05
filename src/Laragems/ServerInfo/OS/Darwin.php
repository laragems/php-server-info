<?php

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInterface;

class Darwin implements OSInterface
{
    private $type;
    private $basicName;
    private $osVersion;
    private $kernelVersion;

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
        return $this->osVersion;
    }

    public function getKernelVersion()
    {
        return $this->kernelVersion;
    }
}