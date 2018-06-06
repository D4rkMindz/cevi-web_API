<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class RenamedNumberToPrice extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("educational_course");
        $table->addColumn('price', 'decimal', ['null' => false, 'precision' => 10, 'after' => 'position_hash'])->update();
        $table->save();
        if($this->table('educational_course')->hasColumn('number')) ***REMOVED***
            $this->table("educational_course")->removeColumn('number')->update();
    ***REMOVED***
***REMOVED***
***REMOVED***
