<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class UpdatedGenderTable extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        if($this->table('app_position')->hasColumn('created')) ***REMOVED***
            $this->table("app_position")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('app_position')->hasColumn('created_by')) ***REMOVED***
            $this->table("app_position")->removeColumn('created_by')->update();
    ***REMOVED***
        if($this->table('app_position')->hasColumn('modified')) ***REMOVED***
            $this->table("app_position")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('app_position')->hasColumn('modified_by')) ***REMOVED***
            $this->table("app_position")->removeColumn('modified_by')->update();
    ***REMOVED***
        if($this->table('app_position')->hasColumn('deleted')) ***REMOVED***
            $this->table("app_position")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('app_position')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("app_position")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('app_position')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("app_position")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("gender");
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        if($this->table('gender')->hasColumn('name')) ***REMOVED***
            $this->table("gender")->removeColumn('name')->update();
    ***REMOVED***
***REMOVED***
***REMOVED***
