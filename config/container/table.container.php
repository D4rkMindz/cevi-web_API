<?php

use App\Table\AppTable;
use App\Table\ArticleDescriptionTable;
use App\Table\ArticleQualityTable;
use App\Table\ArticleTable;
use App\Table\ArticleTitleTable;
use App\Table\DepartmentEventTable;
use App\Table\DepartmentGroupTable;
use App\Table\DepartmentTable;
use App\Table\DepartmentTypeTable;
use App\Table\EventDescriptionTable;
use App\Table\EventImageTable;
use App\Table\EventParticipantTable;
use App\Table\EventParticipationStatusTable;
use App\Table\EventTable;
use App\Table\EventTitleTable;
use App\Table\GenderTable;
use App\Table\ImageTable;
use App\Table\LanguageTable;
use App\Table\CityTable;
use App\Table\PermissionTable;
use App\Table\PositionTable;
use App\Table\SlChestTable;
use App\Table\SlCorridorTable;
use App\Table\SlLocationTable;
use App\Table\SlRoomTable;
use App\Table\SlShelfTable;
use App\Table\SlTrayTable;
use App\Table\StoragePlaceTable;
use App\Table\UserTable;
use Cake\Database\Connection;
use Slim\Container;

$container = $app->getContainer();

$container[AppTable::class] = function (Container $container) ***REMOVED***
    return new AppTable($container->get(Connection::class));
***REMOVED***;

$container[ArticleTable::class] = function (Container $container) ***REMOVED***
    return new ArticleTable($container->get(Connection::class));
***REMOVED***;

$container[ArticleDescriptionTable::class] = function (Container $container) ***REMOVED***
    return new ArticleDescriptionTable($container->get(Connection::class));
***REMOVED***;

$container[ArticleTitleTable::class] = function (Container $container) ***REMOVED***
    return new ArticleTitleTable($container->get(Connection::class));
***REMOVED***;

$container[ArticleQualityTable::class] = function (Container $container) ***REMOVED***
    return new ArticleQualityTable($container->get(Connection::class));
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

$container[EventImageTable::class] = function (Container $container) ***REMOVED***
    return new EventImageTable($container->get(Connection::class));
***REMOVED***;

$container[EventParticipantTable::class] = function (Container $container) ***REMOVED***
    return new EventParticipantTable($container->get(Connection::class));
***REMOVED***;

$container[EventParticipationStatusTable::class] = function (Container $container) ***REMOVED***
    return new EventParticipationStatusTable($container->get(Connection::class));
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

$container[ImageTable::class] = function (Container $container) ***REMOVED***
    return new ImageTable($container->get(Connection::class));
***REMOVED***;

$container[LanguageTable::class] = function (Container $container) ***REMOVED***
    return new LanguageTable($container->get(Connection::class));
***REMOVED***;

$container[PositionTable::class] = function (Container $container) ***REMOVED***
    return new PositionTable($container->get(Connection::class));
***REMOVED***;

$container[PermissionTable::class] = function (Container $container) ***REMOVED***
   return new PermissionTable($container->get(Connection::class));
***REMOVED***;

$container[SlLocationTable::class] = function (Container $container) ***REMOVED***
   return new SlLocationTable($container->get(Connection::class));
***REMOVED***;

$container[SlRoomTable::class] = function (Container $container) ***REMOVED***
   return new SlRoomTable($container->get(Connection::class));
***REMOVED***;

$container[SlCorridorTable::class] = function (Container $container) ***REMOVED***
   return new SlCorridorTable($container->get(Connection::class));
***REMOVED***;

$container[SlShelfTable::class] = function (Container $container) ***REMOVED***
   return new SlShelfTable($container->get(Connection::class));
***REMOVED***;

$container[SlTrayTable::class] = function (Container $container) ***REMOVED***
   return new SlTrayTable($container->get(Connection::class));
***REMOVED***;

$container[SlChestTable::class] = function (Container $container) ***REMOVED***
   return new SlChestTable($container->get(Connection::class));
***REMOVED***;

$container[StoragePlaceTable::class] = function (Container $container) ***REMOVED***
   return new StoragePlaceTable($container->get(Connection::class));
***REMOVED***;

$container[UserTable::class] = function (Container $container)***REMOVED***
    return new UserTable($container->get(Connection::class));
***REMOVED***;
