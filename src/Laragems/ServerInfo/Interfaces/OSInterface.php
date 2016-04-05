<?php

namespace Laragems\ServerInfo\Interfaces;

interface OSInterface
{
    public function getType();

    public function getName();

    public function getVersion();
}