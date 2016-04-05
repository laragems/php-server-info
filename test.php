<?php

require "vendor/autoload.php";

use Laragems\ServerInfo\ServerInfo;
use Laragems\ServerInfo\OS\OSType;

/** @var \Laragems\ServerInfo\Interfaces\OSInterface $os */
$os = ServerInfo::getServer();

var_dump("Name: {$os->getName()}");
var_dump("Version: {$os->getVersion()}");
$osType = $os->getType() === OSType::LINUX;
var_dump("OS Type: {$osType}");