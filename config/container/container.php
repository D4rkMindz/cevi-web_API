<?php
/**
 * Basic containers
 */

use App\Controller\ErrorController;
use App\Service\Mail\MailerInterface;
use App\Service\Mail\MailgunAdapter;
use App\Util\Role;
use Cake\Database\Connection;
use Cake\Database\Driver\Mysql;
use Monolog\Logger;
use Odan\Twig\TwigTranslationExtension;
use Slim\Container;
use Slim\Exception\ContainerException;
use Slim\Exception\ContainerValueNotFoundException;
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
$container['environment'] = function (): Environment {
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $_SERVER['SCRIPT_NAME'] = dirname(dirname($scriptName)) . '/' . basename($scriptName);

    return new Slim\Http\Environment($_SERVER);
};

/**
 * Database connection container.
 *
 * @param Container $container
 * @return Connection
 * @throws \Interop\Container\Exception\ContainerException
 */
$container[Connection::class] = function (Container $container): Connection {
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
};

/**
 * Mailer container.
 *
 * @param Container $container
 * @return MailgunAdapter
 * @throws \Interop\Container\Exception\ContainerException
 * @throws Exception
 */
$container[MailerInterface::class] = function (Container $container) {
    try {
        $mailSettings = $container->get('settings')->get('mailgun');
        $mail = new MailgunAdapter($mailSettings['apikey'], $mailSettings['domain'], $mailSettings['from']);
    } catch (Exception $exception) {
        /**
         * @var Logger $logger
         */
        $logger = $container->get(Logger::class);
        $message = $exception->getMessage();
        $message .= "\n" . $exception->getTraceAsString();
        $context = $container->get('settings')->get('logger')['context'][MailerInterface::class];
        $logger->addDebug($message, [$context]);
        throw new Exception('Mailer instantiation failed');
    }

    return $mail;
};

/**
 * Twig container.
 *
 * USED IN EMAIL RENDERING IN USERCONTROLLER!
 *
 * @param Container $container
 * @return Twig_Environment
 * @throws ContainerException
 */
$container[Twig_Environment::class] = function (Container $container): Twig_Environment {
    $twigSettings = $container->get('settings')->get('twig');
    $loader = new Twig_Loader_Filesystem($twigSettings['viewPath']);
    $twig = new Twig_Environment($loader, ['cache' => $twigSettings['cachePath']]);
    $twig->addExtension(new TwigTranslationExtension());

    return $twig;
};

/**
 * Translator container.
 *
 * @param Container $container
 * @return Translator
 */
$container[Translator::class] = function (Container $container): Translator {
    try {
        $locale = $container->get('jwt')['lang'];
    } catch (ContainerValueNotFoundException $exception) {
        $locale = 'de_CH';
    }

    $resourceDe = __DIR__ . "/../../resources/locale/de_CH_messages.mo";
    $resourceEn = __DIR__ . "/../../resources/locale/en_GB_messages.mo";
    // TODO add other translation resources when they are created
    $resourceFr = __DIR__ . "/../../resources/locale/fr_CH_messages.mo";
    $resourceIt = __DIR__ . "/../../resources/locale/it_CH_messages.mo";

    $translator = new Translator($locale, new MessageSelector());
    $translator->addLoader('mo', new MoFileLoader());
    $translator->addResource('mo', $resourceDe, 'de_CH');
    $translator->addResource('mo', $resourceEn, 'en_GB');
    return $translator;
};

/**
 * Role Container.
 *
 * @param Container $container
 * @return Role
 */
$container[Role::class] = function (Container $container) {
    return new Role($container);
};

/**
 * Default App logger
 *
 * @param Container $container
 * @return Logger
 */
$container[Monolog\Logger::class] = function (Container $container) {
    $rotatingFileHandler = new \Monolog\Handler\RotatingFileHandler(sprintf(__DIR__ . '/../../tmp/logs/%s_app.log', date('y-m-d')));
    $logger = new Logger('app', [$rotatingFileHandler]);
    return $logger;
};

/**
 * Access logger
 *
 * @param Container $container
 * @return Logger
 */
$container[Monolog\Logger::class . '_request'] = function (Container $container) {
    $rotatingFileHandler = new \Monolog\Handler\RotatingFileHandler(sprintf(__DIR__ . '/../../tmp/logs/%s_access.log', date('y-m-d')));
    $logger = new Logger('request', [$rotatingFileHandler]);
    return $logger;
};

/**
 * Error Logger.
 *
 * @param Container $container
 * @return Logger
 */
$container[Monolog\Logger::class . '_error'] = function (Container $container) {
    $rotatingFileHandler = new \Monolog\Handler\RotatingFileHandler(sprintf(__DIR__ . '/../../tmp/logs/%s_error.log', date('y-m-d')));
    return new Logger('error', [$rotatingFileHandler]);
};

/**
 * Debug logger
 *
 * @param Container $container
 * @return Logger
 */
$container[Monolog\Logger::class . '_debug'] = function (Container $container) {
    $rotatingFileHandler = new \Monolog\Handler\RotatingFileHandler(sprintf(__DIR__ . '/../../tmp/logs/%s_debug.log', date('y-m-d')));
    return new Logger('debug', [$rotatingFileHandler]);
};

/**
 * Not found handler
 *
 * @param Container $container
 * @return Closure
 */
$container['notFoundHandler'] = function (Container $container) {
    return function (Request $request, Response $response) use ($container) {
        $errorController = new ErrorController($container);
        $response = $errorController->notFoundAction($request, $response);
        $container->get(Logger::class)->info(sprintf('ROUTE NOT FOUND: %s', $request->getRequestTarget()));
        return $response;
    };
};

/**
 * Error handler.
 *
 * @param Container $container
 * @return Closure
 */
$container['errorHandler'] = function (Container $container) {
    return function (Request $request, Response $response, Exception $exception) use ($container) {
        /**
         * @var $logger Logger
         */
        $logger = $container->get(Logger::class . '_error');
        $message = sprintf("EXCEPTION: %s\n", $exception->getMessage());
        foreach ($exception->getTrace() as $row) {
            $message .= sprintf("\e[Method %s in %s:%s",
                array_key_exists('function', $row) ? $row['function'] : '',
                array_key_exists('file', $row) ? $row['file'] : '',
                array_key_exists('line', $row) ? $row['line'] : '');
        }
        $logger->addError($message);
        $errorController = new ErrorController($container);
        return $errorController->serverErrorAction($request, $response);
    };
};

// TODO disable this in prod
if (!$container->get('settings')->get('isProduction')) {
    $container['jwt'] = function () {
        return [
            'lang' => 'de_CH',
            'position_id' => 1,
        ];
    };
}
