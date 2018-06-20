<?php

$defaults = require __DIR__ . '/defaults.php';

$env = [];

if (file_exists(__DIR__ . '/../../env.php')) {
    $env = require __DIR__ . '/../../env.php';
} elseif (file_exists(__DIR__ . '/env.php')) {
    $env = require __DIR__ . '/env.php';
} else {
    throw new RuntimeException('Env not found');
}
$defaults = array_replace_recursive($defaults, $env);

if (defined('APP_ENV')) {
    $config = require __DIR__ . '/environment.' . APP_ENV . '.php';
    $defaults = array_replace_recursive($defaults, $config);
}


return $defaults;