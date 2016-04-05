<?php

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInterface;
use Laragems\ServerInfo\Wrappers\ProcessWrapper;

class Linux implements OSInterface
{
    private $type;
    private $basicName;
    private $osVersion;
    private $osMajorVersion;
    private $osMinorVersion;
    private $osBuildVersion;
    private $kernelVersion;
    private $kernelMajorVersion;
    private $kernelMinorVersion;
    private $kernelBuildVersion;

    private $releaseOutput;
    private $procVersion;

    function __construct()
    {
        $this->type = OSType::LINUX;
        $this->basicName = 'Linux';

        $this->getRelease()->getProcVersion();
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

    public function getOSMajorVersion()
    {
        return $this->osMajorVersion;
    }

    public function getOSMinorVersion()
    {
        return $this->osMinorVersion;
    }

    public function getOSBuildVersion()
    {
        return $this->osBuildVersion;
    }

    public function getKernelVersion()
    {
        return $this->kernelVersion;
    }

    public function getKernelMajorVersion()
    {
        return $this->kernelMajorVersion;
    }

    public function getKernelMinorVersion()
    {
        return $this->kernelMinorVersion;
    }

    public function getKernelBuildVersion()
    {
        return $this->kernelBuildVersion;
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
}