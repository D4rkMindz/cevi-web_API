<?php

use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;
use Slim\Container;

$app = app();
$container = $app->getContainer();

/**
 * Database connection container.
 *
 * @param Container $container
 * @return Connection
 * @throws \Interop\Container\Exception\ContainerException
 */
$container[Connection::class] = function (Container $container): Connection ***REMOVED***
    $config = $container->get('settings')->get('db_test');
    $driver = new Mysql([
        'host' => $config['host'],
        'port' => $config['port'],
        'database' => $config['database'],
        'username' => $config['username'],
        'password' => $config['password'],
        'encoding' => $config['encoding'],
        'charset' => $config['charset'],
        'collation' => $config['collation'],
        'prefix' => '',
        'flags' => [
            // Enable exceptions
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Set default fetch mode
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8 COLLATE utf8_unicode_ci",
        ],
    ]);
    $db = new Connection([
        'driver' => $driver,
    ]);
    $db->connect();

    return $db;
***REMOVED***;
