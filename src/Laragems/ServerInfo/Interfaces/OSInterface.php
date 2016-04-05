<?php

namespace Laragems\ServerInfo\Interfaces;

interface OSInterface
{
    public function getType();

    public function getBasicName();

    public function getOSVersion();

    public function getKernelVersion();

    public function getOSMajorVersion();

    public function getOSMinorVersion();

    public function getOSBuildVersion();

    public function getKernelMajorVersion();

    public function getKernelMinorVersion();

    public function getKernelBuildVersion();
}