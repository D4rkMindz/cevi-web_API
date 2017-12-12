<?php
$app = app();

$app->get('/[***REMOVED***language***REMOVED***]', route(['App\Controller\IndexController', 'indexAction']))->setName('root');
$app->get('/***REMOVED***language***REMOVED***/users', route(['App\Controller\UserController', 'indexAction']))->setName('users');
$app->get('/***REMOVED***language***REMOVED***/errorpage', route(['App\Controller\ErrorController', 'notFoundAction']))->setName('notFound');
