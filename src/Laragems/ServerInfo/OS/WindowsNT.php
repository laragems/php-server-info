<?php

/**
 * Copyright Marius Puiu <puiumarius@gmail.com>
 *
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Laragems\ServerInfo\OS;

use Laragems\ServerInfo\Interfaces\OSInterface;
use Laragems\ServerInfo\Interfaces\WindowsInterface;
use Laragems\ServerInfo\Utils\ExecWrapper;

/**
 * Class WindowsNT
 * @package Laragems\ServerInfo\OS
 */
class WindowsNT implements OSInterface, WindowsInterface
{
    private $type;
    private $basicName;
    private $osVersion;
    private $osMajorVersion;
    private $osMinorVersion;
    private $osBuildVersion;

    function __construct()
    {
        $this->type = OSType::WINDOWS;
        $this->basicName = 'Windows';

        $this->processVersion();
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
     * Get version information
     *
     * @return null|string
     */
    private function getVersion()
    {
        return ExecWrapper::getOutput('wmic os get version /value');
    }

    /**
     * Process version information
     *
     * @return $this
     */
    private function processVersion()
    {
        if($output = $this->getVersion())
        {
            $output = trim(str_ireplace('Version=', '', $output));

            $version = explode('.', $output);

            if(count($version) > 2)
            {
                $this->osVersion = $output;

                $this->osMajorVersion = $version[0];
                $this->osMinorVersion = $version[1];
                $this->osBuildVersion = $version[2];
            }
        }

        return $this;
    }
}