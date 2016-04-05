<?php

namespace Laragems\ServerInfo\Interfaces;

interface OSInterface
{
    public function getType();

    public function getBasicName();

    public function getOSVersion();

    public function getKernelVersion();
}