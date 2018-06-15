<?php

use Slim\App;
use Symfony\Component\Translation\Translator;

/**
 * Get app.
 *
 * @param App|null $inst
 * @return App
 */
function app(App $inst = null): App
***REMOVED***
    static $app = null;

    if ($inst instanceof App) ***REMOVED***
        $app = $inst;
***REMOVED***

    if ($app === null) ***REMOVED***
        $config = ['settings' => require __DIR__ . '/../config/config.php'];
        $app = new App($config);
***REMOVED***

    return $app;
***REMOVED***

/**
 * Route function.
 *
 * @param callable|array $callback
 * @return string
 */
function route($callback): string
***REMOVED***
    return implode(':', (array)$callback);
***REMOVED***

/**
 * Translation function (i18n).
 *
 * @param mixed $message
 * @return string
 */
function __($message): string ***REMOVED***
    static $translator = null;
    /* @var $translator Translator */
    if ($message instanceof Translator) ***REMOVED***
        $translator = $message;
        return '';
***REMOVED***
    $translated = $translator->trans($message);
    $context = array_slice(func_get_args(), 1);
    if (!empty($context)) ***REMOVED***
        $translated = vsprintf($translated, $context);
***REMOVED***
    return $translated;
***REMOVED***;

/**
 * Get Container.
 *
 * @return \Psr\Container\ContainerInterface
 */
function container()
***REMOVED***
    return app()->getContainer();
***REMOVED***