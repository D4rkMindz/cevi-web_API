<?php
$app = app();

$app->get('/', route(['App\Controller\AppController', 'redirectToCeviWeb']))->setName('root');

/***********************************************************************************************************************
 * Users routes
 */
$app->get('/v2/users', route(['App\Controller\UserController', 'getAllUsersAction']))->setName('getAllUsers');
$app->get('/v2/users/***REMOVED***user_id***REMOVED***', route(['App\Controller\UserController', 'getUserAction']))->setName('getUser');

$app->post('/v2/users/signup', route(['App\Controller\UserController', 'signupAction']))->setName('signup');

/***********************************************************************************************************************
 * Error routes
 */
$app->get('/v2/user-error', route(['App\Controller\ErrorController', 'notFoundAction']))->setName('notFound');
