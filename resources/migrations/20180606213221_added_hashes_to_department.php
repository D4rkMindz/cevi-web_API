<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class AddedHashesToDepartment extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $this->table("department")->changeColumn('department_group_id', 'string', ['null' => false, 'limit' => 155, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("department")->changeColumn('department_region_id', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_group_id'])->update();
        $table = $this->table("department");
        $table->addColumn('department_type_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_region_id'])->update();
        $table->save();
        if($this->table('department')->hasColumn('department_type_id')) ***REMOVED***
            $this->table("department")->removeColumn('department_type_id')->update();
    ***REMOVED***
        if($this->table('department')->hasIndex('fk_department_department_type1_idx')) ***REMOVED***
            $this->table("department")->removeIndexByName('fk_department_department_type1_idx');
    ***REMOVED***
        $this->table("department")->addIndex(['department_type_hash'], ['name' => "fk_department_department_type1_idx", 'unique' => false])->save();
***REMOVED***
***REMOVED***
