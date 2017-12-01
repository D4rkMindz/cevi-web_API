<?php

use Cake\Database\Connection;

require_once __DIR__ . '/bootstrap.php';
$container = container();
$pdo = $container->get(Connection::class);

return array(
    'paths' => array(
        'migrations' => $container->get('settings')->get('migrations'),
    ),
    'environments' => array(
        'default_database' => 'local',
        'local' => array(
            'name' => $container->get('settings')->get('db')['database'],
            'connection' => $pdo,
        ),
    ),
);

