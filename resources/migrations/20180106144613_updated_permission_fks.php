<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class UpdatedPermissionFks extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $this->table("app_position")->changeColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("app_position")->changeColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $this->table("app_position")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("app_position")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $this->table("app_position")->changeColumn('created', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $this->table("app_position")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $this->table("app_position")->changeColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("app_position")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $this->table("app_position")->changeColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $this->table("app_position")->changeColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $this->table("app_position")->changeColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        if($this->table('app_position')->hasColumn('permission_id')) ***REMOVED***
            $this->table("app_position")->removeColumn('permission_id')->update();
    ***REMOVED***
        if($this->table('app_position')->hasColumn('positioncol')) ***REMOVED***
            $this->table("app_position")->removeColumn('positioncol')->update();
    ***REMOVED***
        $table = $this->table("app_user");
        $table->addColumn('permission_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_id'])->update();
        $this->table("app_user")->changeColumn('position_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'permission_id'])->update();
        $this->table("app_user")->changeColumn('gender_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'position_id'])->update();
        $this->table("app_user")->changeColumn('first_name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'gender_id'])->update();
        $this->table("app_user")->changeColumn('email', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'first_name'])->update();
        $this->table("app_user")->changeColumn('username', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'email'])->update();
        $this->table("app_user")->changeColumn('password', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'username'])->update();
        $this->table("app_user")->changeColumn('signup_completed', 'boolean', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'password'])->update();
        $this->table("app_user")->changeColumn('js_certificate', 'boolean', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'signup_completed'])->update();
        $this->table("app_user")->changeColumn('last_name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'js_certificate'])->update();
        $this->table("app_user")->changeColumn('address', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'last_name'])->update();
        $this->table("app_user")->changeColumn('cevi_name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'address'])->update();
        $this->table("app_user")->changeColumn('birthdate', 'date', ['null' => true, 'after' => 'cevi_name'])->update();
        $this->table("app_user")->changeColumn('phone', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'birthdate'])->update();
        $this->table("app_user")->changeColumn('mobile', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'phone'])->update();
        $this->table("app_user")->changeColumn('js_certificate_until', 'year', ['null' => true, 'limit' => 4, 'after' => 'mobile'])->update();
        $this->table("app_user")->changeColumn('created', 'datetime', ['null' => true, 'after' => 'js_certificate_until'])->update();
        $this->table("app_user")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $this->table("app_user")->changeColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("app_user")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $this->table("app_user")->changeColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $this->table("app_user")->changeColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $this->table("app_user")->changeColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('app_user')->hasIndex('fk_user_permission1')) ***REMOVED***
            $this->table("app_user")->removeIndexByName('fk_user_permission1');
    ***REMOVED***
        $this->table("app_user")->addIndex(['permission_id'], ['name' => "fk_user_permission1", 'unique' => false])->save();
        $this->table("department")->changeColumn('department_type_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_group_id'])->update();
        $this->table("department")->changeColumn('city_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_type_id'])->update();
        $this->table("department")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'city_id'])->update();
        $this->table("department")->changeColumn('created', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("department")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $this->table("department")->changeColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("department")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $this->table("department")->changeColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $this->table("department")->changeColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $this->table("department")->changeColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        if($this->table('department')->hasColumn('department_region_id')) ***REMOVED***
            $this->table("department")->removeColumn('department_region_id')->update();
    ***REMOVED***
        if($this->table('department')->hasIndex('fk_department_department_group_idx')) ***REMOVED***
            $this->table("department")->removeIndexByName('fk_department_department_group_idx');
    ***REMOVED***
        $this->table("department")->addIndex(['department_group_id'], ['name' => "fk_department_department_group_idx", 'unique' => false])->save();
        if($this->table('department_event')->hasIndex('fk_department_has_event_department_group1')) ***REMOVED***
            $this->table("department_event")->removeIndexByName('fk_department_has_event_department_group1');
    ***REMOVED***
        $this->table("department_event")->addIndex(['department_group_id'], ['name' => "fk_department_has_event_department_group1", 'unique' => false])->save();
        $this->table("department_group")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("department_group")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $this->table("app_position")->removeIndexByName('fk_position_permission1_idx');
        $this->table("department")->removeIndexByName('fk_department_department_group1_idx');
        $this->table("department_event")->removeIndexByName('fk_department_event_department_group1_idx');
        $table = $this->table("department_group", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
***REMOVED***
***REMOVED***
