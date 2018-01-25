<?php

$app->get('/', route(['App\Controller\AppController', 'redirectToCeviWeb']))->setName('root');

$app->get('/v2/auth', route(['App\Controller\AppController', 'redirectToCeviWeb']))->setName('get.authenticate');
$app->post('/v2/auth', route(['App\Controller\AuthenticationController', 'authenticateAction']))->setName('post.authenticate');

/***********************************************************************************************************************
 * Users routes
 */
$app->get('/v2/users', route(['App\Controller\UserController', 'getAllUsersAction']))->setName('get.getAllUsers');
$app->get('/v2/users/***REMOVED***user_id:[0-9]+***REMOVED***', route(['App\Controller\UserController', 'getUserAction']))->setName('get.getUser');
$app->put('/v2/users/***REMOVED***user_id:[0-9]+***REMOVED***', route(['App\Controller\UserController', 'updateUserAction']))->setName('put.updateUser');
$app->delete('/v2/users/***REMOVED***user_id:[0-9]+***REMOVED***', route(['App\Controller\UserController', 'deleteUserAction']))->setName('delete.deleteUser');

$app->post('/v2/users/signup', route(['App\Controller\UserController', 'signupAction']))->setName('post.signup');

/***********************************************************************************************************************
 * Basic Information routes
 */
$app->get('/v2/departmentgroups', route(['App\Controller\BasicInformationController', 'departmentGroupAction']))->setName('get.departmentGroups');
$app->get('/v2/cities', route(['App\Controller\BasicInformationController', 'cityAction']))->setName('get.cities');
$app->get('/v2/events', route(['App\Controller\BasicInformationController', 'eventAction']))->setName('get.events');

/***********************************************************************************************************************
 * Department routes
 */
$app->get('/v2/departments', route(['App\Controller\DepartmentController', 'getAllAction']))->setName('get.departments');
$app->post('/v2/departments', route(['App\Controller\DepartmentController', 'createDepartmentAction']))->setName('post.departments');
$app->get('/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***', route(['App\Controller\DepartmentController', 'getDepartmentAction']))->setName('get.department');
$app->put('/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***', route(['App\Controller\DepartmentController', 'updateDepartmentAction']))->setName('put.department');
$app->delete('/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***', route(['App\Controller\DepartmentController', 'deleteDepartmentAction']))->setName('delete.department');

/***********************************************************************************************************************
 * Article routes
 */
$app->get('/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***/articles', route(['App\Controller\ArticleController', 'getAllArticlesAction']))->setName('get.allArticles');
$app->post('/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***/articles', route(['App\Controller\ArticleController', 'createArticleAction']))->setName('post.createArticle');
$app->get('/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***/articles/***REMOVED***article_id:[0-9]+***REMOVED***', route(['App\Controller\ArticleController', 'getArticleAction']))->setName('get.article');
$app->put('/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***/articles/***REMOVED***article_id:[0-9]+***REMOVED***', route(['App\Controller\ArticleController', 'updateArticleAction']))->setName('put.article');
$app->delete('/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***/articles/***REMOVED***article_id:[0-9]+***REMOVED***', route(['App\Controller\ArticleController', 'deleteArticleAction']))->setName('delete.article');
$app->get('/v2/articles/quality', route(['App\Controller\ArticleController', 'getQualitiesAction']))->setName('get.article.qualities');
$app->get('/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***/articles/quality', route(['App\Controller\ArticleController', 'getQualitiesAction']))->setName('get.department.article.qualities');

/***********************************************************************************************************************
 * Storage Places routes
 */
$app->get('/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***/storages', route(['App\Controller\StorageController', 'getAllStoragePlacesAction']))->setName('get.all-storages');
$app->get('/v2/departments/***REMOVED***department_id:[0-9]+***REMOVED***/storages/***REMOVED***storage_id:[0-9]+***REMOVED***', route(['App\Controller\StorageController', 'getStoragPlaceAction']))->setName('get.storage');


/***********************************************************************************************************************
 * Error routes
 */
$app->get('/v2/user-error', route(['App\Controller\ErrorController', 'notFoundAction']))->setName('get.notFound');
