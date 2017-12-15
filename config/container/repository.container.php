<?php

use App\Repository\PostcodeRepository;
use App\Repository\UserRepository;
use Slim\Container;

$container = app()->getContainer();

$container[UserRepository::class] = function (Container $container)***REMOVED***
    return new UserRepository($container);
***REMOVED***;

$container[PostcodeRepository::class] = function (Container $container) ***REMOVED***
    return new PostcodeRepository($container);
***REMOVED***;
