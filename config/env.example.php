<?php
$env['displayErrorDetails'] = true;
$env['isProduction'] = false;

$env['jwt'] = [
    'active' => false,
    'secret' => 'superheavysecret',
];

$env['db'] = [
    'database' => '',
    'host' => '',
    'port' => '',
    'username' => '',
    'password' => '',
    'mysql_executable' => '',
    'mysqldump_executable' => '',
];

$env['mailgun'] = [
    'from' => '',
    'apikey' => '',
    'domain' => '',
];

return $env;