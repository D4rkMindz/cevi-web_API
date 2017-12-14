<?php
$app = app();

$app->get('/', route(['App\Controller\UserController', 'getAllUsersAction']))->setName('root');
$app->get('/v2/users', route(['App\Controller\UserController', 'getAllUsersAction']))->setName('getAllUsers');
$app->get('/v2/users/***REMOVED***user_id***REMOVED***', route(['App\Controller\UserController', 'getUserAction']))->setName('getUser');
