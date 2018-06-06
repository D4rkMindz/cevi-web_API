<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class AddedHashesToEveryTable extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("article_quality");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("article_quality")->changeColumn('level', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $this->table("article_quality")->changeColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'level'])->update();
        $this->table("article_quality")->changeColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $this->table("article_quality")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("article_quality")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("department_event");
        $table->addColumn('department_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('event_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_hash'])->update();
        $table->addColumn('department_group_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'event_hash'])->update();
        $table->save();
        if($this->table('department_event')->hasColumn('department_id')) ***REMOVED***
            $this->table("department_event")->removeColumn('department_id')->update();
    ***REMOVED***
        if($this->table('department_event')->hasColumn('event_id')) ***REMOVED***
            $this->table("department_event")->removeColumn('event_id')->update();
    ***REMOVED***
        if($this->table('department_event')->hasColumn('department_group_id')) ***REMOVED***
            $this->table("department_event")->removeColumn('department_group_id')->update();
    ***REMOVED***
        if($this->table('department_event')->hasIndex('fk_department_has_event_event1_idx')) ***REMOVED***
            $this->table("department_event")->removeIndexByName('fk_department_has_event_event1_idx');
    ***REMOVED***
        $this->table("department_event")->addIndex(['event_hash'], ['name' => "fk_department_has_event_event1_idx", 'unique' => false])->save();
        if($this->table('department_event')->hasIndex('fk_department_has_event_department1_idx')) ***REMOVED***
            $this->table("department_event")->removeIndexByName('fk_department_has_event_department1_idx');
    ***REMOVED***
        $this->table("department_event")->addIndex(['department_hash'], ['name' => "fk_department_has_event_department1_idx", 'unique' => false])->save();
        if($this->table('department_event')->hasIndex('fk_department_event_department_group1_idx')) ***REMOVED***
            $this->table("department_event")->removeIndexByName('fk_department_event_department_group1_idx');
    ***REMOVED***
        $this->table("department_event")->addIndex(['department_group_hash'], ['name' => "fk_department_event_department_group1_idx", 'unique' => false])->save();
        $table = $this->table("department_group");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("department_group")->changeColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("department_group")->changeColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $this->table("department_group")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("department_group")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("department_region");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("department_region")->changeColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("department_region")->changeColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $this->table("department_region")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("department_region")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("department_type");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("department_type")->changeColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("department_type")->changeColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $this->table("department_type")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("department_type")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $this->table("department_type")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $this->table("department_type")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("department_type")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("department_type")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("department_type")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("department_type")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("educational_course");
        $table->addColumn('educational_course_organiser_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'educational_course_description_id'])->update();
        $table->addColumn('department_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "The organizer", 'after' => 'educational_course_organiser_hash'])->update();
        $table->addColumn('position_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "The minimum required position to participate", 'after' => 'city_id'])->update();
        $table->save();
        if($this->table('educational_course')->hasColumn('educational_course_organiser_id')) ***REMOVED***
            $this->table("educational_course")->removeColumn('educational_course_organiser_id')->update();
    ***REMOVED***
        if($this->table('educational_course')->hasColumn('department_id')) ***REMOVED***
            $this->table("educational_course")->removeColumn('department_id')->update();
    ***REMOVED***
        if($this->table('educational_course')->hasColumn('position_id')) ***REMOVED***
            $this->table("educational_course")->removeColumn('position_id')->update();
    ***REMOVED***
        if($this->table('educational_course')->hasIndex('fk_education_course_department1_idx')) ***REMOVED***
            $this->table("educational_course")->removeIndexByName('fk_education_course_department1_idx');
    ***REMOVED***
        $this->table("educational_course")->addIndex(['department_hash'], ['name' => "fk_education_course_department1_idx", 'unique' => false])->save();
        if($this->table('educational_course')->hasIndex('fk_education_course_position1_idx')) ***REMOVED***
            $this->table("educational_course")->removeIndexByName('fk_education_course_position1_idx');
    ***REMOVED***
        $this->table("educational_course")->addIndex(['position_hash'], ['name' => "fk_education_course_position1_idx", 'unique' => false])->save();
        if($this->table('educational_course')->hasIndex('fk_education_course_educational_course_organiser1_idx')) ***REMOVED***
            $this->table("educational_course")->removeIndexByName('fk_education_course_educational_course_organiser1_idx');
    ***REMOVED***
        $this->table("educational_course")->addIndex(['educational_course_organiser_hash'], ['name' => "fk_education_course_educational_course_organiser1_idx", 'unique' => false])->save();
        $table = $this->table("educational_course_organiser");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('user_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("educational_course_organiser")->changeColumn('name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'user_hash'])->update();
        $this->table("educational_course_organiser")->changeColumn('phone', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name'])->update();
        $this->table("educational_course_organiser")->changeColumn('email', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'phone'])->update();
        $this->table("educational_course_organiser")->changeColumn('notes', 'string', ['null' => true, 'limit' => 1500, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'email'])->update();
        $this->table("educational_course_organiser")->changeColumn('mobile', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'notes'])->update();
        $table->save();
        if($this->table('educational_course_organiser')->hasColumn('user_id')) ***REMOVED***
            $this->table("educational_course_organiser")->removeColumn('user_id')->update();
    ***REMOVED***
        if($this->table('educational_course_organiser')->hasIndex('fk_educational_course_organiser_user1_idx')) ***REMOVED***
            $this->table("educational_course_organiser")->removeIndexByName('fk_educational_course_organiser_user1_idx');
    ***REMOVED***
        $this->table("educational_course_organiser")->addIndex(['user_hash'], ['name' => "fk_educational_course_organiser_user1_idx", 'unique' => false])->save();
        $table = $this->table("educational_course_participant");
        $table->addColumn('hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('educational_course_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $table->addColumn('user_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'educational_course_hash'])->update();
        $table->save();
        if($this->table('educational_course_participant')->hasColumn('educational_course_id')) ***REMOVED***
            $this->table("educational_course_participant")->removeColumn('educational_course_id')->update();
    ***REMOVED***
        if($this->table('educational_course_participant')->hasColumn('user_id')) ***REMOVED***
            $this->table("educational_course_participant")->removeColumn('user_id')->update();
    ***REMOVED***
        if($this->table('educational_course_participant')->hasIndex('fk_educational_course_has_user_user1_idx')) ***REMOVED***
            $this->table("educational_course_participant")->removeIndexByName('fk_educational_course_has_user_user1_idx');
    ***REMOVED***
        $this->table("educational_course_participant")->addIndex(['user_hash'], ['name' => "fk_educational_course_has_user_user1_idx", 'unique' => false])->save();
        if($this->table('educational_course_participant')->hasIndex('fk_educational_course_has_user_educational_course1_idx')) ***REMOVED***
            $this->table("educational_course_participant")->removeIndexByName('fk_educational_course_has_user_educational_course1_idx');
    ***REMOVED***
        $this->table("educational_course_participant")->addIndex(['educational_course_hash'], ['name' => "fk_educational_course_has_user_educational_course1_idx", 'unique' => false])->save();
        $table = $this->table("email_token");
        $table->addColumn('user_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->save();
        if($this->table('email_token')->hasColumn('user_id')) ***REMOVED***
            $this->table("email_token")->removeColumn('user_id')->update();
    ***REMOVED***
        $table = $this->table("event");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("event")->changeColumn('event_title_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $this->table("event")->changeColumn('event_description_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'event_title_id'])->update();
        $this->table("event")->changeColumn('price', 'decimal', ['null' => false, 'precision' => 10, 'after' => 'event_description_id'])->update();
        $this->table("event")->changeColumn('start', 'datetime', ['null' => false, 'after' => 'price'])->update();
        $this->table("event")->changeColumn('end', 'datetime', ['null' => false, 'after' => 'start'])->update();
        $this->table("event")->changeColumn('start_leader', 'datetime', ['null' => false, 'after' => 'end'])->update();
        $this->table("event")->changeColumn('end_leader', 'datetime', ['null' => false, 'after' => 'start_leader'])->update();
        $this->table("event")->changeColumn('public', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'end_leader'])->update();
        $this->table("event")->changeColumn('publicize_at', 'datetime', ['null' => false, 'after' => 'public'])->update();
        $this->table("event")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'publicize_at'])->update();
        $this->table("event")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("event")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("event")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("event")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("event")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("event_article");
        $table->addColumn('article_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('event_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'article_hash'])->update();
        $table->addColumn('accountable_user_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'event_hash'])->update();
        $table->save();
        if($this->table('event_article')->hasColumn('article_id')) ***REMOVED***
            $this->table("event_article")->removeColumn('article_id')->update();
    ***REMOVED***
        if($this->table('event_article')->hasColumn('event_id')) ***REMOVED***
            $this->table("event_article")->removeColumn('event_id')->update();
    ***REMOVED***
        if($this->table('event_article')->hasColumn('accountable_user_id')) ***REMOVED***
            $this->table("event_article")->removeColumn('accountable_user_id')->update();
    ***REMOVED***
        if($this->table('event_article')->hasIndex('fk_article_has_event_event1_idx')) ***REMOVED***
            $this->table("event_article")->removeIndexByName('fk_article_has_event_event1_idx');
    ***REMOVED***
        $this->table("event_article")->addIndex(['event_hash'], ['name' => "fk_article_has_event_event1_idx", 'unique' => false])->save();
        if($this->table('event_article')->hasIndex('fk_article_has_event_article1_idx')) ***REMOVED***
            $this->table("event_article")->removeIndexByName('fk_article_has_event_article1_idx');
    ***REMOVED***
        $this->table("event_article")->addIndex(['article_hash'], ['name' => "fk_article_has_event_article1_idx", 'unique' => false])->save();
        if($this->table('event_article')->hasIndex('fk_event_article_app_user1_idx')) ***REMOVED***
            $this->table("event_article")->removeIndexByName('fk_event_article_app_user1_idx');
    ***REMOVED***
        $this->table("event_article")->addIndex(['accountable_user_hash'], ['name' => "fk_event_article_app_user1_idx", 'unique' => false])->save();
        $table = $this->table("event_participant");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('user_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\\\\\'s participation is registered, bc the children is registered in a department.", 'after' => 'hash'])->update();
        $table->addColumn('event_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\\\\\\\'s participation is registered, bc the children is registered in a department.", 'after' => 'user_hash'])->update();
        $table->addColumn('event_participation_status_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'event_hash'])->update();
        $this->table("event_participant")->changeColumn('message', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'event_participation_status_hash'])->update();
        $this->table("event_participant")->changeColumn('created_at', 'datetime', ['null' => false, 'after' => 'message'])->update();
        $this->table("event_participant")->changeColumn('created_by', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("event_participant")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("event_participant")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("event_participant")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("event_participant")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('event_participant')->hasColumn('user_id')) ***REMOVED***
            $this->table("event_participant")->removeColumn('user_id')->update();
    ***REMOVED***
        if($this->table('event_participant')->hasColumn('event_id')) ***REMOVED***
            $this->table("event_participant")->removeColumn('event_id')->update();
    ***REMOVED***
        if($this->table('event_participant')->hasColumn('event_participation_status_id')) ***REMOVED***
            $this->table("event_participant")->removeColumn('event_participation_status_id')->update();
    ***REMOVED***
        if($this->table('event_participant')->hasIndex('fk_user_has_event_event1_idx')) ***REMOVED***
            $this->table("event_participant")->removeIndexByName('fk_user_has_event_event1_idx');
    ***REMOVED***
        $this->table("event_participant")->addIndex(['event_hash'], ['name' => "fk_user_has_event_event1_idx", 'unique' => false])->save();
        if($this->table('event_participant')->hasIndex('fk_user_has_event_user1_idx')) ***REMOVED***
            $this->table("event_participant")->removeIndexByName('fk_user_has_event_user1_idx');
    ***REMOVED***
        $this->table("event_participant")->addIndex(['user_hash'], ['name' => "fk_user_has_event_user1_idx", 'unique' => false])->save();
        if($this->table('event_participant')->hasIndex('fk_event_participant_event_participation_status1_idx')) ***REMOVED***
            $this->table("event_participant")->removeIndexByName('fk_event_participant_event_participation_status1_idx');
    ***REMOVED***
        $this->table("event_participant")->addIndex(['event_participation_status_hash'], ['name' => "fk_event_participant_event_participation_status1_idx", 'unique' => false])->save();
        $table = $this->table("event_participation_status");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("event_participation_status")->changeColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("event_participation_status")->changeColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $this->table("event_participation_status")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("event_participation_status")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("gender");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("gender")->changeColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("gender")->changeColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $this->table("gender")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("gender")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("image");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("image")->changeColumn('url', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("image")->changeColumn('type', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'url'])->update();
        $this->table("image")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'type'])->update();
        $this->table("image")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("image")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("image")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("image")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("image")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("language");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("language")->changeColumn('name', 'string', ['null' => false, 'limit' => 5, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("language")->changeColumn('abbreviation', 'string', ['null' => false, 'limit' => 2, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name'])->update();
        $table->save();
        $table = $this->table("permission");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("permission")->changeColumn('level', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $this->table("permission")->changeColumn('name', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'level'])->update();
        $table->save();
        $table = $this->table("position");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("position")->changeColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'hash'])->update();
        $this->table("position")->changeColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $this->table("position")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("position")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $this->table("position")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $this->table("position")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("position")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("position")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("position")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("position")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $this->table("user")->changeColumn('city_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id'])->update();
        $table = $this->table("user");
        $table->addColumn('language_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'city_id'])->update();
        $table->addColumn('permission_hash', 'string', ['null' => false, 'default' => '4', 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "See permission table", 'after' => 'language_hash'])->update();
        $table->addColumn('department_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'permission_hash'])->update();
        $table->addColumn('position_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_hash'])->update();
        $table->addColumn('gender_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'position_hash'])->update();
        $table->save();
        if($this->table('user')->hasColumn('language_id')) ***REMOVED***
            $this->table("user")->removeColumn('language_id')->update();
    ***REMOVED***
        if($this->table('user')->hasColumn('permission_id')) ***REMOVED***
            $this->table("user")->removeColumn('permission_id')->update();
    ***REMOVED***
        if($this->table('user')->hasColumn('department_id')) ***REMOVED***
            $this->table("user")->removeColumn('department_id')->update();
    ***REMOVED***
        if($this->table('user')->hasColumn('position_id')) ***REMOVED***
            $this->table("user")->removeColumn('position_id')->update();
    ***REMOVED***
        if($this->table('user')->hasColumn('gender_id')) ***REMOVED***
            $this->table("user")->removeColumn('gender_id')->update();
    ***REMOVED***
        if($this->table('user')->hasIndex('fk_user_department1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_department1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['department_hash'], ['name' => "fk_user_department1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_position1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_position1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['position_hash'], ['name' => "fk_user_position1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_language1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_language1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['language_hash'], ['name' => "fk_user_language1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_user_gender1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_user_gender1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['gender_hash'], ['name' => "fk_user_gender1_idx", 'unique' => false])->save();
        if($this->table('user')->hasIndex('fk_app_user_permission1_idx')) ***REMOVED***
            $this->table("user")->removeIndexByName('fk_app_user_permission1_idx');
    ***REMOVED***
        $this->table("user")->addIndex(['permission_hash'], ['name' => "fk_app_user_permission1_idx", 'unique' => false])->save();
***REMOVED***
***REMOVED***
