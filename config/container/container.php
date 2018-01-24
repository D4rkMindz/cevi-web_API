<?php
/**
 * Basic containers
 */

use App\Service\Mail\MailerInterface;
use App\Service\Mail\MailgunAdapter;
use App\Service\Role;
use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;
use Monolog\Logger;
use Slim\Container;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;
use Symfony\Component\Translation\Loader\MoFileLoader;
use Symfony\Component\Translation\MessageSelector;
use Symfony\Component\Translation\Translator;

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
 * Translator container.
 *
 * @param Container $container
 * @return Translator
 * @throws \Psr\Container\ContainerExceptionInterface
 * @throws \Psr\Container\NotFoundExceptionInterface
 */
$container[Translator::class] = function (Container $container): Translator ***REMOVED***
    $locale = $container->get('jwt')['lang'];
    if (empty($locale)) ***REMOVED***
        $locale = 'de_CH';
***REMOVED***
    $resource = __DIR__ . "/../resources/locale/" . $locale . "_messages.mo";
    $translator = new Translator($locale, new MessageSelector());
    $translator->setFallbackLocales(['en_GB']);
    $translator->addLoader('mo', new MoFileLoader());
    $translator->addResource('mo', $resource, $locale);
    $translator->setLocale($locale);
    return $translator;
***REMOVED***;

/**
 * Role Container.
 *
 * @param Container $container
 * @return Role
 */
$container[Role::class] = function (Container $container) ***REMOVED***
    return new Role($container);
***REMOVED***;

/**
 * Not found handler
 *
 * @param Container $container
 * @return Closure
 */
$container['notFoundHandler'] = function (Container $container) ***REMOVED***
    return function (Request $request, Response $response) use ($container) ***REMOVED***
        $response = $response->withRedirect($container->get('router')->pathFor('get.notFound'));
        return $response;
***REMOVED***;
***REMOVED***;

// TODO disable this in prod
$container['jwt'] = function () ***REMOVED***
    return [
        'lang' => 'de_CH',
        'position_id' => 1,
    ];
***REMOVED***;
