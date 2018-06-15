<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Fix extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $this->table("article")->changeColumn('rent_price', 'decimal', ['null' => true, 'precision' => 11, 'scale' => 2, 'after' => 'available_for_rent'])->update();
        $table = $this->table("article_image");
        $table->addColumn('article_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('image_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'article_hash'])->update();
        $table->save();
        if($this->table('article_image')->hasColumn('article_id')) ***REMOVED***
            $this->table("article_image")->removeColumn('article_id')->update();
    ***REMOVED***
        if($this->table('article_image')->hasColumn('image_id')) ***REMOVED***
            $this->table("article_image")->removeColumn('image_id')->update();
    ***REMOVED***
        if($this->table('article_image')->hasIndex('fk_article_has_image_image1_idx')) ***REMOVED***
            $this->table("article_image")->removeIndexByName('fk_article_has_image_image1_idx');
    ***REMOVED***
        $this->table("article_image")->addIndex(['image_hash'], ['name' => "fk_article_has_image_image1_idx", 'unique' => false])->save();
        if($this->table('article_image')->hasIndex('fk_article_has_image_article1_idx')) ***REMOVED***
            $this->table("article_image")->removeIndexByName('fk_article_has_image_article1_idx');
    ***REMOVED***
        $this->table("article_image")->addIndex(['article_hash'], ['name' => "fk_article_has_image_article1_idx", 'unique' => false])->save();
***REMOVED***
***REMOVED***
