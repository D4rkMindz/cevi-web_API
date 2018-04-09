<?php

$defaults = require __DIR__ . '/defaults.php';

$env = [];

if (file_exists(__DIR__ . '/../../env.php')) ***REMOVED***
    $env = require __DIR__ . '/../../env.php';
***REMOVED*** elseif (file_exists(__DIR__ . '/env.php')) ***REMOVED***
    $env = require __DIR__ . '/env.php';
***REMOVED*** else ***REMOVED***
    throw new RuntimeException('Env not found');
***REMOVED***
$defaults = array_replace_recursive($defaults, $env);

if (defined('APP_ENV')) ***REMOVED***
    $config = require __DIR__ . '/environment.' . APP_ENV . '.php';
    $defaults = array_replace_recursive($defaults, $config);
***REMOVED***


return $defaults;