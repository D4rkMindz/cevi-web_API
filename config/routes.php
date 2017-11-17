<?php
$app = app();

$app->get('/', 'App\Controller\IndexController:index')->setName('/');