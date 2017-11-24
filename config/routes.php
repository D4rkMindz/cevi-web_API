<?php
$app = app();

$app->get('/', route(['App\Controller\IndexController', 'index']))->setName('/');
$app->get('/mail', route(['App\Controller\MailController', 'index']))->setName('/mail');
$app->post('/mail', route(['App\Controller\MailController', 'sendMail']))->setName('/mail');
