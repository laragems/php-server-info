<?php

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInterface;
use Laragems\ServerInfo\Wrappers\ProcessWrapper;

class Linux implements OSInterface
{
    private $type;
    private $basicName;
    private $osVersion;
    private $kernelVersion;

    private $releaseOutput;
    private $procVersion;

    function __construct()
    {
        $this->type = OSType::LINUX;
        $this->basicName = 'Linux';

        $this->getRelease()->getProcVersion();
    }

    private function getRelease()
    {
        $this->releaseOutput = ProcessWrapper::getOutput('cat /etc/*-release');

        return $this;
    }

    private function getProcVersion()
    {
        $this->procVersion = ProcessWrapper::getOutput('cat /proc/version');

        return $this;
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