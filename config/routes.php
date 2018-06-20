<?php

if (!defined('SWAGGER_API_VERSION')) {
    define('SWAGGER_API_VERSION', 'v2');
}
if (!defined('SWAGGER_HOST')) {
    define('SWAGGER_HOST', 'https://api.cevi-web.com');
}
/**
 * @SWG\Swagger(
 *     schemes={"http"},
 *     host=SWAGGER_HOST,
 *     basePath="/",
 *     @SWG\Info(
 *          title="The API for CEVI Web",
 *          version="0.0.1"
 *     )
 * )
 * @SWG\Parameter(
 *     parameter="article_hash",
 *     name="article_hash",
 *     type="string",
 *     in="path"
 * )
 * @SWG\Parameter(
 *     parameter="chest_hash",
 *     name="chest_hash",
 *     type="string",
 *     in="path"
 * )
 * @SWG\Parameter(
 *     parameter="corridor_hash",
 *     name="corridor_hash",
 *     type="string",
 *     in="path"
 * )
 * @SWG\Parameter(
 *     parameter="department_hash",
 *     name="department_hash",
 *     type="string",
 *     in="path"
 * )
 * @SWG\Parameter(
 *     parameter="event_hash",
 *     name="event_hash",
 *     type="string",
 *     in="path"
 * )
 * @SWG\Parameter(
 *     parameter="location_hash",
 *     name="location_hash",
 *     type="string",
 *     in="path"
 * )
 * @SWG\Parameter(
 *     parameter="room_hash",
 *     name="room_hash",
 *     type="string",
 *     in="path"
 * )
 * @SWG\Parameter(
 *     parameter="shelf_hash",
 *     name="shelf_hash",
 *     type="string",
 *     in="path"
 * )
 * @SWG\Parameter(
 *     parameter="storage_hash",
 *     name="storage_hash",
 *     type="string",
 *     in="path"
 * )
 * @SWG\Parameter(
 *     parameter="tray_hash",
 *     name="tray_hash",
 *     type="string",
 *     in="path"
 * )
 * @SWG\Parameter(
 *     parameter="user_hash",
 *     name="user_hash",
 *     type="string",
 *     in="path"
 * )
 * @SWG\Parameter(
 *     parameter="auth",
 *     name="X-Token",
 *     type="string",
 *     in="header",
 *     required="true"
 * )
 */

$app->get('/', route(['App\Controller\AppController', 'redirectToCeviWeb']))->setName('root');
$app->get('/docs/swagger.json', route(['App\Controller\BasicInformationController', 'swagger']))->setName('get.swagger');

/**
 *
 */
$app->post('/v2/auth', route(['App\Controller\AuthenticationController', 'authenticateAction']))->setName('post.authenticate');

/***********************************************************************************************************************
 * Users routes
 */
$app->get('/v2/users', route(['App\Controller\UserController', 'getAllUsersAction']))->setName('get.getAllUsers');
$app->post('/v2/users/signup', route(['App\Controller\UserController', 'signupAction']))->setName('post.signup');
$app->post('/v2/users/verify', route(['App\Controller\UserController', 'verifyEmailAction']))->setName('post.verify');
/**
 * @SWG\Get(
 *     path="/v2/users/{user_hash}",
 *     @SWG\Parameter(reg="#/parameters/user_hash"),
 *     @SWG\Response(response="200",)
 * )
 */
$app->get('/v2/users/{user_hash}', route(['App\Controller\UserController', 'getUserAction']))->setName('get.getUser');
$app->put('/v2/users/{user_hash}', route(['App\Controller\UserController', 'updateUserAction']))->setName('put.updateUser');
$app->delete('/v2/users/{user_hash}', route(['App\Controller\UserController', 'deleteUserAction']))->setName('archive.deleteUser');

/***********************************************************************************************************************
 * Basic Information routes
 */
$app->get('/v2/departmentgroups', route(['App\Controller\BasicInformationController', 'departmentGroupAction']))->setName('get.departmentGroups');
$app->get('/v2/cities', route(['App\Controller\BasicInformationController', 'cityAction']))->setName('get.cities');
$app->get('/v2/events', route(['App\Controller\BasicInformationController', 'eventAction']))->setName('get.events');
$app->get('/v2/genders', route(['App\Controller\BasicInformationController', 'genderAction']))->setName('get.genders');

/***********************************************************************************************************************
 * Department routes
 */
$app->get('/v2/departments', route(['App\Controller\DepartmentController', 'getAllAction']))->setName('get.departments');
$app->post('/v2/departments', route(['App\Controller\DepartmentController', 'createDepartmentAction']))->setName('post.departments');
$app->get('/v2/departments/{department_hash}', route(['App\Controller\DepartmentController', 'getDepartmentAction']))->setName('get.department');
$app->put('/v2/departments/{department_hash}', route(['App\Controller\DepartmentController', 'updateDepartmentAction']))->setName('put.department');
$app->delete('/v2/departments/{department_hash}', route(['App\Controller\DepartmentController', 'deleteDepartmentAction']))->setName('archive.department');

/***********************************************************************************************************************
 * Article routes
 */
$app->get('/v2/departments/{department_hash}/articles', route(['App\Controller\ArticleController', 'getAllArticlesAction']))->setName('get.allArticles');
$app->post('/v2/departments/{department_hash}/articles', route(['App\Controller\ArticleController', 'createArticleAction']))->setName('post.createArticle');
$app->get('/v2/departments/{department_hash}/articles/{article_id}', route(['App\Controller\ArticleController', 'getArticleAction']))->setName('get.article');
$app->put('/v2/departments/{department_hash}/articles/{article_id}', route(['App\Controller\ArticleController', 'updateArticleAction']))->setName('put.article');
$app->delete('/v2/departments/{department_hash}/articles/{article_id}', route(['App\Controller\ArticleController', 'deleteArticleAction']))->setName('archive.article');
$app->get('/v2/articles/qualities', route(['App\Controller\ArticleController', 'getQualitiesAction']))->setName('get.article.qualities');
$app->get('/v2/departments/{department_hash}/articles/quality', route(['App\Controller\ArticleController', 'getQualitiesAction']))->setName('get.department.article.qualities');

/***********************************************************************************************************************
 * Storage Places routes
 */
$app->get('/v2/departments/{department_hash}/storages', route(['App\Controller\StorageController', 'getAllStoragePlacesAction']))->setName('get.all-storages');
$app->post('/v2/departments/{department_hash}/storages', route(['App\Controller\StorageController', 'createStoragePlaceAction']))->setName('post.storage');
$app->get('/v2/departments/{department_hash}/storages/{storage_id}', route(['App\Controller\StorageController', 'getStoragPlaceAction']))->setName('get.storage');
$app->put('/v2/departments/{department_hash}/storages/{storage_id}', route(['App\Controller\StorageController', 'updateStoragePlaceAction']))->setName('put.storage');
$app->delete('/v2/departments/{department_hash}/storages/{storage_id}', route(['App\Controller\StorageController', 'deleteStoragePlaceAction']))->setName('delete.storage');

/**
 * sl_locations routes
 */
$app->get('/v2/departments/{department_hash}/locations', route(['App\Controller\LocationController', 'getAllLocationsAction']))->setName('get.all-locations.sl_location');
$app->post('/v2/departments/{department_hash}/locations', route(['App\Controller\LocationController', 'createLocation']))->setName('post.all-locations.sl_location');
$app->put('/v2/departments/{department_hash}/locations/{storage_id}', route(['App\Controller\LocationController', 'updateLocation']))->setName('put.all-locations.sl_location');
$app->delete('/v2/departments/{department_hash}/locations/{storage_id}', route(['App\Controller\LocationController', 'deleteLocation']))->setName('delete.all-locations.sl_location');

$app->get('/v2/departments/{department_hash}/rooms', route(['App\Controller\RoomController', 'getAllLocationsAction']))->setName('get.all-locations.sl_room');
$app->post('/v2/departments/{department_hash}/rooms', route(['App\Controller\RoomController', 'createLocation']))->setName('post.all-locations.sl_room');
$app->put('/v2/departments/{department_hash}/rooms/{storage_id}', route(['App\Controller\RoomController', 'updateLocation']))->setName('put.all-locations.sl_room');
$app->delete('/v2/departments/{department_hash}/rooms/{storage_id}', route(['App\Controller\RoomController', 'deleteLocation']))->setName('delete.all-locations.sl_room');

$app->get('/v2/departments/{department_hash}/corridors', route(['App\Controller\CorridorController', 'getAllLocationsAction']))->setName('get.all-locations.sl_corridor');
$app->post('/v2/departments/{department_hash}/corridors', route(['App\Controller\CorridorController', 'createLocation']))->setName('post.all-locations.sl_corridor');
$app->put('/v2/departments/{department_hash}/corridors/{storage_id}', route(['App\Controller\CorridorController', 'updateLocation']))->setName('put.all-locations.sl_corridor');
$app->delete('/v2/departments/{department_hash}/corridors/{storage_id}', route(['App\Controller\CorridorController', 'deleteLocation']))->setName('delete.all-locations.sl_corridor');

$app->get('/v2/departments/{department_hash}/shelfs', route(['App\Controller\ShelfController', 'getAllLocationsAction']))->setName('get.all-locations.sl_shelf');
$app->post('/v2/departments/{department_hash}/shelfs', route(['App\Controller\ShelfController', 'createLocation']))->setName('post.all-locations.sl_shelf');
$app->put('/v2/departments/{department_hash}/shelfs/{storage_id}', route(['App\Controller\ShelfController', 'updateLocation']))->setName('put.all-locations.sl_shelf');
$app->delete('/v2/departments/{department_hash}/shelfs/{storage_id}', route(['App\Controller\ShelfController', 'deleteLocation']))->setName('delete.all-locations.sl_shelf');

$app->get('/v2/departments/{department_hash}/trays', route(['App\Controller\TrayController', 'getAllLocationsAction']))->setName('get.all-locations.sl_tray');
$app->post('/v2/departments/{department_hash}/trays', route(['App\Controller\TrayController', 'createLocation']))->setName('post.all-locations.sl_tray');
$app->put('/v2/departments/{department_hash}/trays/{storage_id}', route(['App\Controller\TrayController', 'updateLocation']))->setName('put.all-locations.sl_tray');
$app->delete('/v2/departments/{department_hash}/trays/{storage_id}', route(['App\Controller\TrayController', 'deleteLocation']))->setName('delete.all-locations.sl_tray');

$app->get('/v2/departments/{department_hash}/chests', route(['App\Controller\ChestController', 'getAllLocationsAction']))->setName('get.all-locations.sl_chest');
$app->post('/v2/departments/{department_hash}/chests', route(['App\Controller\ChestController', 'createLocation']))->setName('post.all-locations.sl_chest');
$app->put('/v2/departments/{department_hash}/chests/{storage_id}', route(['App\Controller\ChestController', 'updateLocation']))->setName('put.all-locations.sl_chest');
$app->delete('/v2/departments/{department_hash}/chests/{storage_id}', route(['App\Controller\ChestController', 'deleteLocation']))->setName('delete.all-locations.sl_chest');

/**
 * Events
 */
$app->get('/v2/departments/{department_hash}/events', route(['App\Controller\EventController', 'getAllEventsAction']))->setName('get.all-events');
$app->post('/v2/departments/{department_hash}/events', route(['App\Controller\EventController', 'createEventAction']))->setName('get.insert-event');
$app->get('/v2/departments/{department_hash}/events/{event_id}', route(['App\Controller\EventController', 'getEventAction']))->setName('get.single-event');
$app->put('/v2/departments/{department_hash}/events/{event_id}', route(['App\Controller\EventController', 'updateEventAction']))->setName('put.modify-event');
$app->delete('/v2/departments/{department_hash}/events/{event_id}', route(['App\Controller\EventController', 'deleteEventAction']))->setName('delete.delete-event');

/**
 * Participations
 */
$app->get('/v2/departments/{department_hash}/events/{event_id}/participations', route(['App\Controller\ParticipationController', 'getAllParticipationsAction']))->setName('get.all-event-participations');
$app->post('/v2/departments/{department_hash}/events/{event_id}/participations', route(['App\Controller\ParticipationController', 'createParticipationAction']))->setName('post.insert-event-participations');
$app->get('/v2/departments/{department_hash}/events/{event_id}/participations/{user_hash}', route(['App\Controller\ParticipationController', 'getParticipationAction']))->setName('get.event-participation');
$app->put('/v2/departments/{department_hash}/events/{event_id}/participations/{user_hash}', route(['App\Controller\ParticipationController', 'updateParticipationAction']))->setName('put.event-participation');
$app->delete('/v2/departments/{department_hash}/events/{event_id}/participations/{user_hash}', route(['App\Controller\ParticipationController', 'deleteParticipationAction']))->setName('put.event-participation');

$app->get('/v2/departments/{department_hash}/events/{event_id}/users', route(['App\Controller\ParticipationController', 'getParticipatingUsersAction']))->setName('get.event-participating-users');
$app->delete('/v2/departments/{department_hash}/events/{event_id}/users', route(['App\Controller\ParticipationController', 'deleteAllParticipationsAction']))->setName('delete.cancel-event');

/**
 * Event articles
 */
$app->get('/v2/departments/{department_hash}/events/{event_id}/articles', route(['App\Controller\EventArticleController', 'getAllAction']))->setName('get.event-articles');
$app->post('/v2/departments/{department_hash}/events/{event_id}/articles', route(['App\Controller\EventArticleController', 'linkArticleAction']))->setName('get.event-articles');
$app->delete('/v2/departments/{department_hash}/events/{event_id}/articles/{article_id}', route(['App\Controller\EventArticleController', 'unlinkArticleAction']))->setName('get.event-articles');

/***********************************************************************************************************************
 * Error routes
 */
$app->get('/v2/user-error', route(['App\Controller\ErrorController', 'notFoundAction']))->setName('get.notFound');
