<?php

use App\Repository\CityRepository;
use App\Repository\UserRepository;
use Slim\Container;

$container = app()->getContainer();

$container[UserRepository::class] = function (Container $container)***REMOVED***
    return new UserRepository($container);
***REMOVED***;

$container[CityRepository::class] = function (Container $container) ***REMOVED***
    return new CityRepository($container);
***REMOVED***;
