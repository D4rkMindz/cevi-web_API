<?php

use Slim\App;

session_start();
$config = require __DIR__ . '/../config/config.php';
$config['jwt']['active'] = false;
$testAppInstance = new App(['settings' => $config]);
app($testAppInstance);
require __DIR__ . '/../config/bootstrap.php';

require __DIR__ . '/test.container.php';
