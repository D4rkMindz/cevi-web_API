<?php
$app = app();

$app->get('/', route(['App\Controller\AppController', 'redirectToCeviWeb']))->setName('root');

$app->get('/v2/auth', route(['App\Controller\AppController', 'redirectToCeviWeb']))->setName('get.authenticate');
$app->post('/v2/auth', route(['App\Controller\AuthenticationController', 'authenticateAction']))->setName('post.authenticate');

/***********************************************************************************************************************
 * Users routes
 */
$app->get('/v2/users', route(['App\Controller\UserController', 'getAllUsersAction']))->setName('get.getAllUsers');
$app->get('/v2/users/***REMOVED***user_id***REMOVED***', route(['App\Controller\UserController', 'getUserAction']))->setName('get.getUser');
$app->put('/v2/users/***REMOVED***user_id***REMOVED***', route(['App\Controller\UserController', 'updateUserAction']))->setName('put.updateUser');
$app->delete('/v2/users/***REMOVED***user_id***REMOVED***', route(['App\Controller\UserController', 'deleteUserAction']))->setName('delete.deleteUser');

$app->post('/v2/users/signup', route(['App\Controller\UserController', 'signupAction']))->setName('post.signup');

/***********************************************************************************************************************
 * Basic Information routes
 */
$app->get('/v2/departmentgroups', route(['App\Controller\BasicInformationController','departmentGroupAction']))->setName('get.departmentGroups');
$app->get('/v2/cities', route(['App\Controller\BasicInformationController', 'cityAction']))->setName('get.cities');
$app->get('/v2/events', route(['App\Controller\BasicInformationController', 'eventAction']))->setName('get.events');

/***********************************************************************************************************************
 * Error routes
 */
$app->get('/v2/user-error', route(['App\Controller\ErrorController', 'notFoundAction']))->setName('get.notFound');
