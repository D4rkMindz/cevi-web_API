<?php

$config = [];

$config['db']['database'] = 'slim';
$config['db']['charset'] = 'utf8';
$config['db']['encoding'] = 'utf8';
$config['db']['collation'] = 'utf8_unicode_ci';

$config['viewPath'] = __DIR__ . '/../templates';

$env = require_once __DIR__ . '/env.php';
$config = array_merge_recursive($config, $env);

return $config;