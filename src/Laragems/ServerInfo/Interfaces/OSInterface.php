<?php

/**
 * Copyright Marius Puiu <puiumarius@gmail.com>
 *
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Laragems\ServerInfo\Interfaces;

/**
 * Interface OSInterface
 * @package Laragems\ServerInfo\Interfaces
 */
interface OSInterface
{
    /**
     * Gets Operating System type (see Laragems\ServerInfo\OS\OSType for more info)
     *
     * @return integer
     */
    public function getType();

    /**
     * Get the basic name of the Operating System
     *
     * @return string
     */
    public function getBasicName();

    /**
     * Get full version string of the Operating System (major.minor[.build])
     *
     * @return string
     */
    public function getOSVersion();

    /**
     * Get major version number of the Operating System
     *
     * @return integer
     */
    public function getOSMajorVersion();

    /**
     * Get minor version number of the Operating System
     *
     * @return integer
     */
    public function getOSMinorVersion();

    /**
     * Get build version number of the Operating System
     *
     * @return integer|null
     */
    public function getOSBuildVersion();

    /**
     * Get full version string of the Kernel
     *
     * @return integer
     */
    public function getKernelVersion();

    /**
     * Get major version number of the Kernel
     *
     * @return integer
     */
    public function getKernelMajorVersion();

    /**
     * Get minor version number of the Kernel
     *
     * @return integer
     */
    public function getKernelMinorVersion();

    /**
     * Get build version number of the Kernel
     *
     * @return integer|null
     */
    public function getKernelBuildVersion();
}