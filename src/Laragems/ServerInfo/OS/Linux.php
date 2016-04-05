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

    function __construct()
    {
        $this->type = OSType::LINUX;
        $this->basicName = 'Linux';

        $this->processRelease()->processProcVersion();
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
        return ProcessWrapper::getOutput('cat /etc/*-release');
    }

    private function getProcVersion()
    {
        return ProcessWrapper::getOutput('cat /proc/version');
    }

    private function processRelease()
    {
        if($output = $this->getRelease())
        {
            // TODO: process release information
        }

        return $this;
    }

    private function processProcVersion()
    {
        if($output = $this->getProcVersion())
        {
            // TODO: process proc version information
        }

        return $this;
    }
}