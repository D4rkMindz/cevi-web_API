<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class RemovedNotNullOnUserTableAndRenamedCityToPostcodeAndBack extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $this->table("user")->changeColumn('department_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id'])->update();
        $this->table("user")->changeColumn('position_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_id'])->update();
        $this->table("user")->changeColumn('gender_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'language_id'])->update();
        $this->table("user")->changeColumn('last_name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'gender_id'])->update();
        $this->table("user")->changeColumn('birthdate', 'date', ['null' => true, 'after' => 'cevi_name'])->update();
        if ($this->table('user')->hasIndex('fk_user_department1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_department1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['department_id'], ['name' => "fk_user_department1_idx", 'unique' => false])->save();
        if ($this->table('user')->hasIndex('fk_user_position1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_position1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['position_id'], ['name' => "fk_user_position1_idx", 'unique' => false])->save();
        if ($this->table('user')->hasIndex('fk_user_gender1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_gender1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['gender_id'], ['name' => "fk_user_gender1_idx", 'unique' => false])->save();
***REMOVED***
***REMOVED***
