<?php
$env['displayErrorDetails'] = true;

$env['jwt'] = [
    'active' => false,
    'secret' => 'superheavysecret',
];

$env['db'] = [
    'database' => 'cevi_web_test',
    'host' => 'localhost',
    'port' => 3306,
    'username' => '',
    'password' => '',
];

$env['mailgun'] = [
    'from' => '',
    'apikey' => '',
    'domain' => '',
];

return $env;