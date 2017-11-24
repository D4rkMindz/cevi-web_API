<?php

$config = [];

$config['db']['database'] = 'slim';
$config['db']['charset'] = 'utf8';
$config['db']['encoding'] = 'utf8';
$config['db']['collation'] = 'utf8_unicode_ci';

$config['session'] = [
    'name' => 'app_template',
    'autorefresh' => true,
    'lifetime' => '2 hours',
    'path' => '/', //default
    'domain' => null, //default
    'secure' => false, //default
    'httponly' => false, //default
];

$env['mailgun']['from'] = '';
$env['mailgun']['apikey'] = '';
$env['mailgun']['domain'] = '';

$config['viewPath'] = __DIR__ . '/../templates';

$env = require_once __DIR__ . '/env.php';
$config = array_replace_recursive($config, $env);

return $config;
