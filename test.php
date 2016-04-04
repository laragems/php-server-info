<?php

require "vendor/autoload.php";

use Laragems\ServerInfo\ServerInfo;

/** @var \Laragems\ServerInfo\Interfaces\OSInfoInterface $os */
$os = ServerInfo::get();

var_dump($os->getName());