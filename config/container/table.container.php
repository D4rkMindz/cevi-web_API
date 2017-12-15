<?php

use App\Table\AppTable;
use App\Table\PostcodeTable;
use App\Table\UserTable;
use Cake\Database\Connection;
use Slim\Container;

$container = app()->getContainer();

$container[AppTable::class] = function (Container $container) ***REMOVED***
    return new AppTable($container->get(Connection::class));
***REMOVED***;

$container[UserTable::class] = function (Container $container)***REMOVED***
    return new UserTable($container->get(Connection::class));
***REMOVED***;

$container[PostcodeTable::class] = function (Container $container) ***REMOVED***
    return new PostcodeTable($container->get(Connection::class));
***REMOVED***;
