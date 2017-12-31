<?php

use App\Service\Login\LoginValidation;
use App\Service\User\UserValidation;
use Slim\Container;

$container = app()->getContainer();

$container[UserValidation::class] = function (Container $container) ***REMOVED***
    return new UserValidation($container);
***REMOVED***;

$container[LoginValidation::class] = function (Container $container) ***REMOVED***
    return new LoginValidation($container);
***REMOVED***;
