<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class FixedTypoInArticleTable extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("article");
        $table->addColumn('article_title_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $table->save();
        if($this->table('article')->hasColumn('article_title_hid')) ***REMOVED***
            $this->table("article")->removeColumn('article_title_hid')->update();
    ***REMOVED***
        if($this->table('article')->hasIndex('fk_article_article_title1_idx')) ***REMOVED***
            $this->table("article")->removeIndexByName('fk_article_article_title1_idx');
    ***REMOVED***
        $this->table("article")->addIndex(['article_title_id'], ['name' => "fk_article_article_title1_idx", 'unique' => false])->save();
***REMOVED***
***REMOVED***
