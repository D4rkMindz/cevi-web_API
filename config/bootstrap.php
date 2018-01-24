<?php

use Slim\App;
use Symfony\Component\Translation\Translator;

require_once __DIR__ . '/../vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/config.php';
$app = new App(['settings' => $settings]);

// Set up dependencies
require __DIR__ . '/container/container.php';
require __DIR__ . '/container/table.container.php';
require __DIR__ . '/container/repository.container.php';
require __DIR__ . '/container/validation.container.php';

// set App
__($app->getContainer()->get(Translator::class));

// Register routes
require __DIR__ . '/routes.php';

require __DIR__ . '/middleware.php';

return $app;
