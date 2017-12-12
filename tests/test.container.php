<?php

use App\Service\Mail\MailerInterface;
use App\Service\Mail\MailgunAdapter;
use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;
use Monolog\Logger;
use Odan\Twig\TwigAssetsExtension;
use Odan\Twig\TwigTranslationExtension;
use Slim\Container;
use Slim\Http\Environment;
use Slim\Views\Twig;
use SlimSession\Helper as SessionHelper;
use Symfony\Component\Translation\Loader\MoFileLoader;
use Symfony\Component\Translation\MessageSelector;
use Symfony\Component\Translation\Translator;

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
