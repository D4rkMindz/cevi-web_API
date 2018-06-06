<?php
use Cake\Database\Connection;
use Slim\App;
/** @var App $app */
$app = require __DIR__ . '/bootstrap.php';

$container = $app->getContainer();
$pdo = $container->get(Connection::class)->getDriver()->getConnection();

return [
    'paths' => [
        'migrations' => $container->get('settings')->get('migrations'),
    ],
    'environments' => [
        'default_database' => 'local',
        'local' => [
            'name' => $container->get('settings')->get('db')['database'],
            'connection' => $pdo,
        ],
    ],
];
