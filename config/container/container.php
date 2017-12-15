<?php
/**
 * Basic containers
 */

use App\Service\Mail\MailerInterface;
use App\Service\Mail\MailgunAdapter;
use Aura\Session\Session;
use Aura\Session\SessionFactory;
use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;
use Monolog\Logger;
use Odan\Twig\TwigAssetsExtension;
use Odan\Twig\TwigTranslationExtension;
use Slim\Container;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;

$app = app();
$container = $app->getContainer();

/**
 * Environment container (for routes).
 *
 * @return Environment
 */
$container['environment'] = function (): Environment ***REMOVED***
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $_SERVER['SCRIPT_NAME'] = dirname(dirname($scriptName)) . '/' . basename($scriptName);

    return new Slim\Http\Environment($_SERVER);
***REMOVED***;

/**
 * Twig container.
 *
 * @param Container $container
 * @return Twig
 * @throws \Interop\Container\Exception\ContainerException
 */
$container[Twig::class] = function (Container $container): Twig ***REMOVED***
    $twigSettings = $container->get('settings')->get('twig');
    $twig = new Twig($twigSettings['viewPath'], ['cache' => $twigSettings['cachePath'], 'auto_reload'=>$twigSettings['autoReload']]);
    $twig->addExtension(new TwigTranslationExtension());
    $twig->addExtension(new TwigAssetsExtension($twig->getEnvironment(), $twigSettings['assetCache']));
    return $twig;
***REMOVED***;

/**
 * Database connection container.
 *
 * @param Container $container
 * @return Connection
 * @throws \Interop\Container\Exception\ContainerException
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

$container[Connection::class . '_test'] = function (Container $container): Connection ***REMOVED***
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

/**
 * Mailer container.
 *
 * @param Container $container
 * @return MailgunAdapter
 * @throws \Interop\Container\Exception\ContainerException
 * @throws Exception
 */
$container[MailerInterface::class] = function (Container $container) ***REMOVED***
    try ***REMOVED***
        $mailSettings = $container->get('settings')->get('mailgun');
        $mail = new MailgunAdapter($mailSettings['apikey'], $mailSettings['domain'], $mailSettings['from']);
***REMOVED*** catch (Exception $exception) ***REMOVED***
        $logger = $container->get(Logger::class);
        $message = $exception->getMessage();
        $message .= "\n" . $exception->getTraceAsString();
        $context = $container->get('settings')->get('logger')['context'][MailerInterface::class];
        $logger->addDebug($message, $context);
        throw new Exception('Mailer instantiation failed');
***REMOVED***

    return $mail;
***REMOVED***;

/**
 * Logger container.
 *
 * @param Container $container
 * @return Logger
 * @throws \Interop\Container\Exception\ContainerException
 */
$container[Monolog\Logger::class] = function (Container $container) ***REMOVED***
    return new Logger($container->get('settings')->get('logger')['main']);
***REMOVED***;

/**
 * Session container.
 *
 * @param Container $container
 * @return Session
 * @throws \Interop\Container\Exception\ContainerException
 */
$container[Session::class] = function (Container $container) ***REMOVED***
    $settings = $container->get('settings');
    $sessionFactory = new SessionFactory();
    $cookieParams = $container->get('request')->getCookieParams();
    $session = $sessionFactory->newInstance($cookieParams);
    $session->setName($settings['session']['name']);
    $session->setCacheExpire($settings['session']['cache_expire']);
    return $session;
***REMOVED***;

$container['notFoundHandler'] = function (Container $container) ***REMOVED***
    return function (Request $request, Response $response) use ($container) ***REMOVED***
        $response = $response->withRedirect($container->get('router')->pathFor('notFound'));
        return $response;
***REMOVED***;
***REMOVED***;
