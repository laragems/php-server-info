<?php

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInterface;
use Laragems\ServerInfo\Wrappers\ProcessWrapper;

class Linux extends BaseOS implements OSInterface
{
    private $releaseOutput;
    private $procVersion;

    function __construct()
    {
        $this->type = OSType::LINUX;
        $this->name = 'Linux';

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
        // TODO: Implement getOSVersion() method.
    }

    public function getKernelVersion()
    {
        // TODO: Implement getKernelVersion() method.
    }
}