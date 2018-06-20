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
use App\Table\EmailTokenTable;
use App\Table\EventArticleTable;
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

$container[AppTable::class] = function (Container $container) {
    return new AppTable($container->get(Connection::class));
};

$container[ArticleTable::class] = function (Container $container) {
    return new ArticleTable($container->get(Connection::class));
};

$container[ArticleDescriptionTable::class] = function (Container $container) {
    return new ArticleDescriptionTable($container->get(Connection::class));
};

$container[ArticleTitleTable::class] = function (Container $container) {
    return new ArticleTitleTable($container->get(Connection::class));
};

$container[ArticleQualityTable::class] = function (Container $container) {
    return new ArticleQualityTable($container->get(Connection::class));
};

$container[CityTable::class] = function (Container $container) {
    return new CityTable($container->get(Connection::class));
};

$container[DepartmentGroupTable::class] = function (Container $container)  {
    return new DepartmentGroupTable($container->get(Connection::class));
};

$container[DepartmentTypeTable::class] = function (Container $container)  {
    return new DepartmentTypeTable($container->get(Connection::class));
};

$container[DepartmentTable::class] = function (Container $container)  {
    return new DepartmentTable($container->get(Connection::class));
};

$container[DepartmentEventTable::class] = function (Container $container)  {
    return new DepartmentEventTable($container->get(Connection::class));
};

$container[EventTable::class] = function (Container $container) {
    return new EventTable($container->get(Connection::class));
};

$container[EmailTokenTable::class] = function (Container $container) {
    return new EmailTokenTable($container->get(Connection::class));
};

$container[EventImageTable::class] = function (Container $container) {
    return new EventImageTable($container->get(Connection::class));
};

$container[EventParticipantTable::class] = function (Container $container) {
    return new EventParticipantTable($container->get(Connection::class));
};

$container[EventParticipationStatusTable::class] = function (Container $container) {
    return new EventParticipationStatusTable($container->get(Connection::class));
};

$container[EventArticleTable::class] = function (Container $container) {
    return new EventArticleTable($container->get(Connection::class));
};

$container[EventTitleTable::class] = function (Container $container) {
    return new EventTitleTable($container->get(Connection::class));
};

$container[EventDescriptionTable::class] = function (Container $container) {
    return new EventDescriptionTable($container->get(Connection::class));
};

$container[GenderTable::class] = function (Container $container) {
    return new GenderTable($container->get(Connection::class));
};

$container[ImageTable::class] = function (Container $container) {
    return new ImageTable($container->get(Connection::class));
};

$container[LanguageTable::class] = function (Container $container) {
    return new LanguageTable($container->get(Connection::class));
};

$container[PositionTable::class] = function (Container $container) {
    return new PositionTable($container->get(Connection::class));
};

$container[PermissionTable::class] = function (Container $container) {
   return new PermissionTable($container->get(Connection::class));
};

$container[SlLocationTable::class] = function (Container $container) {
   return new SlLocationTable($container->get(Connection::class));
};

$container[SlRoomTable::class] = function (Container $container) {
   return new SlRoomTable($container->get(Connection::class));
};

$container[SlCorridorTable::class] = function (Container $container) {
   return new SlCorridorTable($container->get(Connection::class));
};

$container[SlShelfTable::class] = function (Container $container) {
   return new SlShelfTable($container->get(Connection::class));
};

$container[SlTrayTable::class] = function (Container $container) {
   return new SlTrayTable($container->get(Connection::class));
};

$container[SlChestTable::class] = function (Container $container) {
   return new SlChestTable($container->get(Connection::class));
};

$container[StoragePlaceTable::class] = function (Container $container) {
   return new StoragePlaceTable($container->get(Connection::class));
};

$container[UserTable::class] = function (Container $container){
    return new UserTable($container->get(Connection::class));
};
