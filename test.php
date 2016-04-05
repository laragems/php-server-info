<?php

require "vendor/autoload.php";

use Laragems\ServerInfo\ServerInfo;

/** @var \Laragems\ServerInfo\Interfaces\OSInterface $os */
$os = ServerInfo::getServer();

var_dump("Basic Name: {$os->getBasicName()}");
var_dump("OS Type: {$os->getType()}");
var_dump("OS Version: {$os->getOSVersion()}");
var_dump("Kernel Version: {$os->getKernelVersion()}");