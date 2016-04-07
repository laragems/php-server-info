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
    private $architecture;

    function __construct()
    {
        $this->type = OSType::LINUX;
        $this->basicName = 'Linux';

        $this->process();
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
     * @inheritdoc
     */
    public function getArchitecture()
    {
        return $this->architecture;
    }

    /**
     * Get Scripts/GetOSRelease.sh JSON info
     *
     * @return null|string
     */
    private function getReleaseScriptJSON()
    {
        return ProcessWrapper::getOutput('sh ' . dirname(__FILE__) . '/../Scripts/GetOSRelease.sh');
    }

    /**
     * Get /etc/*-release info
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
     * Process Linux info
     *
     * @return bool
     */
    private function process()
    {
        //$this->processFallback();
        $json = $this->getReleaseScriptJSON();

        if(!empty($json) && $data = json_decode($json, true))
        {
            $this->distributionName = !empty($data['dist']) ? $data['dist'] : null;

            $this->osVersion = !empty($data['os_version']) ? $data['os_version'] : null;
            $this->osMajorVersion = isset($data['os_major_version']) ? intval($data['os_major_version']) : null;
            $this->osMinorVersion = isset($data['os_minor_version']) ? intval($data['os_minor_version']) : null;
            $this->osBuildVersion = isset($data['os_build_version']) ? intval($data['os_build_version']) : null;

            $this->kernelVersion = !empty($data['kernel_version']) ? $data['kernel_version'] : null;
            $this->kernelMajorVersion = isset($data['kernel_major_version']) ? intval($data['kernel_major_version']) : null;
            $this->kernelMinorVersion = isset($data['kernel_minor_version']) ? intval($data['kernel_minor_version']) : null;
            $this->kernelBuildVersion = isset($data['kernel_build_version']) ? intval($data['kernel_build_version']) : null;

            return true;
        }

        return $this->processFallback();
    }

    /**
     * Some distros might contain suffixes in their release name. This function removes them
     *
     * @param $distroName string
     * @return string
     */
    private function removeSuffixes($distroName)
    {
        return str_replace(array(' Linux', ' GNU/Linux'), '' , $distroName);
    }

    /**
     * Fallback function. This function processes /etc/*-release and /proc/version files contents
     *
     * @return bool
     */
    private function processFallback()
    {
        // TODO: process more info

        if($output = $this->getRelease())
        {
            /**
             * Matches:
             *
             * "CentOS" from: NAME="CentOS Linux"
             * "Ubuntu" from: NAME="Ubuntu"
             * "Debian GNU/Linux" from: NAME="Debian GNU/Linux"
             */
            $pattern = '/^NAME="([A-Za-z0-9\/\s+]+)"/m';
            preg_match($pattern, 'NAME="CentOS Linux"', $matches);

            //preg_match($pattern, 'NAME="CentOS Linux"', $matches1);
            //preg_match($pattern, 'NAME="Ubuntu"', $matches2);
            //preg_match($pattern, 'NAME="Debian GNU/Linux"', $matches3);
            //print_r([$matches1, $matches2, $matches3]);die;

            if(!empty($matches[1]))
            {
                $this->distributionName = $this->removeSuffixes($matches[1]);
            }
        }

        if($output = $this->getProcVersion())
        {
            /**
             * Matches:
             *
             * "3.16.0" from: Linux version 3.16.0-4-amd64 (debian-kernel@lists.debian.org) (gcc version 4.8.4 ...
             * "4.2.0" from: Linux version 4.2.0-35-generic (buildd@lgw01-11) (gcc version 5.2.1 20151010 ...
             * "3.10.0" from: Linux version 3.10.0-327.10.1.el7.x86_64 (builder@kbuilder.dev.centos.org) ...
             */
            $pattern = '/Linux version\s+(\d+.\d+.\d+)/';
            preg_match($pattern, $output, $matches);

            $version = explode('.', $matches[1]);

            if(count($version) >= 2)
            {
                $this->kernelVersion = $matches[1];

                $this->kernelMajorVersion = $version[0];
                $this->kernelMinorVersion = $version[1];
                $this->kernelBuildVersion = $version[2];
            }
        }

        return true;
    }
}