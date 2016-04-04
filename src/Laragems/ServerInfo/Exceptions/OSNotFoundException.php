<?php

namespace Laragems\ServerInfo\Exceptions;

class OSNotFoundException extends \Exception
{
    protected $message = 'Operating System not detected.';
}