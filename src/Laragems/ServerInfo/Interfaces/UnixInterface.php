<?php

/**
 * Copyright Marius Puiu <puiumarius@gmail.com>
 *
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Laragems\ServerInfo\Interfaces;

/**
 * Interface UnixInterface
 * @package Laragems\ServerInfo\Interfaces
 */
interface UnixInterface
{
    /**
     * Get Unix/Linux distribution name
     *
     * @return string
     */
    public function getDistributionName();

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