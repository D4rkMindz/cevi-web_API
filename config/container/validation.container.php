<?php

use App\Service\Article\ArticleValidation;
use App\Service\Department\DepartmentValidation;
use App\Service\EventArticle\EventArticleValidation;
use App\Service\Login\LoginValidation;
use App\Service\Participation\ParticipationValidation;
use App\Service\Storage\StorageValidation;
use App\Service\User\UserValidation;
use Slim\Container;

$container = $app->getContainer();

$container[ArticleValidation::class] = function (Container $container) ***REMOVED***
    return  new ArticleValidation($container);
***REMOVED***;

$container[UserValidation::class] = function (Container $container) ***REMOVED***
    return new UserValidation($container);
***REMOVED***;

$container[LoginValidation::class] = function (Container $container) ***REMOVED***
    return new LoginValidation($container);
***REMOVED***;

$container[DepartmentValidation::class] = function (Container $container) ***REMOVED***
    return new DepartmentValidation($container);
***REMOVED***;

$container[StorageValidation::class] = function (Container $container) ***REMOVED***
    return new StorageValidation($container);
***REMOVED***;

$container[ParticipationValidation::class] = function (Container $container) ***REMOVED***
    return new ParticipationValidation($container);
***REMOVED***;

$container[EventArticleValidation::class] = function (Container $container) ***REMOVED***
    return new EventArticleValidation($container);
***REMOVED***;
