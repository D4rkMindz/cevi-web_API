<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class AddedMissingHashes extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("educational_course");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("educational_course")->changeColumn('educational_course_title_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $this->table("educational_course")->changeColumn('educational_course_description_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'educational_course_title_id'])->update();
        $this->table("educational_course")->changeColumn('educational_course_organiser_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'educational_course_description_id'])->update();
        $this->table("educational_course")->changeColumn('department_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "The organizer", 'after' => 'educational_course_organiser_hash'])->update();
        $this->table("educational_course")->changeColumn('city_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'comment' => "Where the edu_course is taking place", 'after' => 'department_hash'])->update();
        $this->table("educational_course")->changeColumn('position_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "The minimum required position to participate", 'after' => 'city_id'])->update();
        $this->table("educational_course")->changeColumn('number', 'decimal', ['null' => false, 'precision' => 10, 'after' => 'position_hash'])->update();
        $this->table("educational_course")->changeColumn('start_date', 'datetime', ['null' => false, 'after' => 'number'])->update();
        $this->table("educational_course")->changeColumn('end_date', 'datetime', ['null' => false, 'after' => 'start_date'])->update();
        $this->table("educational_course")->changeColumn('minimum_age', 'year', ['null' => false, 'limit' => 4, 'after' => 'end_date'])->update();
        $this->table("educational_course")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'minimum_age'])->update();
        $this->table("educational_course")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("educational_course")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("educational_course")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("educational_course")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("educational_course")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("educational_course_image");
        $table->addColumn('educational_course_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('image_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'educational_course_hash'])->update();
        $table->save();
        if($this->table('educational_course_image')->hasColumn('educational_course_id')) ***REMOVED***
            $this->table("educational_course_image")->removeColumn('educational_course_id')->update();
    ***REMOVED***
        if($this->table('educational_course_image')->hasColumn('image_id')) ***REMOVED***
            $this->table("educational_course_image")->removeColumn('image_id')->update();
    ***REMOVED***
        if($this->table('educational_course_image')->hasIndex('fk_educational_course_has_image_image1_idx')) ***REMOVED***
            $this->table("educational_course_image")->removeIndexByName('fk_educational_course_has_image_image1_idx');
    ***REMOVED***
        $this->table("educational_course_image")->addIndex(['image_hash'], ['name' => "fk_educational_course_has_image_image1_idx", 'unique' => false])->save();
        if($this->table('educational_course_image')->hasIndex('fk_educational_course_has_image_educational_course1_idx')) ***REMOVED***
            $this->table("educational_course_image")->removeIndexByName('fk_educational_course_has_image_educational_course1_idx');
    ***REMOVED***
        $this->table("educational_course_image")->addIndex(['educational_course_hash'], ['name' => "fk_educational_course_has_image_educational_course1_idx", 'unique' => false])->save();
        $table = $this->table("event_image");
        $table->addColumn('image_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('event_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'image_hash'])->update();
        $table->save();
        if($this->table('event_image')->hasColumn('image_id')) ***REMOVED***
            $this->table("event_image")->removeColumn('image_id')->update();
    ***REMOVED***
        if($this->table('event_image')->hasColumn('event_id')) ***REMOVED***
            $this->table("event_image")->removeColumn('event_id')->update();
    ***REMOVED***
        if($this->table('event_image')->hasIndex('fk_image_has_event_event1_idx')) ***REMOVED***
            $this->table("event_image")->removeIndexByName('fk_image_has_event_event1_idx');
    ***REMOVED***
        $this->table("event_image")->addIndex(['event_hash'], ['name' => "fk_image_has_event_event1_idx", 'unique' => false])->save();
        if($this->table('event_image')->hasIndex('fk_image_has_event_image1_idx')) ***REMOVED***
            $this->table("event_image")->removeIndexByName('fk_image_has_event_image1_idx');
    ***REMOVED***
        $this->table("event_image")->addIndex(['image_hash'], ['name' => "fk_image_has_event_image1_idx", 'unique' => false])->save();
        $table = $this->table("user");
        $table->addColumn('hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $this->table("user")->changeColumn('city_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'hash'])->update();
        $this->table("user")->changeColumn('language_hash', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'city_id'])->update();
        $this->table("user")->changeColumn('permission_hash', 'string', ['null' => false, 'default' => '4', 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'comment' => "See permission table", 'after' => 'language_hash'])->update();
        $this->table("user")->changeColumn('department_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'permission_hash'])->update();
        $this->table("user")->changeColumn('position_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'department_hash'])->update();
        $this->table("user")->changeColumn('gender_hash', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'position_hash'])->update();
        $this->table("user")->changeColumn('first_name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'gender_hash'])->update();
        $this->table("user")->changeColumn('email', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'first_name'])->update();
        $this->table("user")->changeColumn('username', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'email'])->update();
        $this->table("user")->changeColumn('password', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'username'])->update();
        $this->table("user")->changeColumn('signup_completed', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'password'])->update();
        $this->table("user")->changeColumn('email_verified', 'boolean', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'signup_completed'])->update();
        $this->table("user")->changeColumn('js_certificate', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'email_verified'])->update();
        $this->table("user")->changeColumn('last_name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'js_certificate'])->update();
        $this->table("user")->changeColumn('address', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'last_name'])->update();
        $this->table("user")->changeColumn('cevi_name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'address'])->update();
        $this->table("user")->changeColumn('birthdate', 'date', ['null' => true, 'after' => 'cevi_name'])->update();
        $this->table("user")->changeColumn('phone', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'birthdate'])->update();
        $this->table("user")->changeColumn('mobile', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'phone'])->update();
        $this->table("user")->changeColumn('js_certificate_until', 'year', ['null' => true, 'limit' => 4, 'after' => 'mobile'])->update();
        $this->table("user")->changeColumn('created_at', 'datetime', ['null' => true, 'after' => 'js_certificate_until'])->update();
        $this->table("user")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("user")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("user")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("user")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("user")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
***REMOVED***
***REMOVED***
