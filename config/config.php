<?php

$config = [];

$config['dbconfig']['database'] = 'slim';
$config['dbconfig']['charset'] = 'utf8';
$config['dbconfig']['encoding'] = 'utf8';
$config['dbconfig']['collation'] = 'utf8_unicode_ci';

$config['viewPath'] = __DIR__ . '/../templates';

$env = require_once __DIR__ . '/env.php';
$config = array_merge_recursive($config, $env);

return $config;