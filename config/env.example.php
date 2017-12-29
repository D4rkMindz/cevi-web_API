<?php
$env['displayErrorDetails'] = true;

$env['jwt'] = [
    'active' => false,
    'secret' => 'superheavysecret',
];

$env['db'] = [
    'host' => '',
    'port' => '',
    'username' => '',
    'password' => '',
];

$env['mailgun'] = [
    'from' => '',
    'apikey' => '',
    'domain' => '',
];

return $env;