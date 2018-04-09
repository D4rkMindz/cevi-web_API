<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class AddedIoneeightnNames extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $this->table("app_language")->changeColumn('name', 'string', ['null' => false, 'limit' => 5, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table = $this->table("article_quality");
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'level'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        if($this->table('article_quality')->hasColumn('name')) ***REMOVED***
            $this->table("article_quality")->removeColumn('name')->update();
    ***REMOVED***
        $this->table("department_group")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("department_group")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $this->table("event_participant")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable', 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\'s participation is registered, bc the children is registered in a department."])->update();
        $this->table("event_participant")->changeColumn('user_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\'s participation is registered, bc the children is registered in a department.", 'after' => 'id'])->update();
        $this->table("event_participant")->changeColumn('event_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\'s participation is registered, bc the children is registered in a department.", 'after' => 'user_id'])->update();
        $this->table("city")->changeColumn('country', 'string', ['null' => false, 'limit' => 2, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'comment' => "Land", 'after' => 'id'])->update();
        $this->table("city")->changeColumn('state', 'string', ['null' => false, 'limit' => 10, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'comment' => "Kanton / Bundesland / Region", 'after' => 'country'])->update();
        $this->table("city")->changeColumn('number', 'string', ['null' => false, 'limit' => 10, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'state'])->update();
        $this->table("city")->changeColumn('number2', 'string', ['null' => true, 'limit' => 10, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'number'])->update();
        $this->table("city")->changeColumn('title_de', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'number2'])->update();
        $this->table("city")->changeColumn('title_fr', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'title_de'])->update();
        $this->table("city")->changeColumn('title_it', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'title_fr'])->update();
        $this->table("city")->changeColumn('title_en', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_unicode_ci", 'encoding' => "utf8", 'after' => 'title_it'])->update();
        $table = $this->table("city");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'title_en'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'boolean', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('city')->hasColumn('created_at')) ***REMOVED***
            $this->table("city")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('city')->hasColumn('modified_at')) ***REMOVED***
            $this->table("city")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('city')->hasColumn('archived_at')) ***REMOVED***
            $this->table("city")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('city')->hasColumn('archived_by')) ***REMOVED***
            $this->table("city")->removeColumn('archived_by')->update();
    ***REMOVED***
        if($this->table('city')->hasIndex('idx_country_number')) ***REMOVED***
            $this->table("city")->removeIndexByName('idx_country_number');
    ***REMOVED***
        $this->table("city")->addIndex(['country','number'], ['name' => "idx_country_number", 'unique' => false])->save();
        $table = $this->table("city", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_unicode_ci", 'comment' => "Postal codes, ZIP (Postleitzahlen)"]);
        $table->save();
***REMOVED***
***REMOVED***
