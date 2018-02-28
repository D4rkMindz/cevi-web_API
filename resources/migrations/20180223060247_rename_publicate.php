<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class RenamePublicate extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("image");
        $table->addColumn('s', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable']);
        $table->save();
        if($this->table('image')->hasColumn('id')) ***REMOVED***
            $this->table("image")->removeColumn('id')->update();
    ***REMOVED***
***REMOVED***
***REMOVED***
