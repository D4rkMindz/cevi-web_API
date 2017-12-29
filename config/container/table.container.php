<?php

use App\Table\AppTable;
use App\Table\DepartmentTable;
use App\Table\GenderTable;
use App\Table\LanguageTable;
use App\Table\CityTable;
use App\Table\PositionTable;
use App\Table\UserTable;
use Cake\Database\Connection;
use Slim\Container;

$container = app()->getContainer();

$container[AppTable::class] = function (Container $container) ***REMOVED***
    return new AppTable($container->get(Connection::class));
***REMOVED***;

$container[CityTable::class] = function (Container $container) ***REMOVED***
    return new CityTable($container->get(Connection::class));
***REMOVED***;

$container[DepartmentTable::class] = function (Container $container)  ***REMOVED***
    return new DepartmentTable($container->get(Connection::class));
***REMOVED***;

$container[GenderTable::class] = function (Container $container) ***REMOVED***
    return new GenderTable($container->get(Connection::class));
***REMOVED***;

$container[LanguageTable::class] = function (Container $container) ***REMOVED***
    return new LanguageTable($container->get(Connection::class));
***REMOVED***;

$container[PositionTable::class] = function (Container $container) ***REMOVED***
    return new PositionTable($container->get(Connection::class));
***REMOVED***;

$container[UserTable::class] = function (Container $container)***REMOVED***
    return new UserTable($container->get(Connection::class));
***REMOVED***;
