<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class AddedHashesToStorageLocations extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("article");
        $table->addColumn('article_title_hid', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $table->addColumn('article_quality_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'article_description_id'])->update();
        $table->addColumn('storage_place_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'article_quality_hash'])->update();
        $this->table("article")->changeColumn('department_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'storage_place_hash'])->update();
        $this->table("article")->changeColumn('date', 'datetime', ['null' => false, 'after' => 'department_hash'])->update();
        $this->table("article")->changeColumn('quantity', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'date'])->update();
        $this->table("article")->changeColumn('replace', 'datetime', ['null' => true, 'after' => 'quantity'])->update();
        $this->table("article")->changeColumn('barcode', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'replace'])->update();
        $this->table("article")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'barcode'])->update();
        $this->table("article")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("article")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("article")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("article")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("article")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('article')->hasColumn('article_title_id')) ***REMOVED***
            $this->table("article")->removeColumn('article_title_id')->update();
    ***REMOVED***
        if($this->table('article')->hasColumn('article_quality_id')) ***REMOVED***
            $this->table("article")->removeColumn('article_quality_id')->update();
    ***REMOVED***
        if($this->table('article')->hasColumn('storage_place_id')) ***REMOVED***
            $this->table("article")->removeColumn('storage_place_id')->update();
    ***REMOVED***
        if($this->table('article')->hasColumn('department_id')) ***REMOVED***
            $this->table("article")->removeColumn('department_id')->update();
    ***REMOVED***
        if($this->table('article')->hasIndex('fk_article_article_title1_idx')) ***REMOVED***
            $this->table("article")->removeIndexByName('fk_article_article_title1_idx');
    ***REMOVED***
        $this->table("article")->addIndex(['article_title_hid'], ['name' => "fk_article_article_title1_idx", 'unique' => false])->save();
        if($this->table('article')->hasIndex('fk_article_article_quality1_idx')) ***REMOVED***
            $this->table("article")->removeIndexByName('fk_article_article_quality1_idx');
    ***REMOVED***
        $this->table("article")->addIndex(['article_quality_hash'], ['name' => "fk_article_article_quality1_idx", 'unique' => false])->save();
        if($this->table('article')->hasIndex('fk_article_storage_place1_idx')) ***REMOVED***
            $this->table("article")->removeIndexByName('fk_article_storage_place1_idx');
    ***REMOVED***
        $this->table("article")->addIndex(['storage_place_hash'], ['name' => "fk_article_storage_place1_idx", 'unique' => false])->save();
        $table = $this->table("sl_chest");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("sl_chest")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("sl_chest")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("sl_chest")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("sl_chest")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("sl_chest")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("sl_chest")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("sl_chest")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("sl_corridor");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("sl_corridor")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("sl_corridor")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("sl_corridor")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("sl_corridor")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("sl_corridor")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("sl_corridor")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("sl_corridor")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("sl_location");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("sl_location")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("sl_location")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("sl_location")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("sl_location")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("sl_location")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("sl_location")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("sl_location")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("sl_room");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("sl_room")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("sl_room")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("sl_room")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("sl_room")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("sl_room")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("sl_room")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("sl_room")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("sl_shelf");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("sl_shelf")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("sl_shelf")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("sl_shelf")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("sl_shelf")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("sl_shelf")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("sl_shelf")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("sl_shelf")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("sl_tray");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("sl_tray")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("sl_tray")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("sl_tray")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("sl_tray")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("sl_tray")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("sl_tray")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("sl_tray")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("storage_place");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('department_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('sl_location_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_hash'])->update();
        $table->addColumn('sl_room_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_location_hash'])->update();
        $table->addColumn('sl_corridor_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_room_hash'])->update();
        $table->addColumn('sl_shelf_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_corridor_hash'])->update();
        $table->addColumn('sl_tray_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_shelf_hash'])->update();
        $table->addColumn('sl_chest_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_tray_hash'])->update();
        $this->table("storage_place")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_chest_hash'])->update();
        $this->table("storage_place")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("storage_place")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("storage_place")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("storage_place")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("storage_place")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("storage_place")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('storage_place')->hasColumn('department_id')) ***REMOVED***
            $this->table("storage_place")->removeColumn('department_id')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('sl_location_id')) ***REMOVED***
            $this->table("storage_place")->removeColumn('sl_location_id')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('sl_room_id')) ***REMOVED***
            $this->table("storage_place")->removeColumn('sl_room_id')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('sl_corridor_id')) ***REMOVED***
            $this->table("storage_place")->removeColumn('sl_corridor_id')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('sl_shelf_id')) ***REMOVED***
            $this->table("storage_place")->removeColumn('sl_shelf_id')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('sl_tray_id')) ***REMOVED***
            $this->table("storage_place")->removeColumn('sl_tray_id')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('sl_chest_id')) ***REMOVED***
            $this->table("storage_place")->removeColumn('sl_chest_id')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_location1_idx')) ***REMOVED***
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_location1_idx');
    ***REMOVED***
        $this->table("storage_place")->addIndex(['sl_location_hash'], ['name' => "fk_storage_place_sl_location1_idx", 'unique' => false])->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_room1_idx')) ***REMOVED***
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_room1_idx');
    ***REMOVED***
        $this->table("storage_place")->addIndex(['sl_room_hash'], ['name' => "fk_storage_place_sl_room1_idx", 'unique' => false])->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_corridor1_idx')) ***REMOVED***
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_corridor1_idx');
    ***REMOVED***
        $this->table("storage_place")->addIndex(['sl_corridor_hash'], ['name' => "fk_storage_place_sl_corridor1_idx", 'unique' => false])->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_shelf1_idx')) ***REMOVED***
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_shelf1_idx');
    ***REMOVED***
        $this->table("storage_place")->addIndex(['sl_shelf_hash'], ['name' => "fk_storage_place_sl_shelf1_idx", 'unique' => false])->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_tray1_idx')) ***REMOVED***
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_tray1_idx');
    ***REMOVED***
        $this->table("storage_place")->addIndex(['sl_tray_hash'], ['name' => "fk_storage_place_sl_tray1_idx", 'unique' => false])->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_chest1_idx')) ***REMOVED***
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_chest1_idx');
    ***REMOVED***
        $this->table("storage_place")->addIndex(['sl_chest_hash'], ['name' => "fk_storage_place_sl_chest1_idx", 'unique' => false])->save();
        $this->table("article")->removeIndexByName('fk_article_department1_idx');
***REMOVED***
***REMOVED***
