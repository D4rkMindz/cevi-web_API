<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class UpdatedArticleQualityTable extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("article_quality");
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'level'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        if($this->table('article_quality')->hasColumn('name')) ***REMOVED***
            $this->table("article_quality")->removeColumn('name')->update();
    ***REMOVED***
***REMOVED***
***REMOVED***
