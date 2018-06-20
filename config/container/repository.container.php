<?php

use App\Repository\ArticleRepository;
use App\Repository\CityRepository;
use App\Repository\DepartmentGroupRepository;
use App\Repository\DepartmentRepository;
use App\Repository\DepartmentTypeRepository;
use App\Repository\EventArticleRepository;
use App\Repository\EventRepository;
use App\Repository\GenderRepository;
use App\Repository\LanguageRepository;
use App\Repository\LocationRepository;
use App\Repository\ParticipationRepository;
use App\Repository\PositionRepository;
use App\Repository\StorageRepository;
use App\Repository\UserRepository;
use Slim\Container;

$container = $app->getContainer();

$container[ArticleRepository::class] = function (Container $container) {
    return new ArticleRepository($container);
};

$container[CityRepository::class] = function (Container $container) {
    return new CityRepository($container);
};

$container[DepartmentGroupRepository::class] = function (Container $container) {
    return new DepartmentGroupRepository($container);
};

$container[DepartmentRepository::class] = function (Container $container) {
    return new DepartmentRepository($container);
};

$container[DepartmentTypeRepository::class] = function (Container $container) {
    return new DepartmentTypeRepository($container);
};

$container[EventRepository::class] = function (Container $container) {
    return new EventRepository($container);
};

$container[GenderRepository::class] = function (Container $container) {
    return new GenderRepository($container);
};

$container[LanguageRepository::class] = function (Container $container) {
    return new LanguageRepository($container);
};

$container[LocationRepository::class] = function (Container $container) {
    return new LocationRepository($container);
};

$container[PositionRepository::class] = function (Container $container) {
    return new PositionRepository($container);
};

$container[StorageRepository::class] = function (Container $container) {
    return new StorageRepository($container);
};

$container[UserRepository::class] = function (Container $container){
    return new UserRepository($container);
};

$container[ParticipationRepository::class] = function (Container $container) {
    return new ParticipationRepository($container);
};

$container[EventArticleRepository::class] = function (Container $container) {
    return new EventArticleRepository($container);
};
