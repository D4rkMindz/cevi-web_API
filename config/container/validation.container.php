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

$container[ArticleValidation::class] = function (Container $container) {
    return  new ArticleValidation($container);
};

$container[UserValidation::class] = function (Container $container) {
    return new UserValidation($container);
};

$container[LoginValidation::class] = function (Container $container) {
    return new LoginValidation($container);
};

$container[DepartmentValidation::class] = function (Container $container) {
    return new DepartmentValidation($container);
};

$container[StorageValidation::class] = function (Container $container) {
    return new StorageValidation($container);
};

$container[ParticipationValidation::class] = function (Container $container) {
    return new ParticipationValidation($container);
};

$container[EventArticleValidation::class] = function (Container $container) {
    return new EventArticleValidation($container);
};
