<?php

use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;
use League\Plates\Engine;
use Odan\Plates\Extension\PlatesDataExtension;
use Slim\Container;

$app = app();
$container = $app->getContainer();

/**
 * Environment Container (for routes).
 *
 * @return \Slim\Http\Environment
 */
$container['environment'] = function () ***REMOVED***
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $_SERVER['SCRIPT_NAME'] = dirname(dirname($scriptName)) . '/' . basename($scriptName);
    return new Slim\Http\Environment($_SERVER);
***REMOVED***;

/**
 * Database connection container.
 *
 * @param Container $container
 * @return Connection
 */
$container['connection'] = function (Container $container)***REMOVED***
    $config = $container->get('dbconfig');
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
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8 COLLATE utf8_unicode_ci"
        ]
    ]);
    $db = new Connection([
        'driver' => $driver
    ]);
    $db->connect();
    return $db;
***REMOVED***;

/**
 * Render Engine Container.
 *
 * @param Container $container
 * @return Engine
 */
$container[Engine::class] = function (Container $container) ***REMOVED***
    $path = $container->get('viewPath');
    $engine = new Engine($path, null);
    $engine->loadExtension(new PlatesDataExtension());
    $engine->addFolder('view', $path);
    return $engine;
***REMOVED***;
