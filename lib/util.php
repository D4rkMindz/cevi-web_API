<?php

use Slim\App;

/**
 * Get app.
 *
 * @return App
 */
function app(): App
***REMOVED***
    static $app = null;
    if ($app === null) ***REMOVED***
        $config = require_once __DIR__ . '/../config/config.php';
        $app = new App($config);
***REMOVED***

    return $app;
***REMOVED***