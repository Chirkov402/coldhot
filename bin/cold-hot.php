<?php

$vendorGit = __DIR__ . '/../vendor/autoload.php';
$autoPackagist = __DIR__ . '/../../../autoload.php';

if (file_exists($vendorGit)) {
    require_once($vendorGit);
} else {
    require_once($autoPackagist);
}

use function Chirkov402\cold_hot\Controller\menu;

if (isset($argv[1])) {
    if ($argv[1] === "-r" || $argv[1] === "--replay") {
        menu($argv[1], $argv[2]);
    } else {
        menu($argv[1], null);
    }
} else {
    menu("-n", null);
}