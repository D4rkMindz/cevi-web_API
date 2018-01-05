<?php

use App\Repository\CityRepository;
use App\Repository\DepartmentGroupRepository;
use App\Repository\DepartmentRepository;
use App\Repository\DepartmentTypeRepository;
use App\Repository\EventRepository;
use App\Repository\GenderRepository;
use App\Repository\LanguageRepository;
use App\Repository\PositionRepository;
use App\Repository\UserRepository;
use App\Table\DepartmentTypeTable;
use Slim\Container;

$container = app()->getContainer();

$container[CityRepository::class] = function (Container $container) ***REMOVED***
    return new CityRepository($container);
***REMOVED***;

$container[DepartmentGroupRepository::class] = function (Container $container) ***REMOVED***
    return new DepartmentGroupRepository($container);
***REMOVED***;

$container[DepartmentRepository::class] = function (Container $container) ***REMOVED***
    return new DepartmentRepository($container);
***REMOVED***;

$container[DepartmentTypeRepository::class] = function (Container $container) ***REMOVED***
    return new DepartmentTypeRepository($container);
***REMOVED***;

$container[EventRepository::class] = function (Container $container) ***REMOVED***
    return new EventRepository($container);
***REMOVED***;

$container[GenderRepository::class] = function (Container $container) ***REMOVED***
    return new GenderRepository($container);
***REMOVED***;

$container[LanguageRepository::class] = function (Container $container) ***REMOVED***
    return new LanguageRepository($container);
***REMOVED***;

$container[PositionRepository::class] = function (Container $container) ***REMOVED***
    return new PositionRepository($container);
***REMOVED***;

$container[UserRepository::class] = function (Container $container)***REMOVED***
    return new UserRepository($container);
***REMOVED***;
