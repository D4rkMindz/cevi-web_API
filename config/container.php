<?php

use App\Service\Mail\Mail;
use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;
use League\Plates\Engine;
use Mailgun\Mailgun;
use Odan\Plates\Extension\PlatesDataExtension;
use Slim\Container;
use Slim\Http\Environment;
use SlimSession\Helper as SessionHelper;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

//use Slim\Collection;

$app = app();
$container = $app->getContainer();

/**
 * Environment Container (for routes).
 *
 * @return Environment
 */
$container['environment'] = function (): Environment ***REMOVED***
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
$container[Connection::class] = function (Container $container): Connection ***REMOVED***
    $config = $container->get('settings')->get('db');
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

/**
 * Render Engine Container.
 *
 * @param Container $container
 * @return Engine
 */
$container[Engine::class] = function (Container $container): Engine ***REMOVED***
    $path = $container->get('settings')->get('viewPath');
    $engine = new Engine($path, null);

    $dir = __DIR__ . '/../tmp/cache';
    if (!is_dir($dir)) ***REMOVED***
        mkdir($dir);
***REMOVED***

    $options = array(
        'minify' => true,
        'public_dir' => __DIR__ . '/../public/assets',
        'cache' => new FilesystemAdapter('assets-cache', 0, $dir),
    );
    $engine->loadExtension(new \Odan\Asset\PlatesAssetExtension($options));
    $engine->loadExtension(new PlatesDataExtension());

    $engine->addFolder('view', $path);

    return $engine;
***REMOVED***;

$container[SessionHelper::class] = function (): SessionHelper ***REMOVED***
    return new SessionHelper();
***REMOVED***;

$container[Mailgun::class] = function (Container $container) ***REMOVED***
    $mailSettings = $container->get('settings')->get('mailgun');
    $mail = new Mail($mailSettings['apikey'], $mailSettings['domain'], $mailSettings['from']);

    return $mail;
***REMOVED***;
