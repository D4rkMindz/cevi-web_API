<?php

use Slim\Middleware\Helper;

$app = app();
$container = $app->getContainer();

$app->add(new Helper($container->get('sessionconfig')));