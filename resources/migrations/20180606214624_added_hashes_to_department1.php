<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class AddedHashesToDepartment1 extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("department");
        $table->addColumn('department_group_hash', 'string', ['null' => false, 'limit' => 155, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('department_region_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_group_hash'])->update();
        $table->save();
        if($this->table('department')->hasColumn('department_group_id')) ***REMOVED***
            $this->table("department")->removeColumn('department_group_id')->update();
    ***REMOVED***
        if($this->table('department')->hasColumn('department_region_id')) ***REMOVED***
            $this->table("department")->removeColumn('department_region_id')->update();
    ***REMOVED***
        if($this->table('department')->hasIndex('fk_department_department_group_idx')) ***REMOVED***
            $this->table("department")->removeIndexByName('fk_department_department_group_idx');
    ***REMOVED***
        $this->table("department")->addIndex(['department_region_hash'], ['name' => "fk_department_department_group_idx", 'unique' => false])->save();
        if($this->table('department')->hasIndex('fk_department_department_group1_idx')) ***REMOVED***
            $this->table("department")->removeIndexByName('fk_department_department_group1_idx');
    ***REMOVED***
        $this->table("department")->addIndex(['department_group_hash'], ['name' => "fk_department_department_group1_idx", 'unique' => false])->save();
***REMOVED***
***REMOVED***
