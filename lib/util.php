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
{
    static $app = null;

    if ($inst instanceof App) {
        $app = $inst;
    }

    if ($app === null) {
        $config = ['settings' => require __DIR__ . '/../config/config.php'];
        $app = new App($config);
    }

    return $app;
}

/**
 * Route function.
 *
 * @param callable|array $callback
 * @return string
 */
function route($callback): string
{
    return implode(':', (array)$callback);
}

/**
 * Translation function (i18n).
 *
 * @param mixed $message
 * @return string
 */
function __($message): string {
    static $translator = null;
    /* @var $translator Translator */
    if ($message instanceof Translator) {
        $translator = $message;
        return '';
    }
    $translated = $translator->trans($message);
    $context = array_slice(func_get_args(), 1);
    if (!empty($context)) {
        $translated = vsprintf($translated, $context);
    }
    return $translated;
};

/**
 * Get Container.
 *
 * @return \Psr\Container\ContainerInterface
 */
function container()
{
    return app()->getContainer();
}