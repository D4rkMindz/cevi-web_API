<?php
$config = [];
$config['jwt']['active'] = true;

$env['displayErrorDetails'] = true;
$env['isProduction'] = false;

$env['jwt'] = [
    'active' => false,
    'secret' => 'superheavysecret',
];

$env['db'] = [
    'database' => 'cevi_web_test',
    'host' => '127.0.0.1',
    'port' => 3306,
    'username' => 'root',
    'password' => 'travis_passwd',
];

$env['mailgun'] = [
    'from' => '',
    'apikey' => '',
    'domain' => '',
];
return $config;