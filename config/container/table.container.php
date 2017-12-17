<?php

use App\Table\AppTable;
use App\Table\LanguageTable;
use App\Table\CityTable;
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

$container[CityTable::class] = function (Container $container) ***REMOVED***
    return new CityTable($container->get(Connection::class));
***REMOVED***;

$container[LanguageTable::class] = function (Container $container) ***REMOVED***
    return new LanguageTable($container->get(Connection::class));
***REMOVED***;
