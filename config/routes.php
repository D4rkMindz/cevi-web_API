<?php
$app = app();

$app->get('/[***REMOVED***language***REMOVED***]', route(['App\Controller\IndexController', 'indexAction']))->setName('root');
$app->get('/***REMOVED***language***REMOVED***/users', route(['App\Controller\UserController', 'indexAction']))->setName('users');
$app->get('/***REMOVED***language***REMOVED***/mail', route(['App\Controller\MailController', 'indexAction']))->setName('mail');
$app->post('/***REMOVED***language***REMOVED***/mail', route(['App\Controller\MailController', 'sendMailAction']))->setName('sendMailAction');
$app->get('/***REMOVED***language***REMOVED***/errorpage', route(['App\Controller\ErrorController', 'notFound']))->setName('notFound');
