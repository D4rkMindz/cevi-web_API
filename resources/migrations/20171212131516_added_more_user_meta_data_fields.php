<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class AddedMoreUserMetaDataFields extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("department");
        $table->addColumn('department_type_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_group_id'])->update();
        $this->table("department")->changeColumn('city_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_type_id'])->update();
        $this->table("department")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'city_id'])->update();
        $this->table("department")->changeColumn('created', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("department")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $this->table("department")->changeColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("department")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $this->table("department")->changeColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $this->table("department")->changeColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $this->table("department")->changeColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('department')->hasIndex('fk_department_department_type1_idx')) ***REMOVED***
            $this->table("department")->removeIndexByName('fk_department_department_type1_idx');
    ***REMOVED***
        $this->table("department")->addIndex(['department_type_id'], ['name' => "fk_department_department_type1_idx", 'unique' => false])->save();
        $this->table("event_participant")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        $this->table("event_participant")->changeColumn('user_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id'])->update();
        $this->table("event_participant")->changeColumn('event_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'user_id'])->update();
        $table = $this->table("gender", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('gender')->hasColumn('id')) ***REMOVED***
            $this->table("gender")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED*** else ***REMOVED***
            $this->table("gender")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED***
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->save();
        $table = $this->table("position");
        $table->addColumn('permission_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id'])->update();
        $this->table("position")->changeColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'permission_id'])->update();
        $this->table("position")->changeColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $this->table("position")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("position")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $this->table("position")->changeColumn('created', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $this->table("position")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $this->table("position")->changeColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("position")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $this->table("position")->changeColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $this->table("position")->changeColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $this->table("position")->changeColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $this->table("position")->changeColumn('positioncol', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'deleted_by'])->update();
        $table->save();
        if($this->table('position')->hasIndex('fk_position_permission1_idx')) ***REMOVED***
            $this->table("position")->removeIndexByName('fk_position_permission1_idx');
    ***REMOVED***
        $this->table("position")->addIndex(['permission_id'], ['name' => "fk_position_permission1_idx", 'unique' => false])->save();
        $table = $this->table("user");
        $table->addColumn('gender_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'language_id'])->update();
        $this->table("user")->changeColumn('username', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'email'])->update();
        $this->table("user")->changeColumn('password', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'username'])->update();
        $this->table("user")->changeColumn('cevi_name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'password'])->update();
        $table->addColumn('phone', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'birthdate'])->update();
        $table->addColumn('mobile', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'phone'])->update();
        $table->addColumn('signup_completed', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'mobile'])->update();
        $table->addColumn('js_certificate', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'signup_completed'])->update();
        $table->addColumn('js_certificate_until', 'year', ['null' => true, 'limit' => 4, 'after' => 'js_certificate'])->update();
        $this->table("user")->changeColumn('created', 'datetime', ['null' => true, 'after' => 'js_certificate_until'])->update();
        $this->table("user")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $this->table("user")->changeColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("user")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $this->table("user")->changeColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $this->table("user")->changeColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $this->table("user")->changeColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('user')->hasColumn('permission_id')) ***REMOVED***
            $this->table("user")->removeColumn('permission_id')->update();
    ***REMOVED***
        if($this->table('user')->hasIndex('fk_user_gender1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_gender1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['gender_id'], ['name' => "fk_user_gender1_idx", 'unique' => false])->save();
        $this->table("user")->removeIndexByName('fk_user_permission1_idx');
***REMOVED***
***REMOVED***
