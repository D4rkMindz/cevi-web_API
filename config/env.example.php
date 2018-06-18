<?php
$env['displayErrorDetails'] = true;
$env['isProduction'] = false;

$env['jwt'] = [
    'active' => false,
    'secret' => 'superheavysecret',
];

$env['db'] = [
    'database' => 'cevi_web_test',
    'host' => 'localhost',
    'port' => 3306,
    'username' => 'root',
    'password' => 'test_passwd',
];

$env['mailgun'] = [
    'from' => '',
    'apikey' => '',
    'domain' => '',
];

return $env;