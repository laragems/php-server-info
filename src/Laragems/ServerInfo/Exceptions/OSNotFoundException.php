<?php

/**
 * Copyright Marius Puiu <puiumarius@gmail.com>
 *
 * MIT License https://opensource.org/licenses/MIT
 */

namespace Laragems\ServerInfo\Exceptions;

/**
 * Class OSNotFoundException
 * @package Laragems\ServerInfo\Exceptions
 */
class OSNotFoundException extends \Exception
{
    protected $message = 'Operating System not detected.';
}