<?php

use App\Table\AppTable;
use App\Table\DepartmentEventTable;
use App\Table\DepartmentGroupTable;
use App\Table\DepartmentTable;
use App\Table\DepartmentTypeTable;
use App\Table\EventDescriptionTable;
use App\Table\EventTable;
use App\Table\EventTitleTable;
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

$container[DepartmentGroupTable::class] = function (Container $container)  ***REMOVED***
    return new DepartmentGroupTable($container->get(Connection::class));
***REMOVED***;

$container[DepartmentTypeTable::class] = function (Container $container)  ***REMOVED***
    return new DepartmentTypeTable($container->get(Connection::class));
***REMOVED***;

$container[DepartmentTable::class] = function (Container $container)  ***REMOVED***
    return new DepartmentTable($container->get(Connection::class));
***REMOVED***;

$container[DepartmentEventTable::class] = function (Container $container)  ***REMOVED***
    return new DepartmentEventTable($container->get(Connection::class));
***REMOVED***;

$container[EventTable::class] = function (Container $container) ***REMOVED***
    return new EventTable($container->get(Connection::class));
***REMOVED***;

$container[EventTitleTable::class] = function (Container $container) ***REMOVED***
    return new EventTitleTable($container->get(Connection::class));
***REMOVED***;

$container[EventDescriptionTable::class] = function (Container $container) ***REMOVED***
    return new EventDescriptionTable($container->get(Connection::class));
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
