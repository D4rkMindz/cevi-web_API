<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class UpdatedParticipations extends AbstractMigration
***REMOVED***
    public function change()
    ***REMOVED***
        $table = $this->table("app_language", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('app_language')->hasColumn('id')) ***REMOVED***
            $this->table("app_language")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED*** else ***REMOVED***
            $this->table("app_language")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED***
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 4, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('abbreviation', 'string', ['null' => false, 'limit' => 2, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name'])->update();
        $table->save();
        $table = $this->table("app_position", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('app_position')->hasColumn('id')) ***REMOVED***
            $this->table("app_position")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED*** else ***REMOVED***
            $this->table("app_position")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED***
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $table->addColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $table->addColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        $table = $this->table("app_user", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('app_user')->hasColumn('id')) ***REMOVED***
            $this->table("app_user")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED*** else ***REMOVED***
            $this->table("app_user")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED***
        $table->addColumn('city_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id'])->update();
        $table->addColumn('language_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'city_id'])->update();
        $table->addColumn('permission_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'language_id'])->update();
        $table->addColumn('department_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'permission_id'])->update();
        $table->addColumn('position_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_id'])->update();
        $table->addColumn('gender_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'position_id'])->update();
        $table->addColumn('first_name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'gender_id'])->update();
        $table->addColumn('email', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'first_name'])->update();
        $table->addColumn('username', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'email'])->update();
        $table->addColumn('password', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'username'])->update();
        $table->addColumn('signup_completed', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'password'])->update();
        $table->addColumn('js_certificate', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'signup_completed'])->update();
        $table->addColumn('last_name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'js_certificate'])->update();
        $table->addColumn('address', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'last_name'])->update();
        $table->addColumn('cevi_name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'address'])->update();
        $table->addColumn('birthdate', 'date', ['null' => true, 'after' => 'cevi_name'])->update();
        $table->addColumn('phone', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'birthdate'])->update();
        $table->addColumn('mobile', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'phone'])->update();
        $table->addColumn('js_certificate_until', 'year', ['null' => true, 'limit' => 4, 'after' => 'mobile'])->update();
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'js_certificate_until'])->update();
        $table->addColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('app_user')->hasIndex('fk_user_department1_idx')) ***REMOVED***
            $this->table("app_user")->removeIndexByName('fk_user_department1_idx');
    ***REMOVED***
        $this->table("app_user")->addIndex(['department_id'], ['name' => "fk_user_department1_idx", 'unique' => false])->save();
        if($this->table('app_user')->hasIndex('fk_user_position1_idx')) ***REMOVED***
            $this->table("app_user")->removeIndexByName('fk_user_position1_idx');
    ***REMOVED***
        $this->table("app_user")->addIndex(['position_id'], ['name' => "fk_user_position1_idx", 'unique' => false])->save();
        if($this->table('app_user')->hasIndex('fk_user_language1_idx')) ***REMOVED***
            $this->table("app_user")->removeIndexByName('fk_user_language1_idx');
    ***REMOVED***
        $this->table("app_user")->addIndex(['language_id'], ['name' => "fk_user_language1_idx", 'unique' => false])->save();
        if($this->table('app_user')->hasIndex('fk_user_gender1_idx')) ***REMOVED***
            $this->table("app_user")->removeIndexByName('fk_user_gender1_idx');
    ***REMOVED***
        $this->table("app_user")->addIndex(['gender_id'], ['name' => "fk_user_gender1_idx", 'unique' => false])->save();
        if($this->table('app_user')->hasIndex('fk_user_city1_idx')) ***REMOVED***
            $this->table("app_user")->removeIndexByName('fk_user_city1_idx');
    ***REMOVED***
        $this->table("app_user")->addIndex(['city_id'], ['name' => "fk_user_city1_idx", 'unique' => false])->save();
        if($this->table('app_user')->hasIndex('fk_app_user_permission1_idx')) ***REMOVED***
            $this->table("app_user")->removeIndexByName('fk_app_user_permission1_idx');
    ***REMOVED***
        $this->table("app_user")->addIndex(['permission_id'], ['name' => "fk_app_user_permission1_idx", 'unique' => false])->save();
        $table = $this->table("article");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'barcode'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('article')->hasColumn('created_at')) ***REMOVED***
            $this->table("article")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('article')->hasColumn('modified_at')) ***REMOVED***
            $this->table("article")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('article')->hasColumn('archived_at')) ***REMOVED***
            $this->table("article")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('article')->hasColumn('archived_by')) ***REMOVED***
            $this->table("article")->removeColumn('archived_by')->update();
    ***REMOVED***
        if($this->table('article')->hasIndex('fk_article_department1_idx')) ***REMOVED***
            $this->table("article")->removeIndexByName('fk_article_department1_idx');
    ***REMOVED***
        $this->table("article")->addIndex(['department_id'], ['name' => "fk_article_department1_idx", 'unique' => false])->save();
        $table = $this->table("article_description");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('article_description')->hasColumn('created_at')) ***REMOVED***
            $this->table("article_description")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('article_description')->hasColumn('modified_at')) ***REMOVED***
            $this->table("article_description")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('article_description')->hasColumn('archived_at')) ***REMOVED***
            $this->table("article_description")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('article_description')->hasColumn('archived_by')) ***REMOVED***
            $this->table("article_description")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("article_quality");
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'level'])->update();
        $table->save();
        if($this->table('article_quality')->hasColumn('name_de')) ***REMOVED***
            $this->table("article_quality")->removeColumn('name_de')->update();
    ***REMOVED***
        if($this->table('article_quality')->hasColumn('name_en')) ***REMOVED***
            $this->table("article_quality")->removeColumn('name_en')->update();
    ***REMOVED***
        if($this->table('article_quality')->hasColumn('name_fr')) ***REMOVED***
            $this->table("article_quality")->removeColumn('name_fr')->update();
    ***REMOVED***
        if($this->table('article_quality')->hasColumn('name_it')) ***REMOVED***
            $this->table("article_quality")->removeColumn('name_it')->update();
    ***REMOVED***
        $table = $this->table("article_title");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('article_title')->hasColumn('created_at')) ***REMOVED***
            $this->table("article_title")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('article_title')->hasColumn('modified_at')) ***REMOVED***
            $this->table("article_title")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('article_title')->hasColumn('archived_at')) ***REMOVED***
            $this->table("article_title")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('article_title')->hasColumn('archived_by')) ***REMOVED***
            $this->table("article_title")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("city");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'title_en'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
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
        $table = $this->table("department");
        $table->addColumn('department_region_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_group_id'])->update();
        $this->table("department")->changeColumn('department_type_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_region_id'])->update();
        $this->table("department")->changeColumn('city_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'department_type_id'])->update();
        $this->table("department")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'city_id'])->update();
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("department")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("department")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('department')->hasColumn('created_at')) ***REMOVED***
            $this->table("department")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('department')->hasColumn('modified_at')) ***REMOVED***
            $this->table("department")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('department')->hasColumn('archived_at')) ***REMOVED***
            $this->table("department")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('department')->hasColumn('archived_by')) ***REMOVED***
            $this->table("department")->removeColumn('archived_by')->update();
    ***REMOVED***
        if($this->table('department')->hasIndex('fk_department_department_group_idx')) ***REMOVED***
            $this->table("department")->removeIndexByName('fk_department_department_group_idx');
    ***REMOVED***
        $this->table("department")->addIndex(['department_region_id'], ['name' => "fk_department_department_group_idx", 'unique' => false])->save();
        if($this->table('department')->hasIndex('fk_department_department_group1_idx')) ***REMOVED***
            $this->table("department")->removeIndexByName('fk_department_department_group1_idx');
    ***REMOVED***
        $this->table("department")->addIndex(['department_group_id'], ['name' => "fk_department_department_group1_idx", 'unique' => false])->save();
        if($this->table('department_event')->hasIndex('fk_department_event_department_group1_idx')) ***REMOVED***
            $this->table("department_event")->removeIndexByName('fk_department_event_department_group1_idx');
    ***REMOVED***
        $this->table("department_event")->addIndex(['department_group_id'], ['name' => "fk_department_event_department_group1_idx", 'unique' => false])->save();
        $this->table("department_group")->changeColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $this->table("department_group")->changeColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_it'])->update();
        $table = $this->table("department_type");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('department_type')->hasColumn('created_at')) ***REMOVED***
            $this->table("department_type")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('department_type')->hasColumn('modified_at')) ***REMOVED***
            $this->table("department_type")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('department_type')->hasColumn('archived_at')) ***REMOVED***
            $this->table("department_type")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('department_type')->hasColumn('archived_by')) ***REMOVED***
            $this->table("department_type")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("educational_course");
        $table->addColumn('number', 'decimal', ['null' => false, 'precision' => 10, 'after' => 'position_id'])->update();
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'minimum_age'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('educational_course')->hasColumn('price')) ***REMOVED***
            $this->table("educational_course")->removeColumn('price')->update();
    ***REMOVED***
        if($this->table('educational_course')->hasColumn('created_at')) ***REMOVED***
            $this->table("educational_course")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('educational_course')->hasColumn('modified_at')) ***REMOVED***
            $this->table("educational_course")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('educational_course')->hasColumn('archived_at')) ***REMOVED***
            $this->table("educational_course")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('educational_course')->hasColumn('archived_by')) ***REMOVED***
            $this->table("educational_course")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("educational_course_description");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('educational_course_description')->hasColumn('created_at')) ***REMOVED***
            $this->table("educational_course_description")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('educational_course_description')->hasColumn('modified_at')) ***REMOVED***
            $this->table("educational_course_description")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('educational_course_description')->hasColumn('archived_at')) ***REMOVED***
            $this->table("educational_course_description")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('educational_course_description')->hasColumn('archived_by')) ***REMOVED***
            $this->table("educational_course_description")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("educational_course_organiser");
        $table->addColumn('name', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'user_id'])->update();
        $this->table("educational_course_organiser")->changeColumn('phone', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name'])->update();
        $this->table("educational_course_organiser")->changeColumn('email', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'phone'])->update();
        $this->table("educational_course_organiser")->changeColumn('notes', 'string', ['null' => true, 'limit' => 1500, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'email'])->update();
        $this->table("educational_course_organiser")->changeColumn('mobile', 'string', ['null' => true, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'notes'])->update();
        $table->save();
        if($this->table('educational_course_participant')->hasColumn('participation_status_id')) ***REMOVED***
            $this->table("educational_course_participant")->removeColumn('participation_status_id')->update();
    ***REMOVED***
        if($this->table('educational_course_participant')->hasColumn('created_at')) ***REMOVED***
            $this->table("educational_course_participant")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('educational_course_participant')->hasColumn('created_by')) ***REMOVED***
            $this->table("educational_course_participant")->removeColumn('created_by')->update();
    ***REMOVED***
        if($this->table('educational_course_participant')->hasColumn('modified_at')) ***REMOVED***
            $this->table("educational_course_participant")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('educational_course_participant')->hasColumn('modified_by')) ***REMOVED***
            $this->table("educational_course_participant")->removeColumn('modified_by')->update();
    ***REMOVED***
        if($this->table('educational_course_participant')->hasColumn('archived_at')) ***REMOVED***
            $this->table("educational_course_participant")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('educational_course_participant')->hasColumn('archived_by')) ***REMOVED***
            $this->table("educational_course_participant")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("educational_course_title");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('educational_course_title')->hasColumn('created_at')) ***REMOVED***
            $this->table("educational_course_title")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('educational_course_title')->hasColumn('modified_at')) ***REMOVED***
            $this->table("educational_course_title")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('educational_course_title')->hasColumn('archived_at')) ***REMOVED***
            $this->table("educational_course_title")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('educational_course_title')->hasColumn('archived_by')) ***REMOVED***
            $this->table("educational_course_title")->removeColumn('archived_by')->update();
    ***REMOVED***
        $this->table("event")->changeColumn('price', 'decimal', ['null' => false, 'precision' => 10, 'after' => 'event_description_id'])->update();
        $this->table("event")->changeColumn('public', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'end_leader'])->update();
        $table = $this->table("event");
        $table->addColumn('publicize_at', 'datetime', ['null' => false, 'after' => 'public'])->update();
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'publicize_at'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('event')->hasColumn('publicate_at')) ***REMOVED***
            $this->table("event")->removeColumn('publicate_at')->update();
    ***REMOVED***
        if($this->table('event')->hasColumn('created_at')) ***REMOVED***
            $this->table("event")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('event')->hasColumn('modified_at')) ***REMOVED***
            $this->table("event")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('event')->hasColumn('archived_at')) ***REMOVED***
            $this->table("event")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('event')->hasColumn('archived_by')) ***REMOVED***
            $this->table("event")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("event_description");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('event_description')->hasColumn('created_at')) ***REMOVED***
            $this->table("event_description")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('event_description')->hasColumn('modified_at')) ***REMOVED***
            $this->table("event_description")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('event_description')->hasColumn('archived_at')) ***REMOVED***
            $this->table("event_description")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('event_description')->hasColumn('archived_by')) ***REMOVED***
            $this->table("event_description")->removeColumn('archived_by')->update();
    ***REMOVED***
        $this->table("event_participant")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable', 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\'s participation is registered, bc the children is registered in a department."])->update();
        $this->table("event_participant")->changeColumn('user_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\'s participation is registered, bc the children is registered in a department.", 'after' => 'id'])->update();
        $this->table("event_participant")->changeColumn('event_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'comment' => "This table is linked to event because a children can participate via any department to an event. it does not matter via which department it\'s participation is registered, bc the children is registered in a department.", 'after' => 'user_id'])->update();
        $table = $this->table("event_participant");
        $table->addColumn('event_participation_status_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'event_id'])->update();
        $table->addColumn('message', 'string', ['null' => true, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'event_participation_status_id'])->update();
        $this->table("event_participant")->changeColumn('created_at', 'datetime', ['null' => false, 'after' => 'message'])->update();
        $this->table("event_participant")->changeColumn('created_by', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created_at'])->update();
        $this->table("event_participant")->changeColumn('modified_at', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("event_participant")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified_at'])->update();
        $this->table("event_participant")->changeColumn('archived_at', 'datetime', ['null' => true, 'after' => 'modified_by'])->update();
        $this->table("event_participant")->changeColumn('archived_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'archived_at'])->update();
        $table->save();
        if($this->table('event_participant')->hasColumn('participation_status_id')) ***REMOVED***
            $this->table("event_participant")->removeColumn('participation_status_id')->update();
    ***REMOVED***
        if($this->table('event_participant')->hasIndex('fk_event_participant_event_participation_status1_idx')) ***REMOVED***
            $this->table("event_participant")->removeIndexByName('fk_event_participant_event_participation_status1_idx');
    ***REMOVED***
        $this->table("event_participant")->addIndex(['event_participation_status_id'], ['name' => "fk_event_participant_event_participation_status1_idx", 'unique' => false])->save();
        $table = $this->table("event_participation_status", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => ""]);
        $table->save();
        if ($this->table('event_participation_status')->hasColumn('id')) ***REMOVED***
            $this->table("event_participation_status")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED*** else ***REMOVED***
            $this->table("event_participation_status")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED***
        $table->addColumn('name_de', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->addColumn('name_en', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_de'])->update();
        $table->addColumn('name_fr', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_en'])->update();
        $table->addColumn('name_it', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'name_fr'])->update();
        $table->save();
        $table = $this->table("event_title");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name_it'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('event_title')->hasColumn('created_at')) ***REMOVED***
            $this->table("event_title")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('event_title')->hasColumn('modified_at')) ***REMOVED***
            $this->table("event_title")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('event_title')->hasColumn('archived_at')) ***REMOVED***
            $this->table("event_title")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('event_title')->hasColumn('archived_by')) ***REMOVED***
            $this->table("event_title")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("gender");
        $table->addColumn('name', 'string', ['null' => false, 'limit' => 45, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'id'])->update();
        $table->save();
        if($this->table('gender')->hasColumn('name_en')) ***REMOVED***
            $this->table("gender")->removeColumn('name_en')->update();
    ***REMOVED***
        if($this->table('gender')->hasColumn('name_de')) ***REMOVED***
            $this->table("gender")->removeColumn('name_de')->update();
    ***REMOVED***
        if($this->table('gender')->hasColumn('name_fr')) ***REMOVED***
            $this->table("gender")->removeColumn('name_fr')->update();
    ***REMOVED***
        if($this->table('gender')->hasColumn('name_it')) ***REMOVED***
            $this->table("gender")->removeColumn('name_it')->update();
    ***REMOVED***
        $table = $this->table("image");
        if ($this->table('image')->hasColumn('id')) ***REMOVED***
            $this->table("image")->changeColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED*** else ***REMOVED***
            $this->table("image")->addColumn('id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'identity' => 'enable'])->update();
    ***REMOVED***
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'type'])->update();
        $this->table("image")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("image")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('image')->hasColumn('s')) ***REMOVED***
            $this->table("image")->removeColumn('s')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('name_de')) ***REMOVED***
            $this->table("image")->removeColumn('name_de')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('name_en')) ***REMOVED***
            $this->table("image")->removeColumn('name_en')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('name_fr')) ***REMOVED***
            $this->table("image")->removeColumn('name_fr')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('name_it')) ***REMOVED***
            $this->table("image")->removeColumn('name_it')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('created_at')) ***REMOVED***
            $this->table("image")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('modified_at')) ***REMOVED***
            $this->table("image")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('archived_at')) ***REMOVED***
            $this->table("image")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('image')->hasColumn('archived_by')) ***REMOVED***
            $this->table("image")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("sl_chest");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('sl_chest')->hasColumn('created_at')) ***REMOVED***
            $this->table("sl_chest")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('sl_chest')->hasColumn('modified_at')) ***REMOVED***
            $this->table("sl_chest")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('sl_chest')->hasColumn('archived_at')) ***REMOVED***
            $this->table("sl_chest")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('sl_chest')->hasColumn('archived_by')) ***REMOVED***
            $this->table("sl_chest")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("sl_corridor");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('sl_corridor')->hasColumn('created_at')) ***REMOVED***
            $this->table("sl_corridor")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('sl_corridor')->hasColumn('modified_at')) ***REMOVED***
            $this->table("sl_corridor")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('sl_corridor')->hasColumn('archived_at')) ***REMOVED***
            $this->table("sl_corridor")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('sl_corridor')->hasColumn('archived_by')) ***REMOVED***
            $this->table("sl_corridor")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("sl_location");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('sl_location')->hasColumn('created_at')) ***REMOVED***
            $this->table("sl_location")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('sl_location')->hasColumn('modified_at')) ***REMOVED***
            $this->table("sl_location")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('sl_location')->hasColumn('archived_at')) ***REMOVED***
            $this->table("sl_location")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('sl_location')->hasColumn('archived_by')) ***REMOVED***
            $this->table("sl_location")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("sl_room");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('sl_room')->hasColumn('created_at')) ***REMOVED***
            $this->table("sl_room")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('sl_room')->hasColumn('modified_at')) ***REMOVED***
            $this->table("sl_room")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('sl_room')->hasColumn('archived_at')) ***REMOVED***
            $this->table("sl_room")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('sl_room')->hasColumn('archived_by')) ***REMOVED***
            $this->table("sl_room")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("sl_shelf");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('sl_shelf')->hasColumn('created_at')) ***REMOVED***
            $this->table("sl_shelf")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('sl_shelf')->hasColumn('modified_at')) ***REMOVED***
            $this->table("sl_shelf")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('sl_shelf')->hasColumn('archived_at')) ***REMOVED***
            $this->table("sl_shelf")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('sl_shelf')->hasColumn('archived_by')) ***REMOVED***
            $this->table("sl_shelf")->removeColumn('archived_by')->update();
    ***REMOVED***
        $table = $this->table("sl_tray");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('sl_tray')->hasColumn('created_at')) ***REMOVED***
            $this->table("sl_tray")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('sl_tray')->hasColumn('modified_at')) ***REMOVED***
            $this->table("sl_tray")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('sl_tray')->hasColumn('archived_at')) ***REMOVED***
            $this->table("sl_tray")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('sl_tray')->hasColumn('archived_by')) ***REMOVED***
            $this->table("sl_tray")->removeColumn('archived_by')->update();
    ***REMOVED***
        $this->table("storage_place")->changeColumn('sl_location_id', 'integer', ['null' => false, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'id'])->update();
        $this->table("storage_place")->changeColumn('sl_room_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'sl_location_id'])->update();
        $this->table("storage_place")->changeColumn('sl_corridor_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'sl_room_id'])->update();
        $this->table("storage_place")->changeColumn('sl_shelf_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'sl_corridor_id'])->update();
        $this->table("storage_place")->changeColumn('sl_tray_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'sl_shelf_id'])->update();
        $this->table("storage_place")->changeColumn('sl_chest_id', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'sl_tray_id'])->update();
        $this->table("storage_place")->changeColumn('name', 'string', ['null' => false, 'limit' => 255, 'collation' => "utf8_general_ci", 'encoding' => "utf8", 'after' => 'sl_chest_id'])->update();
        $table = $this->table("storage_place");
        $table->addColumn('created', 'datetime', ['null' => true, 'after' => 'name'])->update();
        $this->table("storage_place")->changeColumn('created_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'created'])->update();
        $table->addColumn('modified', 'datetime', ['null' => true, 'after' => 'created_by'])->update();
        $this->table("storage_place")->changeColumn('modified_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'modified'])->update();
        $table->addColumn('deleted', 'integer', ['null' => false, 'default' => '0', 'limit' => MysqlAdapter::INT_TINY, 'precision' => 3, 'after' => 'modified_by'])->update();
        $table->addColumn('deleted_at', 'datetime', ['null' => true, 'after' => 'deleted'])->update();
        $table->addColumn('deleted_by', 'integer', ['null' => true, 'limit' => MysqlAdapter::INT_REGULAR, 'precision' => 10, 'after' => 'deleted_at'])->update();
        $table->save();
        if($this->table('storage_place')->hasColumn('department_id')) ***REMOVED***
            $this->table("storage_place")->removeColumn('department_id')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('created_at')) ***REMOVED***
            $this->table("storage_place")->removeColumn('created_at')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('modified_at')) ***REMOVED***
            $this->table("storage_place")->removeColumn('modified_at')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('archived_at')) ***REMOVED***
            $this->table("storage_place")->removeColumn('archived_at')->update();
    ***REMOVED***
        if($this->table('storage_place')->hasColumn('archived_by')) ***REMOVED***
            $this->table("storage_place")->removeColumn('archived_by')->update();
    ***REMOVED***
        $this->table("article")->removeIndexByName('fk_article_department_id');
        $this->table("department_event")->removeIndexByName('fk_department_has_event_department_group1');
        $table = $this->table("department_group", ['engine' => "InnoDB", 'encoding' => "utf8", 'collation' => "utf8_general_ci", 'comment' => "epart"]);
        $table->save();
        $this->table("educational_course_participant")->removeIndexByName('fk_educational_course_participation_status_id1');
        $this->table("event_participant")->removeIndexByName('fk_event_participant_participation_status_id1');
        $this->table("language")->removeIndexByName('PRIMARY');
        $this->dropTable("language");
        $this->table("participation_status")->removeIndexByName('PRIMARY');
        $this->dropTable("participation_status");
        $this->table("position")->removeIndexByName('PRIMARY');
        $this->dropTable("position");
        $this->table("storage_place")->removeIndexByName('fk_storage_place_department_id');
        $this->table("user")->removeIndexByName('PRIMARY');
        $this->table("user")->removeIndexByName('fk_user_department1_idx');
        $this->table("user")->removeIndexByName('fk_user_position1_idx');
        $this->table("user")->removeIndexByName('fk_user_language1_idx');
        $this->table("user")->removeIndexByName('fk_user_gender1_idx');
        $this->table("user")->removeIndexByName('fk_user_city1_idx');
        $this->table("user")->removeIndexByName('fk_user_permission1');
        $this->dropTable("user");
***REMOVED***
***REMOVED***
