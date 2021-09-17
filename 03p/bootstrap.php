<?php

function getSetting($option)
{
    $settings = require __DIR__ . '/app/settings.php';
    return $settings[$option] ?? null;
}

require __DIR__ . '/vendor/autoload.php';

define('URL', getSetting('url'));
define('INSTALL_DIR', getSetting('dir'));
define('DIR', __DIR__ .'/');