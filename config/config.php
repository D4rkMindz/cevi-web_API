<?php

use App\Service\Mail\MailerInterface;

$config = [];

$config = [
    'displayErrorDetails' => false,
    'determineRouteBeforeAppMiddleware' => true,
    'addContentLengthHeader' => false,
];
$config['migrations'] = __DIR__ . '/../resources/migrations';

$config['db'] = [
    'database' => 'slim',
    'charset' => 'utf8',
    'encoding' => 'utf8',
    'collation' => 'utf8_unicode_ci',
];

$config['db_test'] = [
    'database' => 'slim_test',
    'charset' => 'utf8',
    'encoding' => 'utf8',
    'collation' => 'utf8_unicode_ci',
];

$config['twig'] = [
    'viewPath' => __DIR__ . '/../templates',
    'cachePath' => __DIR__ . '/../tmp/cache/twig',
    'autoReload' => false,
    'assetCache' => [
        'path' => __DIR__ . '/../public/assets',
        // Cache settings
        'cache_enabled' => true,
        'cache_path' => __DIR__ . '/../tmp/cache',
        'cache_name' => 'assets',
        'cache_lifetime' => 0,
    ]
];

$config['session'] = [
    'name' => 'app_template',
    'autorefresh' => true,
    'lifetime' => '2 hours',
    'path' => '/', //default
    'domain' => null, //default
    'secure' => false, //default
    'httponly' => false, //default
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

$env = require_once __DIR__ . '/env.php';
$config = array_replace_recursive($config, $env);

return $config;
