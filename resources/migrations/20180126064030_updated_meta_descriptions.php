<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class UpdatedMetaDescriptions extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("article");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'barcode'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('article')->hasColumn('created')) ***REMOVED***
            $this->table("article")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('article')->hasColumn('modified')) ***REMOVED***
            $this->table("article")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('article')->hasColumn('deleted')) ***REMOVED***
            $this->table("article")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('article')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("article")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('article')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("article")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("article_description");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('article_description')->hasColumn('created')) ***REMOVED***
            $this->table("article_description")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('article_description')->hasColumn('modified')) ***REMOVED***
            $this->table("article_description")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('article_description')->hasColumn('deleted')) ***REMOVED***
            $this->table("article_description")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('article_description')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("article_description")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('article_description')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("article_description")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("article_title");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('article_title')->hasColumn('created')) ***REMOVED***
            $this->table("article_title")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('article_title')->hasColumn('modified')) ***REMOVED***
            $this->table("article_title")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('article_title')->hasColumn('deleted')) ***REMOVED***
            $this->table("article_title")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('article_title')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("article_title")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('article_title')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("article_title")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("city");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'title_en'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('city')->hasColumn('created')) ***REMOVED***
            $this->table("city")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('city')->hasColumn('modified')) ***REMOVED***
            $this->table("city")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('city')->hasColumn('deleted')) ***REMOVED***
            $this->table("city")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('city')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("city")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('city')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("city")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("department");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('department')->hasColumn('created')) ***REMOVED***
            $this->table("department")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('department')->hasColumn('modified')) ***REMOVED***
            $this->table("department")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('department')->hasColumn('deleted')) ***REMOVED***
            $this->table("department")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('department')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("department")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('department')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("department")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("department_type");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('department_type')->hasColumn('created')) ***REMOVED***
            $this->table("department_type")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('department_type')->hasColumn('modified')) ***REMOVED***
            $this->table("department_type")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('department_type')->hasColumn('deleted')) ***REMOVED***
            $this->table("department_type")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('department_type')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("department_type")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('department_type')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("department_type")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("educational_course");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'minimum_age'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('educational_course')->hasColumn('created')) ***REMOVED***
            $this->table("educational_course")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('educational_course')->hasColumn('modified')) ***REMOVED***
            $this->table("educational_course")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('educational_course')->hasColumn('deleted')) ***REMOVED***
            $this->table("educational_course")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('educational_course')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("educational_course")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('educational_course')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("educational_course")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("educational_course_description");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('educational_course_description')->hasColumn('created')) ***REMOVED***
            $this->table("educational_course_description")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('educational_course_description')->hasColumn('modified')) ***REMOVED***
            $this->table("educational_course_description")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('educational_course_description')->hasColumn('deleted')) ***REMOVED***
            $this->table("educational_course_description")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('educational_course_description')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("educational_course_description")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('educational_course_description')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("educational_course_description")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("educational_course_title");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('educational_course_title')->hasColumn('created')) ***REMOVED***
            $this->table("educational_course_title")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('educational_course_title')->hasColumn('modified')) ***REMOVED***
            $this->table("educational_course_title")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('educational_course_title')->hasColumn('deleted')) ***REMOVED***
            $this->table("educational_course_title")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('educational_course_title')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("educational_course_title")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('educational_course_title')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("educational_course_title")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $this->table("event")->changeColumn('public', 'boolean', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'end_leader'])->update();
        $table = $this->table("event");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'publicate_at'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('event')->hasColumn('created')) ***REMOVED***
            $this->table("event")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('event')->hasColumn('modified')) ***REMOVED***
            $this->table("event")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('event')->hasColumn('deleted')) ***REMOVED***
            $this->table("event")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('event')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("event")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('event')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("event")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("event_description");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('event_description')->hasColumn('created')) ***REMOVED***
            $this->table("event_description")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('event_description')->hasColumn('modified')) ***REMOVED***
            $this->table("event_description")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('event_description')->hasColumn('deleted')) ***REMOVED***
            $this->table("event_description")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('event_description')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("event_description")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('event_description')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("event_description")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("event_title");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('event_title')->hasColumn('created')) ***REMOVED***
            $this->table("event_title")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('event_title')->hasColumn('modified')) ***REMOVED***
            $this->table("event_title")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('event_title')->hasColumn('deleted')) ***REMOVED***
            $this->table("event_title")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('event_title')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("event_title")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('event_title')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("event_title")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("image");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'type'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('image')->hasColumn('created')) ***REMOVED***
            $this->table("image")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('modified')) ***REMOVED***
            $this->table("image")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('deleted')) ***REMOVED***
            $this->table("image")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("image")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("image")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("language", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('language')->hasColumn('id')) ***REMOVED***
            $this->table("language")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED*** else ***REMOVED***
            $this->table("language")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED***
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 5, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('abbreviation', 'string', ['null' => false, 'limit' => 2, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name'])->update();
        $table->save();
        $table = $this->table("position", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('position')->hasColumn('id')) ***REMOVED***
            $this->table("position")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED*** else ***REMOVED***
            $this->table("position")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED***
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("sl_chest");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('sl_chest')->hasColumn('created')) ***REMOVED***
            $this->table("sl_chest")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('sl_chest')->hasColumn('modified')) ***REMOVED***
            $this->table("sl_chest")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('sl_chest')->hasColumn('deleted')) ***REMOVED***
            $this->table("sl_chest")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('sl_chest')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("sl_chest")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('sl_chest')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("sl_chest")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("sl_corridor");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('sl_corridor')->hasColumn('created')) ***REMOVED***
            $this->table("sl_corridor")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('sl_corridor')->hasColumn('modified')) ***REMOVED***
            $this->table("sl_corridor")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('sl_corridor')->hasColumn('deleted')) ***REMOVED***
            $this->table("sl_corridor")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('sl_corridor')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("sl_corridor")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('sl_corridor')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("sl_corridor")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("sl_location");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('sl_location')->hasColumn('created')) ***REMOVED***
            $this->table("sl_location")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('sl_location')->hasColumn('modified')) ***REMOVED***
            $this->table("sl_location")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('sl_location')->hasColumn('deleted')) ***REMOVED***
            $this->table("sl_location")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('sl_location')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("sl_location")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('sl_location')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("sl_location")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("sl_room");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('sl_room')->hasColumn('created')) ***REMOVED***
            $this->table("sl_room")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('sl_room')->hasColumn('modified')) ***REMOVED***
            $this->table("sl_room")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('sl_room')->hasColumn('deleted')) ***REMOVED***
            $this->table("sl_room")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('sl_room')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("sl_room")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('sl_room')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("sl_room")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("sl_shelf");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('sl_shelf')->hasColumn('created')) ***REMOVED***
            $this->table("sl_shelf")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('sl_shelf')->hasColumn('modified')) ***REMOVED***
            $this->table("sl_shelf")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('sl_shelf')->hasColumn('deleted')) ***REMOVED***
            $this->table("sl_shelf")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('sl_shelf')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("sl_shelf")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('sl_shelf')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("sl_shelf")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("sl_tray");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('sl_tray')->hasColumn('created')) ***REMOVED***
            $this->table("sl_tray")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('sl_tray')->hasColumn('modified')) ***REMOVED***
            $this->table("sl_tray")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('sl_tray')->hasColumn('deleted')) ***REMOVED***
            $this->table("sl_tray")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('sl_tray')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("sl_tray")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('sl_tray')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("sl_tray")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("storage_place");
        $table->addColumn('created_at', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('storage_place')->hasColumn('created')) ***REMOVED***
            $this->table("storage_place")->removeColumn('created')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('modified')) ***REMOVED***
            $this->table("storage_place")->removeColumn('modified')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('deleted')) ***REMOVED***
            $this->table("storage_place")->removeColumn('deleted')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('deleted_at')) ***REMOVED***
            $this->table("storage_place")->removeColumn('deleted_at')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('deleted_by')) ***REMOVED***
            $this->table("storage_place")->removeColumn('deleted_by')->update();
    ***REMOVED***
        $table = $this->table("user", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('user')->hasColumn('id')) ***REMOVED***
            $this->table("user")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED*** else ***REMOVED***
            $this->table("user")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED***
        $table->addColumn('city_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id'])->update();
        $table->addColumn('language_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'city_id'])->update();
        $table->addColumn('department_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'language_id'])->update();
        $table->addColumn('permission_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_id'])->update();
        $table->addColumn('position_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'permission_id'])->update();
        $table->addColumn('gender_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'position_id'])->update();
        $table->addColumn('first_name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'gender_id'])->update();
        $table->addColumn('email', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'first_name'])->update();
        $table->addColumn('username', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'email'])->update();
        $table->addColumn('password', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'username'])->update();
        $table->addColumn('signup_completed', 'boolean', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'password'])->update();
        $table->addColumn('js_certificate', 'boolean', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'signup_completed'])->update();
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
        if($this->table('user')->hasIndex('fk_user_department1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_department1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['department_id'], ['name' => "fk_user_department1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_position1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_position1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['position_id'], ['name' => "fk_user_position1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_language1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_language1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['language_id'], ['name' => "fk_user_language1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_gender1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_gender1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['gender_id'], ['name' => "fk_user_gender1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_city1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_city1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['city_id'], ['name' => "fk_user_city1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_permission1')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_permission1');
    ***REMOVED***
        $this->table("user")->addIndex(['permission_id'], ['name' => "fk_user_permission1", 'unique' => false])->save();
        $this->table("app_language")->removeIndexByName('PRIMARY');
        $this->dropTable("app_language");
        $this->table("app_position")->removeIndexByName('PRIMARY');
        $this->dropTable("app_position");
        $this->table("app_user")->removeIndexByName('PRIMARY');
        $this->table("app_user")->removeIndexByName('fk_user_department1_idx');
        $this->table("app_user")->removeIndexByName('fk_user_position1_idx');
        $this->table("app_user")->removeIndexByName('fk_user_language1_idx');
        $this->table("app_user")->removeIndexByName('fk_user_gender1_idx');
        $this->table("app_user")->removeIndexByName('fk_user_city1_idx');
        $this->table("app_user")->removeIndexByName('fk_user_permission1');
        $this->dropTable("app_user");
***REMOVED***
***REMOVED***
