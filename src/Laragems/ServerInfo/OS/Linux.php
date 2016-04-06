<?php

/**
 * Copyright Marius Puiu <puiumarius@gmail.com>
 *
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInterface;
use Laragems\ServerInfo\Interfaces\UnixInterface;
use Laragems\ServerInfo\Utils\ProcessWrapper;

/**
 * Class Linux
 * @package Laragems\ServerInfo\OS
 */
class Linux implements OSInterface, UnixInterface
{
    private $type;
    private $basicName;
    private $distributionName;
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

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @inheritdoc
     */
    public function getBasicName()
    {
        return $this->basicName;
    }

    /**
     * @inheritdoc
     */
    public function getDistributionName()
    {
        return $this->distributionName;
    }

    /**
     * @inheritdoc
     */
    public function getOSVersion()
    {
        return $this->osVersion;
    }

    /**
     * @inheritdoc
     */
    public function getOSMajorVersion()
    {
        return $this->osMajorVersion;
    }

    /**
     * @inheritdoc
     */
    public function getOSMinorVersion()
    {
        return $this->osMinorVersion;
    }

    /**
     * @inheritdoc
     */
    public function getOSBuildVersion()
    {
        return $this->osBuildVersion;
    }

    /**
     * @inheritdoc
     */
    public function getKernelVersion()
    {
        return $this->kernelVersion;
    }

    /**
     * @inheritdoc
     */
    public function getKernelMajorVersion()
    {
        return $this->kernelMajorVersion;
    }

    /**
     * @inheritdoc
     */
    public function getKernelMinorVersion()
    {
        return $this->kernelMinorVersion;
    }

    /**
     * @inheritdoc
     */
    public function getKernelBuildVersion()
    {
        return $this->kernelBuildVersion;
    }

    /**
     * Get /etc/*-release files contents
     *
     * @return null|string
     */
    private function getRelease()
    {
        return ProcessWrapper::getOutput('cat /etc/*-release');
    }

    /**
     * Get /proc/version contents
     *
     * @return null|string
     */
    private function getProcVersion()
    {
        return ProcessWrapper::getOutput('cat /proc/version');
    }

    /**
     * Process /etc/*-release files contents
     *
     * @return $this
     */
    private function processRelease()
    {
        if($output = $this->getRelease())
        {
            $pattern = '/^NAME="([A-Za-z0-9\s+]+)"/m';
            preg_match($pattern, $output, $matches);

            if(!empty($matches[1]))
            {
                $this->distributionName = $matches[1];
            }
        }

        return $this;
    }

    /**
     * Process /proc/version file contents
     *
     * @return $this
     */
    private function processProcVersion()
    {
        if($output = $this->getProcVersion())
        {
            $pattern = '/Linux version\s+(\d+.\d+.\d+)/';
            preg_match($pattern, $output, $matches);

            $version = explode('.', $matches[1]);

            if(count($version) >= 2)
            {
                $this->kernelVersion = $matches[1];

                $this->kernelMajorVersion = $version[0];
                $this->kernelMinorVersion = $version[1];

                // Build number might not be available
                $this->kernelBuildVersion = isset($version[2]) ? $version[2] : null;
            }
        }

        return $this;
    }
}