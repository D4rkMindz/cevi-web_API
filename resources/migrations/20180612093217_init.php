<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Init extends AbstractMigration
{
    public function change()
    {
        $this->execute("ALTER DATABASE CHARACTER SET 'utf8';");
        $this->execute("ALTER DATABASE COLLATE='utf8_general_ci';");
        $table = $this->table("article", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('article')->hasColumn('id')) {
            $this->table("article")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("article")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('article_title_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $table->addColumn('article_description_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'article_title_id'])->update();
        $table->addColumn('article_quality_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'article_description_id'])->update();
        $table->addColumn('storage_place_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'article_quality_hash'])->update();
        $table->addColumn('department_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'storage_place_hash'])->update();
        $table->addColumn('date', 'datetime', ['null' => false, 'after' => 'department_hash'])->update();
        $table->addColumn('quantity', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'date'])->update();
        $table->addColumn('replacement', 'datetime', ['null' => true, 'after' => 'quantity'])->update();
        $table->addColumn('barcode', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'replacement'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'barcode'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('article')->hasIndex('fk_article_article_description1_idx')) {
            $this->table("article")->removeIndexByName('fk_article_article_description1_idx');
        }
        $this->table("article")->addIndex(['article_description_id'], ['name' => "fk_article_article_description1_idx", 'unique' => false])->save();
        if($this->table('article')->hasIndex('fk_article_article_title1_idx')) {
            $this->table("article")->removeIndexByName('fk_article_article_title1_idx');
        }
        $this->table("article")->addIndex(['article_title_id'], ['name' => "fk_article_article_title1_idx", 'unique' => false])->save();
        if($this->table('article')->hasIndex('fk_article_article_quality1_idx')) {
            $this->table("article")->removeIndexByName('fk_article_article_quality1_idx');
        }
        $this->table("article")->addIndex(['article_quality_hash'], ['name' => "fk_article_article_quality1_idx", 'unique' => false])->save();
        if($this->table('article')->hasIndex('fk_article_storage_place1_idx')) {
            $this->table("article")->removeIndexByName('fk_article_storage_place1_idx');
        }
        $this->table("article")->addIndex(['storage_place_hash'], ['name' => "fk_article_storage_place1_idx", 'unique' => false])->save();
        $table = $this->table("article_description", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('article_description')->hasColumn('id')) {
            $this->table("article_description")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("article_description")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('name_de', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_en', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        $table = $this->table("article_image", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('article_image')->hasColumn('id')) {
            $this->table("article_image")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("article_image")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('article_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id'])->update();
        $table->addColumn('image_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'article_id'])->update();
        $table->save();
        if($this->table('article_image')->hasIndex('fk_article_has_image_image1_idx')) {
            $this->table("article_image")->removeIndexByName('fk_article_has_image_image1_idx');
        }
        $this->table("article_image")->addIndex(['image_id'], ['name' => "fk_article_has_image_image1_idx", 'unique' => false])->save();
        if($this->table('article_image')->hasIndex('fk_article_has_image_article1_idx')) {
            $this->table("article_image")->removeIndexByName('fk_article_has_image_article1_idx');
        }
        $this->table("article_image")->addIndex(['article_id'], ['name' => "fk_article_has_image_article1_idx", 'unique' => false])->save();
        $table = $this->table("article_quality", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('article_quality')->hasColumn('id')) {
            $this->table("article_quality")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("article_quality")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('level', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'level'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("article_title", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('article_title')->hasColumn('id')) {
            $this->table("article_title")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("article_title")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("city", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('city')->hasColumn('id')) {
            $this->table("city")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("city")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('country', 'string', ['null' => false, 'limit' => 2, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'comment' => "Land", 'after' => 'id'])->update();
        $table->addColumn('state', 'string', ['null' => false, 'limit' => 10, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'comment' => "Kanton / Bundesland / Region", 'after' => 'country'])->update();
        $table->addColumn('number', 'string', ['null' => false, 'limit' => 10, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'state'])->update();
        $table->addColumn('number2', 'string', ['null' => true, 'limit' => 10, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'number'])->update();
        $table->addColumn('title_de', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'number2'])->update();
        $table->addColumn('title_fr', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'title_de'])->update();
        $table->addColumn('title_it', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'title_fr'])->update();
        $table->addColumn('title_en', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'title_it'])->update();
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'title_en'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $table->addColumn('deleted', 'boolean', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('city')->hasIndex('idx_country_number')) {
            $this->table("city")->removeIndexByName('idx_country_number');
        }
        $this->table("city")->addIndex(['country','number'], ['name' => "idx_country_number", 'unique' => false])->save();
        $table = $this->table("department", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('department')->hasColumn('id')) {
            $this->table("department")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("department")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('department_group_hash', 'string', ['null' => false, 'limit' => 155, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('department_region_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_group_hash'])->update();
        $table->addColumn('department_type_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_region_hash'])->update();
        $table->addColumn('city_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_type_hash'])->update();
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'city_id'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('department')->hasIndex('fk_department_department_group_idx')) {
            $this->table("department")->removeIndexByName('fk_department_department_group_idx');
        }
        $this->table("department")->addIndex(['department_region_hash'], ['name' => "fk_department_department_group_idx", 'unique' => false])->save();
        if($this->table('department')->hasIndex('fk_department_city1_idx')) {
            $this->table("department")->removeIndexByName('fk_department_city1_idx');
        }
        $this->table("department")->addIndex(['city_id'], ['name' => "fk_department_city1_idx", 'unique' => false])->save();
        if($this->table('department')->hasIndex('fk_department_department_type1_idx')) {
            $this->table("department")->removeIndexByName('fk_department_department_type1_idx');
        }
        $this->table("department")->addIndex(['department_type_hash'], ['name' => "fk_department_department_type1_idx", 'unique' => false])->save();
        if($this->table('department')->hasIndex('fk_department_department_group1_idx')) {
            $this->table("department")->removeIndexByName('fk_department_department_group1_idx');
        }
        $this->table("department")->addIndex(['department_group_hash'], ['name' => "fk_department_department_group1_idx", 'unique' => false])->save();
        $table = $this->table("department_event", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('department_event')->hasColumn('id')) {
            $this->table("department_event")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("department_event")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('department_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('event_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_hash'])->update();
        $table->addColumn('department_group_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'event_hash'])->update();
        $table->save();
        if($this->table('department_event')->hasIndex('fk_department_has_event_event1_idx')) {
            $this->table("department_event")->removeIndexByName('fk_department_has_event_event1_idx');
        }
        $this->table("department_event")->addIndex(['event_hash'], ['name' => "fk_department_has_event_event1_idx", 'unique' => false])->save();
        if($this->table('department_event')->hasIndex('fk_department_has_event_department1_idx')) {
            $this->table("department_event")->removeIndexByName('fk_department_has_event_department1_idx');
        }
        $this->table("department_event")->addIndex(['department_hash'], ['name' => "fk_department_has_event_department1_idx", 'unique' => false])->save();
        if($this->table('department_event')->hasIndex('fk_department_event_department_group1_idx')) {
            $this->table("department_event")->removeIndexByName('fk_department_event_department_group1_idx');
        }
        $this->table("department_event")->addIndex(['department_group_hash'], ['name' => "fk_department_event_department_group1_idx", 'unique' => false])->save();
        $table = $this->table("department_group", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => "epart"]);
        $table->save();
        if ($this->table('department_group')->hasColumn('id')) {
            $this->table("department_group")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("department_group")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("department_region", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('department_region')->hasColumn('id')) {
            $this->table("department_region")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("department_region")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("department_type", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('department_type')->hasColumn('id')) {
            $this->table("department_type")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("department_type")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("educational_course", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('educational_course')->hasColumn('id')) {
            $this->table("educational_course")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("educational_course")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('educational_course_title_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $table->addColumn('educational_course_description_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'educational_course_title_id'])->update();
        $table->addColumn('educational_course_organiser_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'educational_course_description_id'])->update();
        $table->addColumn('department_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "The organizer", 'after' => 'educational_course_organiser_hash'])->update();
        $table->addColumn('city_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'comment' => "Where the edu_course is taking place", 'after' => 'department_hash'])->update();
        $table->addColumn('position_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "The minimum required position to participate", 'after' => 'city_id'])->update();
        $table->addColumn('price', 'decimal', ['null' => false, 'precision' => 10, 'after' => 'position_hash'])->update();
        $table->addColumn('start_date', 'datetime', ['null' => false, 'after' => 'price'])->update();
        $table->addColumn('end_date', 'datetime', ['null' => false, 'after' => 'start_date'])->update();
        $table->addColumn('minimum_age', 'year', ['null' => false, 'limit' => 4, 'after' => 'end_date'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'minimum_age'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('educational_course')->hasIndex('fk_education_course_educational_course_title1_idx')) {
            $this->table("educational_course")->removeIndexByName('fk_education_course_educational_course_title1_idx');
        }
        $this->table("educational_course")->addIndex(['educational_course_title_id'], ['name' => "fk_education_course_educational_course_title1_idx", 'unique' => false])->save();
        if($this->table('educational_course')->hasIndex('fk_education_course_educational_course_description1_idx')) {
            $this->table("educational_course")->removeIndexByName('fk_education_course_educational_course_description1_idx');
        }
        $this->table("educational_course")->addIndex(['educational_course_description_id'], ['name' => "fk_education_course_educational_course_description1_idx", 'unique' => false])->save();
        if($this->table('educational_course')->hasIndex('fk_education_course_department1_idx')) {
            $this->table("educational_course")->removeIndexByName('fk_education_course_department1_idx');
        }
        $this->table("educational_course")->addIndex(['department_hash'], ['name' => "fk_education_course_department1_idx", 'unique' => false])->save();
        if($this->table('educational_course')->hasIndex('fk_education_course_position1_idx')) {
            $this->table("educational_course")->removeIndexByName('fk_education_course_position1_idx');
        }
        $this->table("educational_course")->addIndex(['position_hash'], ['name' => "fk_education_course_position1_idx", 'unique' => false])->save();
        if($this->table('educational_course')->hasIndex('fk_education_course_city1_idx')) {
            $this->table("educational_course")->removeIndexByName('fk_education_course_city1_idx');
        }
        $this->table("educational_course")->addIndex(['city_id'], ['name' => "fk_education_course_city1_idx", 'unique' => false])->save();
        if($this->table('educational_course')->hasIndex('fk_education_course_educational_course_organiser1_idx')) {
            $this->table("educational_course")->removeIndexByName('fk_education_course_educational_course_organiser1_idx');
        }
        $this->table("educational_course")->addIndex(['educational_course_organiser_hash'], ['name' => "fk_education_course_educational_course_organiser1_idx", 'unique' => false])->save();
        $table = $this->table("educational_course_description", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('educational_course_description')->hasColumn('id')) {
            $this->table("educational_course_description")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("educational_course_description")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('name_de', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_en', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("educational_course_image", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('educational_course_image')->hasColumn('id')) {
            $this->table("educational_course_image")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("educational_course_image")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('educational_course_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('image_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'educational_course_hash'])->update();
        $table->save();
        if($this->table('educational_course_image')->hasIndex('fk_educational_course_has_image_image1_idx')) {
            $this->table("educational_course_image")->removeIndexByName('fk_educational_course_has_image_image1_idx');
        }
        $this->table("educational_course_image")->addIndex(['image_hash'], ['name' => "fk_educational_course_has_image_image1_idx", 'unique' => false])->save();
        if($this->table('educational_course_image')->hasIndex('fk_educational_course_has_image_educational_course1_idx')) {
            $this->table("educational_course_image")->removeIndexByName('fk_educational_course_has_image_educational_course1_idx');
        }
        $this->table("educational_course_image")->addIndex(['educational_course_hash'], ['name' => "fk_educational_course_has_image_educational_course1_idx", 'unique' => false])->save();
        $table = $this->table("educational_course_organiser", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('educational_course_organiser')->hasColumn('id')) {
            $this->table("educational_course_organiser")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("educational_course_organiser")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('user_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'user_hash'])->update();
        $table->addColumn('phone', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name'])->update();
        $table->addColumn('email', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'phone'])->update();
        $table->addColumn('notes', 'string', ['null' => true, 'limit' => 1500, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'email'])->update();
        $table->addColumn('mobile', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'notes'])->update();
        $table->save();
        if($this->table('educational_course_organiser')->hasIndex('fk_educational_course_organiser_user1_idx')) {
            $this->table("educational_course_organiser")->removeIndexByName('fk_educational_course_organiser_user1_idx');
        }
        $this->table("educational_course_organiser")->addIndex(['user_hash'], ['name' => "fk_educational_course_organiser_user1_idx", 'unique' => false])->save();
        $table = $this->table("educational_course_participant", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('educational_course_participant')->hasColumn('id')) {
            $this->table("educational_course_participant")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("educational_course_participant")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('educational_course_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('user_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'educational_course_hash'])->update();
        $table->save();
        if($this->table('educational_course_participant')->hasIndex('fk_educational_course_has_user_user1_idx')) {
            $this->table("educational_course_participant")->removeIndexByName('fk_educational_course_has_user_user1_idx');
        }
        $this->table("educational_course_participant")->addIndex(['user_hash'], ['name' => "fk_educational_course_has_user_user1_idx", 'unique' => false])->save();
        if($this->table('educational_course_participant')->hasIndex('fk_educational_course_has_user_educational_course1_idx')) {
            $this->table("educational_course_participant")->removeIndexByName('fk_educational_course_has_user_educational_course1_idx');
        }
        $this->table("educational_course_participant")->addIndex(['educational_course_hash'], ['name' => "fk_educational_course_has_user_educational_course1_idx", 'unique' => false])->save();
        $table = $this->table("educational_course_title", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('educational_course_title')->hasColumn('id')) {
            $this->table("educational_course_title")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("educational_course_title")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "Force the user to have a title of maximum 45 chars length!", 'after' => 'id'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("email_token", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('email_token')->hasColumn('id')) {
            $this->table("email_token")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("email_token")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('user_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('token', 'string', ['null' => false, 'limit' => 80, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'user_hash'])->update();
        $table->addColumn('issued_at', 'datetime', ['null' => false, 'default' => 'CURRENT_TIMESTAMP', 'after' => 'token'])->update();
        $table->save();
        $table = $this->table("event", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('event')->hasColumn('id')) {
            $this->table("event")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("event")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('event_title_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $table->addColumn('event_description_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'event_title_id'])->update();
        $table->addColumn('price', 'decimal', ['null' => false, 'precision' => 10, 'after' => 'event_description_id'])->update();
        $table->addColumn('start', 'datetime', ['null' => false, 'after' => 'price'])->update();
        $table->addColumn('end', 'datetime', ['null' => false, 'after' => 'start'])->update();
        $table->addColumn('start_leader', 'datetime', ['null' => false, 'after' => 'end'])->update();
        $table->addColumn('end_leader', 'datetime', ['null' => false, 'after' => 'start_leader'])->update();
        $table->addColumn('public', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'end_leader'])->update();
        $table->addColumn('publicize_at', 'datetime', ['null' => false, 'after' => 'public'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'publicize_at'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('event')->hasIndex('fk_event_event_description1_idx')) {
            $this->table("event")->removeIndexByName('fk_event_event_description1_idx');
        }
        $this->table("event")->addIndex(['event_description_id'], ['name' => "fk_event_event_description1_idx", 'unique' => false])->save();
        if($this->table('event')->hasIndex('fk_event_event_title1_idx')) {
            $this->table("event")->removeIndexByName('fk_event_event_title1_idx');
        }
        $this->table("event")->addIndex(['event_title_id'], ['name' => "fk_event_event_title1_idx", 'unique' => false])->save();
        $table = $this->table("event_article", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('event_article')->hasColumn('id')) {
            $this->table("event_article")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("event_article")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('article_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('event_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'article_hash'])->update();
        $table->addColumn('accountable_user_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'event_hash'])->update();
        $table->addColumn('quantity', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'accountable_user_hash'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => false, 'after' => 'quantity'])->update();
        $table->addColumn('created_by', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archieved_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('event_article')->hasIndex('fk_article_has_event_event1_idx')) {
            $this->table("event_article")->removeIndexByName('fk_article_has_event_event1_idx');
        }
        $this->table("event_article")->addIndex(['event_hash'], ['name' => "fk_article_has_event_event1_idx", 'unique' => false])->save();
        if($this->table('event_article')->hasIndex('fk_article_has_event_article1_idx')) {
            $this->table("event_article")->removeIndexByName('fk_article_has_event_article1_idx');
        }
        $this->table("event_article")->addIndex(['article_hash'], ['name' => "fk_article_has_event_article1_idx", 'unique' => false])->save();
        if($this->table('event_article')->hasIndex('fk_event_article_app_user1_idx')) {
            $this->table("event_article")->removeIndexByName('fk_event_article_app_user1_idx');
        }
        $this->table("event_article")->addIndex(['accountable_user_hash'], ['name' => "fk_event_article_app_user1_idx", 'unique' => false])->save();
        $table = $this->table("event_description", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('event_description')->hasColumn('id')) {
            $this->table("event_description")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("event_description")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('name_de', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_en', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'text', ['null' => false, 'limit' => MysqlAdapter::TEXT_LONG, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("event_image", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('event_image')->hasColumn('id')) {
            $this->table("event_image")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("event_image")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('image_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('event_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'image_hash'])->update();
        $table->save();
        if($this->table('event_image')->hasIndex('fk_image_has_event_event1_idx')) {
            $this->table("event_image")->removeIndexByName('fk_image_has_event_event1_idx');
        }
        $this->table("event_image")->addIndex(['event_hash'], ['name' => "fk_image_has_event_event1_idx", 'unique' => false])->save();
        if($this->table('event_image')->hasIndex('fk_image_has_event_image1_idx')) {
            $this->table("event_image")->removeIndexByName('fk_image_has_event_image1_idx');
        }
        $this->table("event_image")->addIndex(['image_hash'], ['name' => "fk_image_has_event_image1_idx", 'unique' => false])->save();
        $table = $this->table("event_participant", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('event_participant')->hasColumn('id')) {
            $this->table("event_participant")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable', 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\\\\\'s participation is registered, bc the children is registered in a department."])->update();
        } else {
            $this->table("event_participant")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable', 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\\\\\'s participation is registered, bc the children is registered in a department."])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('user_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\\\\\'s participation is registered, bc the children is registered in a department.", 'after' => 'hash'])->update();
        $table->addColumn('event_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\\\\\'s participation is registered, bc the children is registered in a department.", 'after' => 'user_hash'])->update();
        $table->addColumn('event_participation_status_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'event_hash'])->update();
        $table->addColumn('message', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'event_participation_status_hash'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => false, 'after' => 'message'])->update();
        $table->addColumn('created_by', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('event_participant')->hasIndex('fk_user_has_event_event1_idx')) {
            $this->table("event_participant")->removeIndexByName('fk_user_has_event_event1_idx');
        }
        $this->table("event_participant")->addIndex(['event_hash'], ['name' => "fk_user_has_event_event1_idx", 'unique' => false])->save();
        if($this->table('event_participant')->hasIndex('fk_user_has_event_user1_idx')) {
            $this->table("event_participant")->removeIndexByName('fk_user_has_event_user1_idx');
        }
        $this->table("event_participant")->addIndex(['user_hash'], ['name' => "fk_user_has_event_user1_idx", 'unique' => false])->save();
        if($this->table('event_participant')->hasIndex('fk_event_participant_event_participation_status1_idx')) {
            $this->table("event_participant")->removeIndexByName('fk_event_participant_event_participation_status1_idx');
        }
        $this->table("event_participant")->addIndex(['event_participation_status_hash'], ['name' => "fk_event_participant_event_participation_status1_idx", 'unique' => false])->save();
        $table = $this->table("event_participation_status", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('event_participation_status')->hasColumn('id')) {
            $this->table("event_participation_status")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("event_participation_status")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("event_title", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('event_title')->hasColumn('id')) {
            $this->table("event_title")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("event_title")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "Force the user to have a title of maximum 45 chars length!", 'after' => 'id'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("gender", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('gender')->hasColumn('id')) {
            $this->table("gender")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("gender")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("image", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('image')->hasColumn('id')) {
            $this->table("image")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("image")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('url', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('type', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'url'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'type'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("language", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('language')->hasColumn('id')) {
            $this->table("language")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("language")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 5, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('abbreviation', 'string', ['null' => false, 'limit' => 2, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name'])->update();
        $table->save();
        $table = $this->table("permission", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('permission')->hasColumn('id')) {
            $this->table("permission")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("permission")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('level', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'level'])->update();
        $table->save();
        $table = $this->table("position", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('position')->hasColumn('id')) {
            $this->table("position")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("position")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("sl_chest", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('sl_chest')->hasColumn('id')) {
            $this->table("sl_chest")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("sl_chest")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("sl_corridor", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('sl_corridor')->hasColumn('id')) {
            $this->table("sl_corridor")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("sl_corridor")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("sl_location", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('sl_location')->hasColumn('id')) {
            $this->table("sl_location")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("sl_location")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("sl_room", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('sl_room')->hasColumn('id')) {
            $this->table("sl_room")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("sl_room")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("sl_shelf", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('sl_shelf')->hasColumn('id')) {
            $this->table("sl_shelf")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("sl_shelf")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("sl_tray", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('sl_tray')->hasColumn('id')) {
            $this->table("sl_tray")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("sl_tray")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("storage_place", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('storage_place')->hasColumn('id')) {
            $this->table("storage_place")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("storage_place")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('department_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('sl_location_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_hash'])->update();
        $table->addColumn('sl_room_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_location_hash'])->update();
        $table->addColumn('sl_corridor_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_room_hash'])->update();
        $table->addColumn('sl_shelf_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_corridor_hash'])->update();
        $table->addColumn('sl_tray_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_shelf_hash'])->update();
        $table->addColumn('sl_chest_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_tray_hash'])->update();
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_chest_hash'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_location1_idx')) {
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_location1_idx');
        }
        $this->table("storage_place")->addIndex(['sl_location_hash'], ['name' => "fk_storage_place_sl_location1_idx", 'unique' => false])->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_room1_idx')) {
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_room1_idx');
        }
        $this->table("storage_place")->addIndex(['sl_room_hash'], ['name' => "fk_storage_place_sl_room1_idx", 'unique' => false])->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_corridor1_idx')) {
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_corridor1_idx');
        }
        $this->table("storage_place")->addIndex(['sl_corridor_hash'], ['name' => "fk_storage_place_sl_corridor1_idx", 'unique' => false])->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_shelf1_idx')) {
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_shelf1_idx');
        }
        $this->table("storage_place")->addIndex(['sl_shelf_hash'], ['name' => "fk_storage_place_sl_shelf1_idx", 'unique' => false])->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_tray1_idx')) {
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_tray1_idx');
        }
        $this->table("storage_place")->addIndex(['sl_tray_hash'], ['name' => "fk_storage_place_sl_tray1_idx", 'unique' => false])->save();
        if($this->table('storage_place')->hasIndex('fk_storage_place_sl_chest1_idx')) {
            $this->table("storage_place")->removeIndexByName('fk_storage_place_sl_chest1_idx');
        }
        $this->table("storage_place")->addIndex(['sl_chest_hash'], ['name' => "fk_storage_place_sl_chest1_idx", 'unique' => false])->save();
        $table = $this->table("user", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('user')->hasColumn('id')) {
            $this->table("user")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        } else {
            $this->table("user")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
        }
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('city_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $table->addColumn('language_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'city_id'])->update();
        $table->addColumn('permission_hash', 'string', ['null' => false, 'default' => '4', 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "See permission table", 'after' => 'language_hash'])->update();
        $table->addColumn('department_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'permission_hash'])->update();
        $table->addColumn('position_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_hash'])->update();
        $table->addColumn('gender_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'position_hash'])->update();
        $table->addColumn('first_name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'gender_hash'])->update();
        $table->addColumn('email', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'first_name'])->update();
        $table->addColumn('username', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'email'])->update();
        $table->addColumn('password', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'username'])->update();
        $table->addColumn('signup_completed', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'password'])->update();
        $table->addColumn('email_verified', 'boolean', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'signup_completed'])->update();
        $table->addColumn('js_certificate', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'email_verified'])->update();
        $table->addColumn('last_name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'js_certificate'])->update();
        $table->addColumn('address', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'last_name'])->update();
        $table->addColumn('cevi_name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'address'])->update();
        $table->addColumn('birthdate', 'date', ['null' => true, 'after' => 'cevi_name'])->update();
        $table->addColumn('phone', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'birthdate'])->update();
        $table->addColumn('mobile', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'phone'])->update();
        $table->addColumn('js_certificate_until', 'year', ['null' => true, 'limit' => 4, 'after' => 'mobile'])->update();
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'js_certificate_until'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('user')->hasIndex('fk_user_department1_idx')) {
            $this->table("user")->removeIndexByName('fk_user_department1_idx');
        }
        $this->table("user")->addIndex(['department_hash'], ['name' => "fk_user_department1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_position1_idx')) {
            $this->table("user")->removeIndexByName('fk_user_position1_idx');
        }
        $this->table("user")->addIndex(['position_hash'], ['name' => "fk_user_position1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_language1_idx')) {
            $this->table("user")->removeIndexByName('fk_user_language1_idx');
        }
        $this->table("user")->addIndex(['language_hash'], ['name' => "fk_user_language1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_gender1_idx')) {
            $this->table("user")->removeIndexByName('fk_user_gender1_idx');
        }
        $this->table("user")->addIndex(['gender_hash'], ['name' => "fk_user_gender1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_city1_idx')) {
            $this->table("user")->removeIndexByName('fk_user_city1_idx');
        }
        $this->table("user")->addIndex(['city_id'], ['name' => "fk_user_city1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_app_user_permission1_idx')) {
            $this->table("user")->removeIndexByName('fk_app_user_permission1_idx');
        }
        $this->table("user")->addIndex(['permission_hash'], ['name' => "fk_app_user_permission1_idx", 'unique' => false])->save();
    }
}
