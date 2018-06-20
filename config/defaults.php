<?php

use App\Service\Mail\MailerInterface;

$config = [];

$config = [
    'displayErrorDetails' => false,
    'determineRouteBeforeAppMiddleware' => true,
    'addContentLengthHeader' => false,
    'enableCORS' => false,
    'isProduction' => true,
    'debug' => true,
];

$config['migrations'] = __DIR__ . '/../resources/migrations';

$config['jwt'] = [
    'active' => true,
    'secret' => '',
    'passthrough' => [
        '/' => ['GET'],
        '/v2/users/signup' => ['POST'],
        '/v2/users/verify' => ['POST'],
        '/v2/auth' => ['POST'],
        '/v2/articles/qualities' => ['GET'],
        '/v2/genders' => ['GET'],
        '/v2/events' => ['GET'],
        '/v2/cities' => ['GET'],
        '/v2/departmentgroups' => ['GET'],
        '/v2/departments' => ['GET'],
        '/v2/departments/{department_hash:[0-9]+}' => ['GET'],
    ]
];

// used in Role::checkAllowedRoutes
$config['allowedPaths'] = [
    ['path' => '/v2/users/{user_id}', 'methods' => ['GET', 'POST', 'PUT', 'DELETE'],],
    ['path' => '/v2/departmentgroups', 'methods' => ['GET'],],
    ['path' => '/v2/cities', 'methods' => ['GET'],],
    ['path' => '/v2/events', 'methods' => ['GET'],],
    ['path' => '/v2/user-error', 'methods' => ['GET'],],
];

$config['db'] = [
    'database' => 'cevi_web',
    'charset' => 'utf8',
    'encoding' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'mysqldump_executable' => 'mysqldump',
    'mysql_executable' => 'mysql',
];

$config['db_test'] = [
    'database' => 'cevi_web_test',
    'charset' => 'utf8',
    'encoding' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'mysqldump_executable' => 'mysqldump',
    'mysql_executable' => 'mysql',
];

$config['language_whitelist'] = [
    'de' => 'de_CH',
    'en' => 'en_GB',
    'fr' => 'fr_CH',
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

// used to render email templates
$config['twig'] = [
    'viewPath' => __DIR__ . '/../template',
    'cachePath' => __DIR__ . '/../tmp/cache/twig',
    'autoReload' => false,
];

return $config;