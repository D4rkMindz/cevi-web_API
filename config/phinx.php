<?php

use Cake\Database\Connection;

require_once __DIR__ . '/bootstrap.php';
$container = container();

try ***REMOVED***
    return [
        'paths' => [
            /**
             *
             */
            'migrations' => $container->get('settings')->get('migrations'),
        ],
        'environments' => [
            'default_database' => 'local',
            'local' => [
                'name' => $container->get('settings')->get('db')['database'],
                'connection' => $container->get(Connection::class)->getDriver()->connection(),
            ],
            'test' => [
                'name' => $container->get('settings')->get('db_test')['database'],
                'connection' => $container->get(Connection::class . '_test')->getDriver()->connection()
            ]
        ],
    ];
***REMOVED*** catch (\Psr\Container\NotFoundExceptionInterface $e) ***REMOVED***
    echo 'MIGRATION ERROR';
***REMOVED*** catch (\Psr\Container\ContainerExceptionInterface $e) ***REMOVED***
    echo 'MIGRATION ERROR';
***REMOVED***

return false;
