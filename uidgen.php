<?php

$dir = __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Bin' . DIRECTORY_SEPARATOR;
if (!file_exists($dir . 'uidgen')) {
    require_once $dir . 'PostInstall.php';
    \CloudCastle\EquifaxReport\Bin\PostInstall::init();
}