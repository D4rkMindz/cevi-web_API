<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class AddedMissingHashes1 extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("educational_course_image");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("educational_course_image")->changeColumn('educational_course_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("educational_course_image")->changeColumn('image_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'educational_course_hash'])->update();
        $table->save();
***REMOVED***
***REMOVED***
