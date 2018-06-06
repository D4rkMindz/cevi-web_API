<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 18.12.2017
 * Time: 22:46
 */

namespace App\Test;


use App\Service\Mail\MailToken;

class TestDatabase
***REMOVED***
    public function all()
    ***REMOVED***
        return [
            'article' => $this->article(),
            'article_description' => $this->article_description(),
            'article_quality' => $this->article_quality(),
            'article_title' => $this->article_title(),
            'city' => $this->city(3),
            'department' => $this->department(),
            'department_group' => $this->department_group(),
            'department_region' => $this->department_region(),
            'department_type' => $this->department_type(),
            'educational_course' => $this->educational_course(),
            'educational_course_description' => $this->educational_course_description(),
            'educational_course_image' => $this->educational_course(),
            'educational_course_organiser' => $this->educational_course(),
            'educational_course_participant' => $this->educational_course_participant(),
            'educational_course_title' => $this->educational_course_title(),
            'email_token' => $this->email_token(),
            'event' => $this->event(),
            'event_description' => $this->event_description(),
            'event_title' => $this->event_title(),
            'event_participant' => $this->event_participant(),
            'event_image' => $this->event_image(),
            'gender' => $this->gender(),
            'image' => $this->image(),
            'language' => $this->language(),
            'permission' => $this->permission(),
            'position' => $this->position(),
            'sl_chest' => $this->sl_chest(),
            'sl_corridor' => $this->sl_corridor(),
            'sl_location' => $this->sl_location(),
            'sl_room' => $this->sl_room(),
            'sl_shelf' => $this->sl_shelf(),
            'sl_tray' => $this->sl_tray(),
            'storage_place' => $this->storage_place(),
            'user' => $this->user(),
        ];
***REMOVED***

    public function events()
    ***REMOVED***
        return [
            'language' => $this->language(),
            'user' => $this->user(),
            'position' => $this->position(),
            'city' => $this->city(3),
            'permission' => $this->permission(),
            'gender' => $this->gender(),
            'department' => $this->department(),
            'department_group' => $this->department_group(),
            'department_region' => $this->department_region(),
            'department_type' => $this->department_type(),
            'event' => $this->event(),
            'event_description' => $this->event_description(),
            'event_title' => $this->event_title(),
            'event_participant' => $this->event_participant(),
            'event_image' => $this->event_image(),
            'image' => $this->image(),
        ];
***REMOVED***

    /**
     * Get User data
     *
     * @return array
     */
    public function users()
    ***REMOVED***
        return [
            'language' => $this->language(),
            'user' => $this->user(),
            'position' => $this->position(),
            'city' => $this->city(3),
            'permission' => $this->permission(),
            'gender' => $this->gender(),
            'department' => $this->department(),
            'department_group' => $this->department_group(),
            'department_region' => $this->department_region(),
            'department_type' => $this->department_type(),
        ];
***REMOVED***

    public function storage()
    ***REMOVED***
        return [
            'language' => $this->language(),
            'user' => $this->user(),
            'position' => $this->position(),
            'city' => $this->city(3),
            'permission' => $this->permission(),
            'gender' => $this->gender(),
            'department' => $this->department(),
            'department_group' => $this->department_group(),
            'department_region' => $this->department_region(),
            'department_type' => $this->department_type(),
            'storage_place' => $this->storage_place(),
            'sl_room' => $this->sl_room(),
            'sl_corridor' => $this->sl_corridor(),
            'sl_shelf' => $this->sl_shelf(),
            'sl_tray' => $this->sl_tray(),
            'sl_chest' => $this->sl_chest(),
            'sl_location' => $this->sl_location(),
        ];
***REMOVED***

    public function location()
    ***REMOVED***
        return [
            'storage_place' => $this->storage_place(),
            'sl_location' => $this->sl_location(),
            'language' => $this->language(),
            'user' => $this->user(),
            'position' => $this->position(),
            'city' => $this->city(3),
            'permission' => $this->permission(),
            'gender' => $this->gender(),
            'department' => $this->department(),
            'department_group' => $this->department_group(),
            'department_region' => $this->department_region(),
            'department_type' => $this->department_type(),
        ];
***REMOVED***

    public function sl_locations()
    ***REMOVED***
        return [
            'language' => $this->language(),
            'user' => $this->user(),
            'position' => $this->position(),
            'city' => $this->city(3),
            'permission' => $this->permission(),
            'gender' => $this->gender(),
            'department' => $this->department(),
            'department_group' => $this->department_group(),
            'department_region' => $this->department_region(),
            'department_type' => $this->department_type(),
            'storage_place' => $this->storage_place(),
            'sl_location' => $this->sl_location(),
            'sl_room' => $this->sl_room(),
            'sl_corridor' => $this->sl_corridor(),
            'sl_shelf' => $this->sl_shelf(),
            'sl_tray' => $this->sl_tray(),
            'sl_chest' => $this->sl_chest(),
        ];
***REMOVED***

    public function articles()
    ***REMOVED***
        return [
            'article' => $this->article(),
            'article_description' => $this->article_description(),
            'article_quality' => $this->article_quality(),
            'article_title' => $this->article_title(),
            'department' => $this->department(),
            'department_group' => $this->department_group(),
            'department_region' => $this->department_region(),
            'department_type' => $this->department_type(),
            'language' => $this->language(),
            'user' => $this->user(),
            'position' => $this->position(),
            'city' => $this->city(3),
            'permission' => $this->permission(),
            'gender' => $this->gender(),
            'storage_place' => $this->storage_place(),
            'sl_room' => $this->sl_room(),
            'sl_corridor' => $this->sl_corridor(),
            'sl_shelf' => $this->sl_shelf(),
            'sl_tray' => $this->sl_tray(),
            'sl_chest' => $this->sl_chest(),
            'sl_location' => $this->sl_location(),
        ];
***REMOVED***

    /**
     * Get language table data.
     * @return array
     */
    private function language()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name' => 'de_CH',
                'abbreviation' => 'de',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name' => 'en_GB',
                'abbreviation' => 'en',
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'name' => 'fr_CH',
                'abbreviation' => 'fr',
            ],
            [
                'id' => '4',
                'hash' => uniqid('test_'),
                'name' => 'it_CH',
                'abbreviation' => 'it',
            ],
        ];
***REMOVED***

    private function position()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name_de' => 'Abteilungsleiter',
                'name_en' => 'Head of department',
                'name_fr' => 'Capo dipartimento',
                'name_it' => 'Chef de département',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name_de' => 'Lagerleiter',
                'name_en' => 'Camp leader',
                'name_fr' => 'Chef de camp',
                'name_it' => 'Capo  del campeggio',
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'name_de' => 'Gruppenleiter',
                'name_en' => 'Team leader',
                'name_fr' => 'Chef d\'équipe',
                'name_it' => 'Capogruppo',
            ],
            [
                'id' => '4',
                'hash' => uniqid('test_'),
                'name_de' => 'Hilfsleiter',
                'name_en' => 'Auxiliary conductors',
                'name_fr' => 'Conducteurs auxiliaires',
                'name_it' => 'Conduttori ausiliari',
            ],
            [
                'id' => '5',
                'hash' => uniqid('test_'),
                'name_de' => 'Teilnehmer',
                'name_en' => 'Participants',
                'name_fr' => 'Participants',
                'name_it' => 'Partecipanti',
            ],
            [
                'id' => '6',
                'hash' => uniqid('test_'),
                'name_de' => 'Eltern',
                'name_en' => 'Parent',
                'name_fr' => 'Parent',
                'name_it' => 'Ragazzo',
            ],
        ];
***REMOVED***

    private function user()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'city_id' => '1',
                'language_hash' => $this->language()[0]['hash'],
                'permission_hash' => $this->language()[0]['hash'],
                'position_hash' => $this->position()[0]['hash'],
                'gender_hash' => $this->gender()[0]['hash'],
                'department_hash' => $this->department()[0]['hash'],
                'first_name' => 'Max',
                'email' => 'max.mustermann@example.com',
                'username' => 'max',
                'cevi_name' => 'asöfd',
                'signup_completed' => true,
                'js_certificate' => true,
                'last_name' => 'Mustermann',
                'address' => 'Examplehausenerstrasse 1',
                'password' => password_hash('mäxle1', PASSWORD_BCRYPT),
                'birthdate' => '1998-06-05',
                'phone' => '012 345 67 89',
                'mobile' => '076 123 45 67',
                'js_certificate_until' => '2019',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '0',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'city_id' => '2',
                'language_hash' => $this->language()[1]['hash'],
                'permission_hash' => $this->language()[1]['hash'],
                'position_hash' => $this->position()[0]['hash'],
                'gender_hash' => $this->gender()[1]['hash'],
                'department_hash' => $this->department()[0]['hash'],
                'first_name' => 'Maxine',
                'email' => 'maxine.mustermann@example.com',
                'username' => 'maxine',
                'password' => password_hash('maxine1', PASSWORD_BCRYPT),
                'signup_completed' => true,
                'js_certificate' => true,
                'last_name' => 'Mustermann',
                'address' => 'Examplehausenerstrasse 2',
                'cevi_name' => 'Maus',
                'birthdate' => '1998-06-05',
                'phone' => '012 355 67 89',
                'mobile' => '076 523 45 67',
                'js_certificate_until' => '2019',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '0',
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'city_id' => '3',
                'language_hash' => $this->language()[0]['hash'],
                'permission_hash' => $this->language()[2]['hash'],
                'position_hash' => $this->position()[2]['hash'],
                'gender_hash' => $this->gender()[1]['hash'],
                'department_hash' => $this->department()[0]['hash'],
                'first_name' => 'Maxinea',
                'email' => 'maxine.mustermann@example.com',
                'username' => 'maxinea',
                'password' => password_hash('maxines1', PASSWORD_BCRYPT),
                'signup_completed' => true,
                'js_certificate' => true,
                'last_name' => 'Mustermann',
                'address' => 'Examplehausenerstrasse 3',
                'cevi_name' => 'Maus',
                'birthdate' => '1998-06-05',
                'phone' => '013 345 67 89',
                'mobile' => '073 133 45 67',
                'js_certificate_until' => '2017',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '0',
            ],
        ];
***REMOVED***

    private function article()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'article_title_id' => '1',
                'article_description_id' => '1',
                'article_quality_hash' => $this->article_quality()[0]['hash'],
                'storage_place_hash' => $this->storage_place()[0]['hash'],
                'department_hash' => $this->department()[0]['hash'],
                'date' => '2019-01-01 0:00:00',
                'quantity' => '10',
                'replace' => '2018-03-01 00:00:00',
                'barcode' => 'CEVIWEB-A1_L1_D1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'article_title_id' => '2',
                'article_description_id' => '2',
                'article_quality_hash' => $this->article_quality()[1]['hash'],
                'storage_place_hash' => $this->storage_place()[1]['hash'],
                'department_hash' => $this->department()[1]['hash'],
                'date' => '2017-01-01 0:00:00',
                'quantity' => '10',
                'replace' => '2018-12-01 00:00:00',
                'barcode' => 'CEVIWEB-A2_L2_D2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'article_title_id' => '3',
                'article_description_id' => '3',
                'article_quality_hash' => $this->article_quality()[2]['hash'],
                'storage_place_hash' => $this->storage_place()[2]['hash'],
                'department_hash' => $this->department()[2]['hash'],
                'date' => '2017-01-01 0:00:00',
                'quantity' => '10',
                'replace' => '2018-12-01 00:00:00',
                'barcode' => 'CEVIWEB-A3_L3_D3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
***REMOVED***

    private function article_title()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name_de' => 'Artikel 1',
                'name_en' => 'Artikel 1',
                'name_fr' => 'Artikel 1',
                'name_it' => 'Artikel 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'name_de' => 'Artikel 2',
                'name_en' => 'Artikel 2',
                'name_fr' => 'Artikel 2',
                'name_it' => 'Artikel 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'name_de' => 'Artikel 3',
                'name_en' => 'Artikel 3',
                'name_fr' => 'Artikel 3',
                'name_it' => 'Artikel 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
***REMOVED***

    private function article_description()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name_de' => 'Beschreibung 1',
                'name_en' => 'Beschreibung 1',
                'name_fr' => 'Beschreibung 1',
                'name_it' => 'Beschreibung 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'name_de' => 'Beschreibung 2',
                'name_en' => 'Beschreibung 2',
                'name_fr' => 'Beschreibung 2',
                'name_it' => 'Beschreibung 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'name_de' => 'Beschreibung 3',
                'name_en' => 'Beschreibung 3',
                'name_fr' => 'Beschreibung 3',
                'name_it' => 'Beschreibung 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
***REMOVED***

    private function article_quality()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'level' => '1',
                'name_de' => 'Sehr gut',
                'name_en' => 'Sehr gut',
                'name_fr' => 'Sehr gut',
                'name_it' => 'Sehr gut',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'level' => '2',
                'name_de' => 'Gut',
                'name_en' => 'Gut',
                'name_fr' => 'Gut',
                'name_it' => 'Gut',
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'level' => '3',
                'name_de' => 'Mittel',
                'name_en' => 'Mittel',
                'name_fr' => 'Mittel',
                'name_it' => 'Mittel',
            ],
            [
                'id' => '4',
                'hash' => uniqid('test_'),
                'level' => '4',
                'name_de' => 'Bald ersetzen',
                'name_en' => 'Bald ersetzen',
                'name_fr' => 'Bald ersetzen',
                'name_it' => 'Bald ersetzen',
            ],
            [
                'id' => '5',
                'hash' => uniqid('test_'),
                'level' => '5',
                'name_de' => 'Ersetzen',
                'name_en' => 'Ersetzen',
                'name_fr' => 'Ersetzen',
                'name_it' => 'Ersetzen',
            ],
            [
                'id' => '6',
                'hash' => uniqid('test_'),
                'level' => '6',
                'name_de' => 'Kaputt',
                'name_en' => 'Kaputt',
                'name_fr' => 'Kaputt',
                'name_it' => 'Kaputt',
            ],
        ];
***REMOVED***

    private function participation_status()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name_de' => 'Zugesagt',
                'name_en' => 'Participated',
                'name_fr' => 'Participaté',
                'name_it' => 'Participatés',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name_de' => 'Abgesagt',
                'name_en' => 'Departicipated',
                'name_fr' => 'Departicipaté',
                'name_it' => 'Departicipatés',
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'name_de' => 'Vielleicht',
                'name_en' => 'Probably',
                'name_fr' => 'Peutetre',
                'name_it' => 'Peutetros',
            ],
        ];
***REMOVED***

    private function department_event()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'department_hash' => $this->department()[0]['hash'],
                'event_hash' => $this->event()[0]['hash'],
                'department_group_hash' => $this->department_group()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'department_hash' => $this->department()[1]['hash'],
                'event_hash' => $this->event()[1]['hash'],
                'department_group_hash' => $this->department_group()[1]['hash'],
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'department_hash' => $this->department()[2]['hash'],
                'event_hash' => $this->event()[2]['hash'],
                'department_group_hash' => $this->department_group()[1]['hash'],
            ],
        ];
***REMOVED***

    private function educational_course()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'educational_course_title_id' => '1',
                'educational_course_description_id' => '1',
                'educational_course_organiser_hash' => $this->educational_course_organiser()[0]['hash'],
                'department_hash' => $this->department()[0]['hash'],
                'city_id' => '1',
                'position_hash' => $this->position()[0]['hash'],
                'price' => '100,00',
                'start_date' => '2018-04-07 10:00:00',
                'end_date' => '2018-04-14 16:00:00',
                'minimum_age' => '16',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[0]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'educational_course_title_id' => '2',
                'educational_course_description_id' => '2',
                'educational_course_organiser_hash' => $this->educational_course_organiser()[1]['hash'],
                'department_hash' => $this->department()[1]['hash'],
                'city_id' => '2',
                'position_hash' => $this->position()[1]['hash'],
                'price' => '120,00',
                'start_date' => '2018-04-07 10:00:00',
                'end_date' => '2018-04-14 16:00:00',
                'minimum_age' => '16',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[0]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'educational_course_title_id' => '3',
                'educational_course_description_id' => '3',
                'educational_course_organiser_hash' => $this->educational_course_organiser()[2]['hash'],
                'department_hash' => $this->department()[2]['hash'],
                'city_id' => '3',
                'position_hash' => $this->position()[1]['hash'],
                'price' => '350,00',
                'start_date' => '2018-04-07 10:00:00',
                'end_date' => '2018-04-14 16:00:00',
                'minimum_age' => '16',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => '2018-04-07 09:00:00',
                'archived_by' => '1',
            ],
        ];
***REMOVED***

    private function educational_course_organiser()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'user_hash' => $this->user()[0]['hash'],
                'phone' => '061 456 12 78',
                'email' => 'contact@llm.ch',
                'notes' => 'Ist auf Milch allergisch',
                'mobile' => '079 456 12 79',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'user_hash' => $this->user()[1]['hash'],
                'phone' => '061 457 12 78',
                'email' => 'contact@glk.ch',
                'notes' => 'Ist auf Kühe allergisch',
                'mobile' => '079 456 12 78',
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'user_hash' => $this->user()[2]['hash'],
                'phone' => '061 357 12 78',
                'email' => 'contact@heku.ch',
                'notes' => 'Ist auf Dummheit allergisch',
                'mobile' => '079 456 12 99',
            ],
        ];
***REMOVED***

    private function educational_course_participant()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'educational_course_hash' =>$this->educational_course()[0]['hash'],
                'user_hash' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'educational_course_hash' =>$this->educational_course()[0]['hash'],
                'user_hash' => $this->user()[1]['hash'],
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'educational_course_hash' =>$this->educational_course()[1]['hash'],
                'user_hash' => $this->user()[2]['hash'],
            ],
        ];
***REMOVED***

    private function educational_course_description()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name_de' => 'GLK',
                'name_en' => 'GLK',
                'name_fr' => 'GLK',
                'name_it' => 'GLK',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'name_de' => 'LLM',
                'name_en' => 'LLM',
                'name_fr' => 'LLM',
                'name_it' => 'LLM',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => '2018-04-07 09:00:00',
                'archived_by' => '1',
            ],
            [
                'id' => '3',
                'name_de' => 'HEKU',
                'name_en' => 'HEKU',
                'name_fr' => 'HEKU',
                'name_it' => 'HEKU',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
        ];
***REMOVED***

    private function educational_course_title()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name_de' => 'GLK',
                'name_en' => 'GLK',
                'name_fr' => 'GLK',
                'name_it' => 'GLK',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'name_de' => 'LLM',
                'name_en' => 'LLM',
                'name_fr' => 'LLM',
                'name_it' => 'LLM',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => '2018-04-07 09:00:00',
                'archived_by' => '1',
            ],
            [
                'id' => '3',
                'name_de' => 'HEKU',
                'name_en' => 'HEKU',
                'name_fr' => 'HEKU',
                'name_it' => 'HEKU',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
        ];
***REMOVED***

    private function email_token()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'user_hash' => $this->user()[0]['hash'],
                'token' => MailToken::generate(),
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'user_hash' => $this->user()[1]['hash'],
                'token' => MailToken::generate(),
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'user_hash' => $this->user()[2]['hash'],
                'token' => MailToken::generate(),
            ],
        ];
***REMOVED***

    private function event()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'event_title_id' => '1',
                'event_description_id' => '1',
                'price' => '123,00',
                'start' => '2018-07-05 10:00:00',
                'end' => '2018-07-12 16:00:00',
                'start_leader' => '2018-07-05 08:00:00',
                'end_leader' => '2018-07-12 18:00:00',
                'public' => '1',
                'publicize_at' => '2018-02-01 10:00:00',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'event_title_id' => '2',
                'event_description_id' => '2',
                'price' => '150,50',
                'start' => '2018-07-05 10:00:00',
                'end' => '2018-07-12 16:00:00',
                'start_leader' => '2018-07-05 08:00:00',
                'end_leader' => '2018-07-12 18:00:00',
                'public' => '1',
                'publicize_at' => '2018-02-01 10:00:00',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'event_title_id' => '3',
                'event_description_id' => '3',
                'price' => '300,00',
                'start' => '2018-07-05 10:00:00',
                'end' => '2018-07-12 16:00:00',
                'start_leader' => '2018-07-05 08:00:00',
                'end_leader' => '2018-07-12 18:00:00',
                'public' => '0',
                'publicize_at' => '2018-02-01 10:00:00',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[0]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
        ];
***REMOVED***

    private function event_description()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name_de' => 'Beschreibung des Events',
                'name_en' => 'Description of the event',
                'name_fr' => 'Description de l\'event',
                'name_it' => 'Descriptione della evente',
            ],
            [
                'id' => '2',
                'name_de' => 'Beschreibung des Events 2',
                'name_en' => 'Description of the event 2',
                'name_fr' => 'Description de l\'event 2',
                'name_it' => 'Descriptione della evente 2',
            ],
            [
                'id' => '3',
                'name_de' => 'Beschreibung des Events 3',
                'name_en' => 'Description of the event 3',
                'name_fr' => 'Description de l\'event 3',
                'name_it' => 'Descriptione della evente 3',
            ],
        ];
***REMOVED***

    private function event_participant()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'user_hash' => $this->user()[0]['hash'],
                'event_hash' => $this->event()[0]['hash'],
                'participation_status_hash' => $this->participation_status()[0]['hash'],
                'publicize_at' => '2018-02-01 10:00:00',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[0]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'user_hash' => $this->user()[1]['hash'],
                'event_hash' => $this->event()[1]['hash'],
                'participation_status_hash' => $this->participation_status()[0]['hash'],
                'publicize_at' => '2018-02-01 10:00:00',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[0]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'user_hash' => $this->user()[2]['hash'],
                'event_hash' => $this->event()[2]['hash'],
                'participation_status_hash' => $this->participation_status()[0]['hash'],
                'publicize_at' => '2018-02-01 10:00:00',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[0]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => '2018-02-01 10:00:00',
                'archived_by' => '2',
            ],
        ];
***REMOVED***

    private function event_title()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name_de' => 'GLK',
                'name_en' => 'GLK',
                'name_fr' => 'GLK',
                'name_it' => 'GLK',
                'created_at' => '2017-01-01 00:00:10',
                'created_by' => $this->user()[0]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name_de' => 'LLM',
                'name_en' => 'LLM',
                'name_fr' => 'LLM',
                'name_it' => 'LLM',
                'created_at' => '2017-01-01 00:00:10',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'name_de' => 'HEKU',
                'name_en' => 'HEKU',
                'name_fr' => 'HEKU',
                'name_it' => 'HEKU',
                'created_at' => '2017-01-01 00:00:10',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => '2017-12-01 00:00:00',
                'modified_by' => '2',
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '4',
                'hash' => uniqid('test_'),
                'name_de' => 'HEKU',
                'name_en' => 'HEKU',
                'name_fr' => 'HEKU',
                'name_it' => 'HEKU',
                'created_at' => '2017-01-01 00:00:10',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => '2018-01-01 00:00:12',
                'archived_by' => '1',
            ],
        ];
***REMOVED***

    private function event_image()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'image_hash' => $this->image()[0]['hash'],
                'event_hash' => $this->event()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'image_hash' => $this->image()[1]['hash'],
                'event_hash' => $this->event()[1]['hash'],
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'image_hash' => $this->image()[2]['hash'],
                'event_hash' => $this->event()[2]['hash'],
            ],
        ];
***REMOVED***

    private function city(int $count = 1)
    ***REMOVED***
        $result = [];
        $cities = [
            ['name' => 'Möhlin', 'number' => '4313', 'state' => 'AG'],
            ['name' => 'Rheinfelden', 'number' => '4310', 'state' => 'AG'],
            ['name' => 'Basel', 'number' => '4050', 'state' => 'BS'],
            ['name' => 'Kaiseraugst', 'number' => '4303', 'state' => 'AG'],
            ['name' => 'Brugg', 'number' => '5200', 'state' => 'AG'],
            ['name' => 'Aarau', 'number' => '5000', 'state' => 'AG'],
            ['name' => 'Oberentfelden', 'number' => '5036', 'state' => 'AG'],
            ['name' => 'Schöftland', 'number' => '5040', 'state' => 'AG'],
            ['name' => 'Zürich', 'number' => '8000', 'state' => 'DE'],
            ['name' => 'Affoltern', 'number' => '8909', 'state' => 'ZH'],
            ['name' => 'Baden', 'number' => '5400', 'state' => 'AG'],
            ['name' => 'Kaiserstuhl', 'number' => '5466', 'state' => 'AG'],
        ];
        for ($i = 0; $i < $count; $i++) ***REMOVED***
            $city = $cities[rand(0, 11)];
            $result[] = [
                'id' => $i + 1,
                'country' => 'CH',
                'state' => $city['state'],
                'number' => $city['number'],
                'number2' => '01',
                'title_de' => $city['name'],
                'title_en' => $city['name'],
                'title_fr' => $city['name'],
                'title_it' => $city['name'],
            ];
    ***REMOVED***
        return $result;
***REMOVED***

    private function department()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'department_group_hash' => $this->department_group()[0]['hash'],
                'department_type_hash' => $this->department_type()[0]['hash'],
                'city_id' => '1',
                'name' => 'Department 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '0',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'department_group_hash' => $this->department_group()[1]['hash'],
                'department_type_hash' => $this->department_type()[1]['hash'],
                'city_id' => '2',
                'name' => 'Department 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '0',
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'department_group_hash' => $this->department_group()[1]['hash'],
                'department_type_hash' => $this->department_type()[0]['hash'],
                'city_id' => '3',
                'name' => 'Department 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '0',
            ],
            [
                'id' => '4',
                'hash' => uniqid('test_'),
                'department_group_hash' => $this->department_group()[1]['hash'],
                'department_type_hash' => $this->department_type()[0]['hash'],
                'city_id' => '3',
                'name' => 'Department 4',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '0',
            ],
        ];
***REMOVED***

    private function department_group()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name_de' => 'AG-SO-LU-ZG',
                'name_en' => 'AG-SO-LU-ZG',
                'name_fr' => 'AG-SO-LU-ZG',
                'name_it' => 'AG-SO-LU-ZG',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name_de' => 'Basel',
                'name_en' => 'Basel',
                'name_fr' => 'Basel',
                'name_it' => 'Basel',
            ],
        ];
***REMOVED***

    private function department_region()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name_de' => 'Nord',
                'name_en' => 'Nord',
                'name_fr' => 'Nord',
                'name_it' => 'Nord',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name_de' => 'Süd',
                'name_en' => 'Süd',
                'name_fr' => 'Süd',
                'name_it' => 'Süd',
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'name_de' => 'Ost',
                'name_en' => 'Ost',
                'name_fr' => 'Ost',
                'name_it' => 'Ost',
            ],
            [
                'id' => '4',
                'hash' => uniqid('test_'),
                'name_de' => 'West',
                'name_en' => 'West',
                'name_fr' => 'West',
                'name_it' => 'West',
            ],
        ];
***REMOVED***

    private function department_type()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name_de' => 'Verband',
                'name_en' => 'Verband',
                'name_fr' => 'Verband',
                'name_it' => 'Verband',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name_de' => 'Tensing',
                'name_en' => 'Tensing',
                'name_fr' => 'Tensing',
                'name_it' => 'Tensing',
            ],
        ];
***REMOVED***

    private function gender()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name_de' => 'Mann',
                'name_en' => 'Men',
                'name_fr' => 'Homme',
                'name_it' => 'Uomo',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name_de' => 'Frau',
                'name_en' => 'Miss',
                'name_fr' => 'Madame',
                'name_it' => 'Signora',
            ],
        ];
***REMOVED***

    private function image()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'url' => baseurl('/img/events/image-url-1.jpg'),
                'type' => 'jpg',
                'created_at' => '2017-01-01 10:00:00',
                'created_by' => $this->user()[0]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'url' => baseurl('/img/events/image-url-2.jpg'),
                'type' => 'jpg',
                'created_at' => '2017-01-01 10:00:00',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'url' => baseurl('/img/events/image-url-3.jpg'),
                'type' => 'jpg',
                'created_at' => '2017-01-01 10:00:00',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => '2017-01-01 11:00:00',
                'archived_by' => '1',
            ],
        ];
***REMOVED***

    private function permission()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'level' => '64',
                'name' => 'archive',
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'level' => '32',
                'name' => 'modify',
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'level' => '16',
                'name' => 'insert',
            ],
            [
                'id' => '4',
                'hash' => uniqid('test_'),
                'level' => '8',
                'name' => 'read',
            ],
        ];
***REMOVED***

    private function sl_chest()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name' => 'Kiste 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name' => 'Kiste 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'name' => 'Kiste 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ]
        ];
***REMOVED***

    private function sl_corridor()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name' => 'Korridor 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name' => 'Korridor 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'name' => 'Korridor 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ]
        ];
***REMOVED***

    private function sl_location()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name' => 'Ort 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name' => 'Ort 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'name' => 'Ort 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
***REMOVED***

    private function sl_room()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name' => 'Raum 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name' => 'Raum 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'name' => 'Raum 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
***REMOVED***

    private function sl_shelf()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name' => 'Regal 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name' => 'Regal 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'name' => 'Regal 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
***REMOVED***

    private function sl_tray()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'name' => 'Tablar 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'name' => 'Tablar 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'name' => 'Tablar 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
***REMOVED***

    private function storage_place()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'hash' => uniqid('test_'),
                'sl_location_hash' => $this->sl_location()[0]['hash'],
                'sl_room_hash' => $this->sl_room()[0]['hash'],
                'sl_corridor_hash' => $this->sl_corridor()[0]['hash'],
                'sl_shelf_hash' => $this->sl_shelf()[0]['hash'],
                'sl_tray_hash' => $this->sl_tray()[0]['hash'],
                'sl_chest_hash' => $this->sl_chest()[0]['hash'],
                'department_hash' => $this->department()[0]['hash'],
                'name' => 'Platz 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'hash' => uniqid('test_'),
                'sl_location_hash' => $this->sl_location()[1]['hash'],
                'sl_room_hash' => $this->sl_room()[1]['hash'],
                'sl_corridor_hash' => $this->sl_corridor()[1]['hash'],
                'sl_shelf_hash' => $this->sl_shelf()[1]['hash'],
                'sl_tray_hash' => $this->sl_tray()[1]['hash'],
                'sl_chest_hash' => $this->sl_chest()[1]['hash'],
                'department_hash' => $this->department()[0]['hash'],
                'name' => 'Platz 2',
                'created_at' => '2027-02-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '3',
                'hash' => uniqid('test_'),
                'sl_location_hash' => $this->sl_location()[0]['hash'],
                'sl_room_hash' => $this->sl_room()[0]['hash'],
                'sl_corridor_hash' => $this->sl_corridor()[0]['hash'],
                'sl_shelf_hash' => $this->sl_shelf()[0]['hash'],
                'sl_tray_hash' => $this->sl_tray()[0]['hash'],
                'sl_chest_hash' => $this->sl_chest()[0]['hash'],
                'department_hash' => $this->department()[0]['hash'],
                'name' => 'Platz 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '4',
                'hash' => uniqid('test_'),
                'sl_location_hash' => $this->sl_location()[0]['hash'],
                'sl_room_hash' => $this->sl_room()[1]['hash'],
                'sl_corridor_hash' => $this->sl_corridor()[1]['hash'],
                'sl_shelf_hash' => $this->sl_shelf()[1]['hash'],
                'sl_tray_hash' => $this->sl_tray()[0]['hash'],
                'sl_chest_hash' => $this->sl_chest()[0]['hash'],
                'department_hash' => $this->department()[1]['hash'],
                'name' => 'Platz 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
                'archived_at' => '2017-12-30 00:00:00',
                'archived_by' => $this->user()[0]['hash'],
            ],
        ];
***REMOVED***
***REMOVED***
