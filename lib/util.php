<?php

use Slim\App;
use Symfony\Component\Translation\Translator;

/**
 * Get app.
 *
 * @return App
 */
function app(): App
***REMOVED***
    static $app = null;
    if ($app === null) ***REMOVED***
        $config = ['settings' => require_once __DIR__ . '/../config/config.php'];
        $app = new App($config);
***REMOVED***

    return $app;
***REMOVED***

/**
 * Route function.
 *
 * @param callable $callback
 * @return string
 */
function route(callable $callback): string ***REMOVED***
    return implode(':', (array)$callback);
***REMOVED***

/**
 * Translation function (i18n).
 *
 * @param $message
 * @return string
 * @throws \Psr\Container\ContainerExceptionInterface
 * @throws \Psr\Container\NotFoundExceptionInterface
 */
function __($message)
***REMOVED***
    /* @var $translator Translator */
    $translator = app()->getContainer()->get(Translator::class);
    $translated = $translator->trans($message);
    $context = array_slice(func_get_args(), 1);
    if (!empty($context)) ***REMOVED***
        $translated = vsprintf($translated, $context);
***REMOVED***
    return $translated;
***REMOVED***

/**
 * Get Container.
 *
 * @return \Psr\Container\ContainerInterface
 */
function container() ***REMOVED***
    return app()->getContainer();
***REMOVED***