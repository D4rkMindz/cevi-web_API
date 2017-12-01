<?php
$config['displayErrorDetails'] = true;

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

$env['twig']['assetCache']['minify'] = true;

return $env;