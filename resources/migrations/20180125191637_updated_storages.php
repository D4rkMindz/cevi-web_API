<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class UpdatedStorages extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("storage_place");
        $table->addColumn('department_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id'])->update();
        $this->table("storage_place")->changeColumn('sl_location_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_id'])->update();
        $this->table("storage_place")->changeColumn('sl_room_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'sl_location_id'])->update();
        $this->table("storage_place")->changeColumn('sl_corridor_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'sl_room_id'])->update();
        $this->table("storage_place")->changeColumn('sl_shelf_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'sl_corridor_id'])->update();
        $this->table("storage_place")->changeColumn('sl_tray_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'sl_shelf_id'])->update();
        $this->table("storage_place")->changeColumn('sl_chest_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'sl_tray_id'])->update();
        $this->table("storage_place")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_chest_id'])->update();
        $this->table("storage_place")->changeColumn('created', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("storage_place")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $this->table("storage_place")->changeColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("storage_place")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $this->table("storage_place")->changeColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $this->table("storage_place")->changeColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $this->table("storage_place")->changeColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_department_id')) ***REMOVED***
            $this->table("storage_place")->removeIndexByName('fk_storage_place_department_id');
    ***REMOVED***
        $this->table("storage_place")->addIndex(['department_id'], ['name' => "fk_storage_place_department_id", 'unique' => false])->save();
***REMOVED***
***REMOVED***
