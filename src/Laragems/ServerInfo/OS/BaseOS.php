<?php

namespace Laragems\ServerInfo\OS;

abstract class BaseOS
{
    protected $type;
    protected $name;
    protected $version;

    public function getName()
    {
        return $this->name;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getType()
    {
        return $this->type;
    }
}