<?php

use App\Service\Mail\MailerInterface;

$config = [];

$config = [
    'displayErrorDetails' => false,
    'determineRouteBeforeAppMiddleware' => true,
    'addContentLengthHeader' => false,
    'enableCORS' => false,
];
$config['migrations'] = __DIR__ . '/../resources/migrations';

$config['jwt'] = [
    'active' => true,
    'secret' => '',
    'passthrough' => [
        '/' => ['GET'],
        '/v2/users/signup' => ['POST'],
        '/v2/auth' => ['POST'],
        '/v2/genders' => ['GET'],
        '/v2/events' => ['GET'],
        '/v2/cities' => ['GET'],
        '/v2/departmentgroups' => ['GET'],
        '/v2/departments' => ['GET'],
        '/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***' => ['GET', 'POST', 'PUT', 'DELETE'],
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

$config['language_whitelist'] = [
    'de' => 'de_CH',
    'fr' => 'en_GB',
    'en' => 'fr_CH',
    'it' => 'it_CH',
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

return $config;