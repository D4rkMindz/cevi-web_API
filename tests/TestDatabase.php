<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 18.12.2017
 * Time: 22:46
 */

namespace App\Test;


class TestDatabase
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

    /**
     * Get language table data.
     * @return array
     */
    private function language()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name' => 'de_CH',
                'abbreviation' => 'de',
            ],
            [
                'id' => '2',
                'name' => 'en_GB',
                'abbreviation' => 'en',
            ],
            [
                'id' => '3',
                'name' => 'fr_CH',
                'abbreviation' => 'fr',
            ],
            [
                'id' => '4',
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
                'name_de' => 'Abteilungsleiter',
                'name_en' => 'Head of department',
                'name_fr' => 'Capo dipartimento',
                'name_it' => 'Chef de département',
            ],
            [
                'id' => '2',
                'name_de' => 'Lagerleiter',
                'name_en' => 'Camp leader',
                'name_fr' => 'Chef de camp',
                'name_it' => 'Capo  del campeggio',
            ],
            [
                'id' => '3',
                'name_de' => 'Gruppenleiter',
                'name_en' => 'Team leader',
                'name_fr' => 'Chef d\'équipe',
                'name_it' => 'Capogruppo',
            ],
            [
                'id' => '4',
                'name_de' => 'Hilfsleiter',
                'name_en' => 'Auxiliary conductors',
                'name_fr' => 'Conducteurs auxiliaires',
                'name_it' => 'Conduttori ausiliari',
            ],
            [
                'id' => '5',
                'name_de' => 'Teilnehmer',
                'name_en' => 'Participants',
                'name_fr' => 'Participants',
                'name_it' => 'Partecipanti',
            ],
            [
                'id' => '6',
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
                'city_id' => '1',
                'language_id' => '1',
                'permission_id' => '1',
                'position_id' => '1',
                'gender_id' => '1',
                'department_id' => '1',
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
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'city_id' => '2',
                'language_id' => '2',
                'permission_id' => '2',
                'position_id' => '1',
                'gender_id' => '2',
                'department_id' => '1',
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
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'city_id' => '3',
                'department_id' => '1',
                'language_id' => '3',
                'permission_id' => '3',
                'position_id' => '1',
                'gender_id' => '2',
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
                'created_by' => '1',
            ],
        ];
***REMOVED***

    private function article()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'article_title' => '1',
                'article_description_id' => '1',
                'article_quality_id' => '1',
                'storage_place_id' => '1',
                'department_id' => '1',
                'date' => '2019-01-01 0:00:00',
                'quantity' => '10',
                'replace' => '2018-03-01 00:00:00',
                'barcode' => 'CEVIWEB-A1_L1_D1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'article_title' => '2',
                'article_description_id' => '2',
                'article_quality_id' => '2',
                'storage_place_id' => '2',
                'department_id' => '2',
                'date' => '2017-01-01 0:00:00',
                'quantity' => '10',
                'replace' => '2018-12-01 00:00:00',
                'barcode' => 'CEVIWEB-A2_L2_D2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'article_title' => '3',
                'article_description_id' => '3',
                'article_quality_id' => '3',
                'storage_place_id' => '3',
                'department_id' => '3',
                'date' => '2017-01-01 0:00:00',
                'quantity' => '10',
                'replace' => '2018-12-01 00:00:00',
                'barcode' => 'CEVIWEB-A3_L3_D3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
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
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name_de' => 'Artikel 2',
                'name_en' => 'Artikel 2',
                'name_fr' => 'Artikel 2',
                'name_it' => 'Artikel 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name_de' => 'Artikel 3',
                'name_en' => 'Artikel 3',
                'name_fr' => 'Artikel 3',
                'name_it' => 'Artikel 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
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
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name_de' => 'Beschreibung 2',
                'name_en' => 'Beschreibung 2',
                'name_fr' => 'Beschreibung 2',
                'name_it' => 'Beschreibung 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name_de' => 'Beschreibung 3',
                'name_en' => 'Beschreibung 3',
                'name_fr' => 'Beschreibung 3',
                'name_it' => 'Beschreibung 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
        ];
***REMOVED***

    private function article_quality()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'level' => '1',
                'name' => 'Sehr gut',
            ],
            [
                'id' => '2',
                'level' => '2',
                'name' => 'Gut',
            ],
            [
                'id' => '3',
                'level' => '3',
                'name' => 'Mittel',
            ],
            [
                'id' => '4',
                'level' => '4',
                'name' => 'Bald ersetzen',
            ],
            [
                'id' => '5',
                'level' => '5',
                'name' => 'Ersetzen',
            ],
            [
                'id' => '6',
                'level' => '6',
                'name' => 'Kaputt',
            ],
        ];
***REMOVED***

    private function participation_status()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name_de' => 'Zugesagt',
                'name_en' => 'Participated',
                'name_fr' => 'Participaté',
                'name_it' => 'Participatés',
            ],
            [
                'id' => '2',
                'name_de' => 'Abgesagt',
                'name_en' => 'Departicipated',
                'name_fr' => 'Departicipaté',
                'name_it' => 'Departicipatés',
            ],
            [
                'id' => '3',
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
                'department_id' => '1',
                'event_id' => '1',
                'department_group_id' => '1',
            ],
            [
                'id' => '2',
                'department_id' => '2',
                'event_id' => '2',
                'department_group_id' => '2',
            ],
            [
                'id' => '3',
                'department_id' => '3',
                'event_id' => '3',
                'department_group_id' => '1',
            ],
        ];
***REMOVED***

    private function educational_course()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'educational_course_title_id' => '1',
                'educational_course_description_id' => '1',
                'educational_course_organiser_id' => '1',
                'department_id' => '1',
                'city_id' => '1',
                'position_id' => '1',
                'price' => '100,00',
                'start_date' => '2018-04-07 10:00:00',
                'end_date' => '2018-04-14 16:00:00',
                'minimum_age' => '16',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => '1',
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'educational_course_title_id' => '2',
                'educational_course_description_id' => '2',
                'educational_course_organiser_id' => '2',
                'department_id' => '2',
                'city_id' => '2',
                'position_id' => '2',
                'price' => '120,00',
                'start_date' => '2018-04-07 10:00:00',
                'end_date' => '2018-04-14 16:00:00',
                'minimum_age' => '16',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => '1',
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '3',
                'educational_course_title_id' => '3',
                'educational_course_description_id' => '3',
                'educational_course_organiser_id' => '3',
                'department_id' => '3',
                'city_id' => '3',
                'position_id' => '2',
                'price' => '350,00',
                'start_date' => '2018-04-07 10:00:00',
                'end_date' => '2018-04-14 16:00:00',
                'minimum_age' => '16',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => '2',
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
                'user_id' => '1',
                'phone' => '061 456 12 78',
                'email' => 'contact@llm.ch',
                'notes' => 'Ist auf Milch allergisch',
                'mobile' => '079 456 12 79',
            ],
            [
                'id' => '2',
                'user_id' => '2',
                'phone' => '061 457 12 78',
                'email' => 'contact@glk.ch',
                'notes' => 'Ist auf Kühe allergisch',
                'mobile' => '079 456 12 78',
            ],
            [
                'id' => '3',
                'user_id' => '3',
                'phone' => '061 357 12 78',
                'email' => 'contact@heku.ch',
                'notes' => 'Ist auf Dummheit allergisch',
                'mobile' => '079 456 12 99',
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
                'created_by' => '2',
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
                'created_by' => '2',
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
                'created_by' => '2',
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
                'created_by' => '2',
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
                'created_by' => '2',
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
                'created_by' => '2',
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
        ];
***REMOVED***

    private function event()
    ***REMOVED***
        return [
            [
                'id' => '1',
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
                'created_by' => '2',
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
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
                'created_by' => '2',
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '3',
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
                'created_by' => '1',
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
                'user_id' => '1',
                'event_id' => '1',
                'participation_status_id' => '1',
                'publicize_at' => '2018-02-01 10:00:00',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => '1',
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'user_id' => '2',
                'event_id' => '2',
                'participation_status_id' => '1',
                'publicize_at' => '2018-02-01 10:00:00',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => '1',
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'user_id' => '2',
                'event_id' => '2',
                'participation_status_id' => '1',
                'publicize_at' => '2018-02-01 10:00:00',
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => '1',
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
                'name_de' => 'GLK',
                'name_en' => 'GLK',
                'name_fr' => 'GLK',
                'name_it' => 'GLK',
                'created_at' => '2017-01-01 00:00:10',
                'created_by' => '1',
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
                'created_at' => '2017-01-01 00:00:10',
                'created_by' => '2',
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '3',
                'name_de' => 'HEKU',
                'name_en' => 'HEKU',
                'name_fr' => 'HEKU',
                'name_it' => 'HEKU',
                'created_at' => '2017-01-01 00:00:10',
                'created_by' => '2',
                'modified_at' => '2017-12-01 00:00:00',
                'modified_by' => '2',
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '4',
                'name_de' => 'HEKU',
                'name_en' => 'HEKU',
                'name_fr' => 'HEKU',
                'name_it' => 'HEKU',
                'created_at' => '2017-01-01 00:00:10',
                'created_by' => '2',
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
                'image_id' => '1',
                'event_id' => '1',
            ],
            [
                'id' => '2',
                'image_id' => '2',
                'event_id' => '2',
            ],
            [
                'id' => '3',
                'image_id' => '3',
                'event_id' => '3',
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
                'department_group_id' => '1',
                'department_type_id' => '1',
                'city_id' => '1',
                'name' => 'Department 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'department_group_id' => '2',
                'department_type_id' => '2',
                'city_id' => '2',
                'name' => 'Department 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'department_group_id' => '3',
                'department_type_id' => '3',
                'city_id' => '3',
                'name' => 'Department 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '4',
                'department_group_id' => '2',
                'department_type_id' => '1',
                'city_id' => '3',
                'name' => 'Department 4',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
        ];
***REMOVED***

    private function department_group()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name_de' => 'AG-SO-LU-ZG',
                'name_en' => 'AG-SO-LU-ZG',
                'name_fr' => 'AG-SO-LU-ZG',
                'name_it' => 'AG-SO-LU-ZG',
            ],
            [
                'id' => '2',
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
                'name_de' => 'Nord',
                'name_en' => 'Nord',
                'name_fr' => 'Nord',
                'name_it' => 'Nord',
            ],
            [
                'id' => '2',
                'name_de' => 'Süd',
                'name_en' => 'Süd',
                'name_fr' => 'Süd',
                'name_it' => 'Süd',
            ],
            [
                'id' => '3',
                'name_de' => 'Ost',
                'name_en' => 'Ost',
                'name_fr' => 'Ost',
                'name_it' => 'Ost',
            ],
            [
                'id' => '4',
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
                'name_de' => 'Verband',
                'name_en' => 'Verband',
                'name_fr' => 'Verband',
                'name_it' => 'Verband',
            ],
            [
                'id' => '2',
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
                'name_de' => 'Mann',
                'name_en' => 'Men',
                'name_fr' => 'Homme',
                'name_it' => 'Uomo',
            ],
            [
                'id' => '2',
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
                'url' => baseurl('/img/events/image-url-1.jpg'),
                'type' => 'jpg',
                'created_at' => '2017-01-01 10:00:00',
                'created_by' => '1',
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'url' => baseurl('/img/events/image-url-2.jpg'),
                'type' => 'jpg',
                'created_at' => '2017-01-01 10:00:00',
                'created_by' => '2',
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '3',
                'url' => baseurl('/img/events/image-url-3.jpg'),
                'type' => 'jpg',
                'created_at' => '2017-01-01 10:00:00',
                'created_by' => '2',
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
                'level' => '64',
                'name' => 'archive',
            ],
            [
                'id' => '2',
                'level' => '32',
                'name' => 'update',
            ],
            [
                'id' => '3',
                'level' => '16',
                'name' => 'create',
            ],
            [
                'id' => '4',
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
                'name' => 'Kiste 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Kiste 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Kiste 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ]
        ];
***REMOVED***

    private function sl_corridor()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name' => 'Korridor 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Korridor 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Korridor 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ]
        ];
***REMOVED***

    private function sl_location()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name' => 'Ort 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Ort 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Ort 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
        ];
***REMOVED***

    private function sl_room()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name' => 'Raum 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Raum 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Raum 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
        ];
***REMOVED***

    private function sl_shelf()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name' => 'Regal 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Regal 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Regal 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
        ];
***REMOVED***

    private function sl_tray()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name' => 'Tablar 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Tablar 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Tablar 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
        ];
***REMOVED***

    private function storage_place()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'sl_location_id' => '1',
                'sl_room_id' => '1',
                'sl_corridor_id' => '1',
                'sl_shelf_id' => '1',
                'sl_tray_id' => '1',
                'sl_chest_id' => '1',
                'department_id' => '1',
                'name' => 'Platz 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'sl_location_id' => '2',
                'sl_room_id' => '2',
                'sl_corridor_id' => '2',
                'sl_shelf_id' => '2',
                'sl_tray_id' => '2',
                'sl_chest_id' => '2',
                'department_id' => '1',
                'name' => 'Platz 2',
                'created_at' => '2027-02-01 00:00:00',
                'created_by' => '1',
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '3',
                'sl_location_id' => '3',
                'sl_room_id' => '3',
                'sl_corridor_id' => '3',
                'sl_shelf_id' => '3',
                'sl_tray_id' => '3',
                'sl_chest_id' => '3',
                'department_id' => '2',
                'name' => 'Platz 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '4',
                'sl_location_id' => '1',
                'sl_room_id' => '2',
                'sl_corridor_id' => '2',
                'sl_shelf_id' => '2',
                'sl_tray_id' => '1',
                'sl_chest_id' => '1',
                'department_id' => '2',
                'name' => 'Platz 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '1',
                'archived_at' => '2017-12-30 00:00:00',
                'archived_by' => '1',
            ],
        ];
***REMOVED***
***REMOVED***
