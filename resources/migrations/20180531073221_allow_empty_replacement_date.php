<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class AllowEmptyReplacementDate extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $this->table("article")->changeColumn('replace', 'datetime', ['null' => true, 'after' => 'quantity'])->update();
***REMOVED***
***REMOVED***
