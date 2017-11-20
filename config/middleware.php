<?php

use Slim\Middleware\Session;

$app = app();
$container = $app->getContainer();

$app->add(new Session($container->get('settings')->get('session')));