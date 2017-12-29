<?php

use App\Service\Mail\MailerInterface;

$config = [];

$config = [
    'displayErrorDetails' => false,
    'determineRouteBeforeAppMiddleware' => true,
    'addContentLengthHeader' => false,
];
$config['migrations'] = __DIR__ . '/../resources/migrations';

$config['jwt'] = [
    'active' => true,
    'secret' => '',
    'passthrough' => [
        '/',
        '/v2/users/signup',
        '/v2/auth',
    ]
];

$config['db'] = [
    'database' => 'cevi_web',
    'charset' => 'utf8',
    'encoding' => 'utf8',
    'collation' => 'utf8_unicode_ci',
];

$config['db_test'] = [
    'database' => 'cevi_web_test',
    'charset' => 'utf8',
    'encoding' => 'utf8',
    'collation' => 'utf8_unicode_ci',
];

$config['logger'] = [
    'main' => 'app',
    'context' => [
        MailerInterface::class => 'mail',
    ],
];

$config['mailgun'] = [
    'from' => '',
    'apikey' => '',
    'domain' => '',
];

if (file_exists(__DIR__ . '/env.php')) ***REMOVED***
    $env = require_once __DIR__ . '/env.php';
***REMOVED*** else if (file_exists(__DIR__ . '/../../env.php')) ***REMOVED***
    $env = require_once __DIR__ . '/../../env.php';
***REMOVED*** else ***REMOVED***
    throw new Exception('ENV.php not found');
***REMOVED***

$config = array_replace_recursive($config, $env);

return $config;
