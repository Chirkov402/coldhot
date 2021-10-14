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
    $key = $argv[1];
    menu($key, $argv[2]);
} else {
    $key = "-n";
    menu($key, $argv[2]);
}
