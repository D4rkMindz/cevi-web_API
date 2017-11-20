<?php
$app = app();

//$app->get('/', 'App\Controller\IndexController:index')->setName('/');

$app->get('/', route(['App\Controller\IndexController', 'index']))->setName('/');

