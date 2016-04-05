<?php

require "vendor/autoload.php";

use Laragems\ServerInfo\ServerInfo;

/** @var \Laragems\ServerInfo\Interfaces\OSInterface $os */
$os = ServerInfo::getServer();

var_dump("Basic Name: {$os->getBasicName()}");
var_dump("OS Type: {$os->getType()}");

var_dump("OS Version: {$os->getOSVersion()}");
var_dump("OS Major Version: {$os->getOSMajorVersion()}");
var_dump("OS Minor Version: {$os->getOSMinorVersion()}");
var_dump("OS Build Version: {$os->getOSBuildVersion()}");

var_dump("Kernel Version: {$os->getKernelVersion()}");
var_dump("Kernel Major Version: {$os->getKernelMajorVersion()}");
var_dump("Kernel Minor Version: {$os->getKernelMinorVersion()}");
var_dump("Kernel Build Version: {$os->getKernelBuildVersion()}");