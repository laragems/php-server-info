<?php

require "vendor/autoload.php";

use Laragems\ServerInfo\ServerInfo;

/** @var \Laragems\ServerInfo\Interfaces\OSInterface $os */
$os = ServerInfo::getServer();

var_dump("Name: {$os->getName()}");
var_dump("Version: {$os->getVersion()}");
var_dump("OS Type: {$os->getType()}");