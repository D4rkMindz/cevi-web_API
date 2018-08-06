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
{
    public function all()
    {
        return [
            'article' => $this->article(),
            'article_description' => $this->article_description(),
            'article_quality' => $this->article_quality(),
            'article_title' => $this->article_title(),
            'city' => $this->city(3),
            'department' => $this->department(),
            'department_event' => $this->department_event(),
            'department_group' => $this->department_group(),
            'department_region' => $this->department_region(),
            'department_type' => $this->department_type(),
            'educational_course' => $this->educational_course(),
            'educational_course_description' => $this->educational_course_description(),
            'educational_course_image' => $this->educational_course_image(),
            'educational_course_organiser' => $this->educational_course_organiser(),
            'educational_course_participant' => $this->educational_course_participant(),
            'educational_course_title' => $this->educational_course_title(),
            'email_token' => $this->email_token(),
            'event' => $this->event(),
            'event_description' => $this->event_description(),
            'event_title' => $this->event_title(),
            'event_participant' => $this->event_participant(),
            'event_participation_status' => $this->event_participation_status(),
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
    }

    public function educational_course_image()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'educational_course_hash' => $this->educational_course()[0]['hash'],
                'image_hash' => $this->image()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'educational_course_hash' => $this->educational_course()[1]['hash'],
                'image_hash' => $this->image()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'educational_course_hash' => $this->educational_course()[2]['hash'],
                'image_hash' => $this->image()[0]['hash'],
            ],
        ];
    }

    /**
     * $this->baseurl method for Test Database.
     *
     * @param string $path
     * @return mixed|string
     */
    private function baseurl(string $path)
    {
        $baseUri = dirname(dirname($_SERVER['SCRIPT_NAME']));
        $result = str_replace('\\', '/', $baseUri) . $path;
        $result = str_replace('//', '/', $result);
        return $result;
    }

    /**
     * Get language table data.
     * @return array
     */
    private function language()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name' => 'de_CH',
                'abbreviation' => 'de',
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name' => 'en_GB',
                'abbreviation' => 'en',
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'name' => 'fr_CH',
                'abbreviation' => 'fr',
            ],
            [
                'id' => '4',
                'hash' => 'hash_test_4',
                'name' => 'it_CH',
                'abbreviation' => 'it',
            ],
        ];
    }

    private function position()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name_de' => 'Abteilungsleiter',
                'name_en' => 'Head of department',
                'name_fr' => 'Capo dipartimento',
                'name_it' => 'Chef de département',
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name_de' => 'Lagerleiter',
                'name_en' => 'Camp leader',
                'name_fr' => 'Chef de camp',
                'name_it' => 'Capo  del campeggio',
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'name_de' => 'Gruppenleiter',
                'name_en' => 'Team leader',
                'name_fr' => 'Chef d\'équipe',
                'name_it' => 'Capogruppo',
            ],
            [
                'id' => '4',
                'hash' => 'hash_test_4',
                'name_de' => 'Hilfsleiter',
                'name_en' => 'Auxiliary conductors',
                'name_fr' => 'Conducteurs auxiliaires',
                'name_it' => 'Conduttori ausiliari',
            ],
            [
                'id' => '5',
                'hash' => 'hash_test_5',
                'name_de' => 'Teilnehmer',
                'name_en' => 'Participants',
                'name_fr' => 'Participants',
                'name_it' => 'Partecipanti',
            ],
            [
                'id' => '6',
                'hash' => 'hash_test_6',
                'name_de' => 'Eltern',
                'name_en' => 'Parent',
                'name_fr' => 'Parent',
                'name_it' => 'Ragazzo',
            ],
        ];
    }

    private function user()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
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
                'hash' => 'hash_test_2',
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
                'hash' => 'hash_test_3',
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
    }

    private function article()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'article_title_id' => '1',
                'article_description_id' => '1',
                'article_quality_hash' => $this->article_quality()[0]['hash'],
                'storage_place_hash' => $this->storage_place()[0]['hash'],
                'department_hash' => $this->department()[0]['hash'],
                'date' => '2019-01-01 0:00:00',
                'quantity' => '10',
                'replacement' => '2018-03-01 00:00:00',
                'barcode' => 'CEVIWEB-A1_L1_D1',
                'available_for_rent' => false,
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'article_title_id' => '2',
                'article_description_id' => '2',
                'article_quality_hash' => $this->article_quality()[1]['hash'],
                'storage_place_hash' => $this->storage_place()[1]['hash'],
                'department_hash' => $this->department()[0]['hash'],
                'date' => '2017-01-01 0:00:00',
                'quantity' => '10',
                'replacement' => '2018-12-01 00:00:00',
                'barcode' => 'CEVIWEB-A2_L2_D2',
                'available_for_rent' => true,
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'article_title_id' => '3',
                'article_description_id' => '3',
                'article_quality_hash' => $this->article_quality()[2]['hash'],
                'storage_place_hash' => $this->storage_place()[2]['hash'],
                'department_hash' => $this->department()[2]['hash'],
                'date' => '2017-01-01 0:00:00',
                'quantity' => '10',
                'replacement' => '2018-12-01 00:00:00',
                'barcode' => 'CEVIWEB-A3_L3_D3',
                'available_for_rent' => true,
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
    }

    private function article_title()
    {
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
    }

    private function article_description()
    {
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
    }

    private function article_quality()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'level' => '1',
                'name_de' => 'Sehr gut',
                'name_en' => 'Sehr gut',
                'name_fr' => 'Sehr gut',
                'name_it' => 'Sehr gut',
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'level' => '2',
                'name_de' => 'Gut',
                'name_en' => 'Gut',
                'name_fr' => 'Gut',
                'name_it' => 'Gut',
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'level' => '3',
                'name_de' => 'Mittel',
                'name_en' => 'Mittel',
                'name_fr' => 'Mittel',
                'name_it' => 'Mittel',
            ],
            [
                'id' => '4',
                'hash' => 'hash_test_4',
                'level' => '4',
                'name_de' => 'Bald ersetzen',
                'name_en' => 'Bald ersetzen',
                'name_fr' => 'Bald ersetzen',
                'name_it' => 'Bald ersetzen',
            ],
            [
                'id' => '5',
                'hash' => 'hash_test_5',
                'level' => '5',
                'name_de' => 'Ersetzen',
                'name_en' => 'Ersetzen',
                'name_fr' => 'Ersetzen',
                'name_it' => 'Ersetzen',
            ],
            [
                'id' => '6',
                'hash' => 'hash_test_6',
                'level' => '6',
                'name_de' => 'Kaputt',
                'name_en' => 'Kaputt',
                'name_fr' => 'Kaputt',
                'name_it' => 'Kaputt',
            ],
        ];
    }

    private function event_participation_status()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name_de' => 'Zugesagt',
                'name_en' => 'Participated',
                'name_fr' => 'Participaté',
                'name_it' => 'Participatés',
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name_de' => 'Abgesagt',
                'name_en' => 'Departicipated',
                'name_fr' => 'Departicipaté',
                'name_it' => 'Departicipatés',
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'name_de' => 'Vielleicht',
                'name_en' => 'Probably',
                'name_fr' => 'Peutetre',
                'name_it' => 'Peutetros',
            ],
        ];
    }

    private function department_event()
    {
        return [
            [
                'id' => '1',
                'department_hash' => $this->department()[0]['hash'],
                'event_hash' => $this->event()[0]['hash'],
                'department_group_hash' => $this->department_group()[0]['hash'],
            ],
            [
                'id' => '2',
                'department_hash' => $this->department()[1]['hash'],
                'event_hash' => $this->event()[1]['hash'],
                'department_group_hash' => $this->department_group()[1]['hash'],
            ],
            [
                'id' => '3',
                'department_hash' => $this->department()[2]['hash'],
                'event_hash' => $this->event()[2]['hash'],
                'department_group_hash' => $this->department_group()[1]['hash'],
            ],
        ];
    }

    private function educational_course()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
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
                'hash' => 'hash_test_2',
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
                'hash' => 'hash_test_3',
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
    }

    private function educational_course_organiser()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'user_hash' => $this->user()[0]['hash'],
                'phone' => '061 456 12 78',
                'email' => 'contact@llm.ch',
                'notes' => 'Ist auf Milch allergisch',
                'mobile' => '079 456 12 79',
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'user_hash' => $this->user()[1]['hash'],
                'phone' => '061 457 12 78',
                'email' => 'contact@glk.ch',
                'notes' => 'Ist auf Kühe allergisch',
                'mobile' => '079 456 12 78',
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'user_hash' => $this->user()[2]['hash'],
                'phone' => '061 357 12 78',
                'email' => 'contact@heku.ch',
                'notes' => 'Ist auf Dummheit allergisch',
                'mobile' => '079 456 12 99',
            ],
        ];
    }

    private function educational_course_participant()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'educational_course_hash' => $this->educational_course()[0]['hash'],
                'user_hash' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'educational_course_hash' => $this->educational_course()[0]['hash'],
                'user_hash' => $this->user()[1]['hash'],
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'educational_course_hash' => $this->educational_course()[1]['hash'],
                'user_hash' => $this->user()[2]['hash'],
            ],
        ];
    }

    private function educational_course_description()
    {
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
    }

    private function educational_course_title()
    {
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
    }

    private function email_token()
    {
        return [
            [
                'id' => '1',
                'user_hash' => $this->user()[0]['hash'],
                'token' => MailToken::generate(),
                'issued_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'user_hash' => $this->user()[1]['hash'],
                'token' => MailToken::generate(),
                'issued_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'user_hash' => $this->user()[2]['hash'],
                'token' => MailToken::generate(),
                'issued_at' => date('Y-m-d H:i:s', (time() - (60 * 16))), // invalid token, older than 15 minutes
            ],
        ];
    }

    private function event()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
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
                'hash' => 'hash_test_2',
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
                'hash' => 'hash_test_3',
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
    }

    private function event_description()
    {
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
    }

    private function event_participant()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'user_hash' => $this->user()[0]['hash'],
                'event_hash' => $this->event()[0]['hash'],
                'event_participation_status_hash' => $this->event_participation_status()[0]['hash'],
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[0]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'user_hash' => $this->user()[1]['hash'],
                'event_hash' => $this->event()[1]['hash'],
                'event_participation_status_hash' => $this->event_participation_status()[0]['hash'],
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[0]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'user_hash' => $this->user()[2]['hash'],
                'event_hash' => $this->event()[2]['hash'],
                'event_participation_status_hash' => $this->event_participation_status()[0]['hash'],
                'created_at' => '2017-05-10 16:32:15',
                'created_by' => $this->user()[0]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => '2018-02-01 10:00:00',
                'archived_by' => '2',
            ],
        ];
    }

    private function event_title()
    {
        return [
            [
                'id' => '1',
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
                'name_de' => 'ZM1',
                'name_en' => 'ZM1',
                'name_fr' => 'ZM1',
                'name_it' => 'ZM1',
                'created_at' => '2017-01-01 00:00:10',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => '2018-01-01 00:00:12',
                'archived_by' => '1',
            ],
        ];
    }

    private function event_image()
    {
        return [
            [
                'id' => '1',
                'image_hash' => $this->image()[0]['hash'],
                'event_hash' => $this->event()[0]['hash'],
            ],
            [
                'id' => '2',
                'image_hash' => $this->image()[1]['hash'],
                'event_hash' => $this->event()[1]['hash'],
            ],
            [
                'id' => '3',
                'image_hash' => $this->image()[2]['hash'],
                'event_hash' => $this->event()[2]['hash'],
            ],
        ];
    }

    private function city(int $count = 1)
    {
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
        for ($i = 0; $i < $count; $i++) {
            $city = $cities[$i % 11];
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
        }
        return $result;
    }

    private function department()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'department_group_hash' => $this->department_group()[0]['hash'],
                'department_type_hash' => $this->department_type()[0]['hash'],
                'city_id' => '1',
                'name' => 'Department 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '0',
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'department_group_hash' => $this->department_group()[1]['hash'],
                'department_type_hash' => $this->department_type()[1]['hash'],
                'city_id' => '2',
                'name' => 'Department 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '0',
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'department_group_hash' => $this->department_group()[1]['hash'],
                'department_type_hash' => $this->department_type()[0]['hash'],
                'city_id' => '3',
                'name' => 'Department 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '0',
            ],
            [
                'id' => '4',
                'hash' => 'hash_test_4',
                'department_group_hash' => $this->department_group()[1]['hash'],
                'department_type_hash' => $this->department_type()[0]['hash'],
                'city_id' => '3',
                'name' => 'Department 4',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => '0',
            ],
        ];
    }

    private function department_group()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name_de' => 'AG-SO-LU-ZG',
                'name_en' => 'AG-SO-LU-ZG',
                'name_fr' => 'AG-SO-LU-ZG',
                'name_it' => 'AG-SO-LU-ZG',
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name_de' => 'Basel',
                'name_en' => 'Basel',
                'name_fr' => 'Basel',
                'name_it' => 'Basel',
            ],
        ];
    }

    private function department_region()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name_de' => 'Nord',
                'name_en' => 'Nord',
                'name_fr' => 'Nord',
                'name_it' => 'Nord',
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name_de' => 'Süd',
                'name_en' => 'Süd',
                'name_fr' => 'Süd',
                'name_it' => 'Süd',
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'name_de' => 'Ost',
                'name_en' => 'Ost',
                'name_fr' => 'Ost',
                'name_it' => 'Ost',
            ],
            [
                'id' => '4',
                'hash' => 'hash_test_4',
                'name_de' => 'West',
                'name_en' => 'West',
                'name_fr' => 'West',
                'name_it' => 'West',
            ],
        ];
    }

    private function department_type()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name_de' => 'Verband',
                'name_en' => 'Verband',
                'name_fr' => 'Verband',
                'name_it' => 'Verband',
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name_de' => 'Tensing',
                'name_en' => 'Tensing',
                'name_fr' => 'Tensing',
                'name_it' => 'Tensing',
            ],
        ];
    }

    private function gender()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name_de' => 'Mann',
                'name_en' => 'Men',
                'name_fr' => 'Homme',
                'name_it' => 'Uomo',
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name_de' => 'Frau',
                'name_en' => 'Miss',
                'name_fr' => 'Madame',
                'name_it' => 'Signora',
            ],
        ];
    }

    private function image()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'url' => '/img/events/image-url-1.jpg',
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
                'hash' => 'hash_test_2',
                'url' => '/img/events/image-url-2.jpg',
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
                'hash' => 'hash_test_3',
                'url' => '/img/events/image-url-3.jpg',
                'type' => 'jpg',
                'created_at' => '2017-01-01 10:00:00',
                'created_by' => $this->user()[1]['hash'],
                'modified_at' => null,
                'modified_by' => null,
                'archived_at' => '2017-01-01 11:00:00',
                'archived_by' => '1',
            ],
        ];
    }

    private function permission()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'level' => '64',
                'name' => 'Super Admin',
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'level' => '32',
                'name' => 'Admin',
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'level' => '16',
                'name' => 'Super User',
            ],
            [
                'id' => '4',
                'hash' => 'hash_test_4',
                'level' => '8',
                'name' => 'User',
            ],
            [
                'id' => '5',
                'hash' => 'hash_test_5',
                'level' => '4',
                'name' => 'Guest',
            ],
            [
                'id' => '6',
                'hash' => 'hash_test_6',
                'level' => '2',
                'name' => 'Anonymous',
            ],
        ];
    }

    private function sl_chest()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name' => 'Kiste 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name' => 'Kiste 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'name' => 'Kiste 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ]
        ];
    }

    private function sl_corridor()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name' => 'Korridor 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name' => 'Korridor 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'name' => 'Korridor 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ]
        ];
    }

    private function sl_location()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name' => 'Ort 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name' => 'Ort 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'name' => 'Ort 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
    }

    private function sl_room()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name' => 'Raum 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name' => 'Raum 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'name' => 'Raum 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
    }

    private function sl_shelf()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name' => 'Regal 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name' => 'Regal 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'name' => 'Regal 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
    }

    private function sl_tray()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
                'name' => 'Tablar 1',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '2',
                'hash' => 'hash_test_2',
                'name' => 'Tablar 2',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
            [
                'id' => '3',
                'hash' => 'hash_test_3',
                'name' => 'Tablar 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
            ],
        ];
    }

    private function storage_place()
    {
        return [
            [
                'id' => '1',
                'hash' => 'hash_test_1',
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
                'hash' => 'hash_test_2',
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
                'hash' => 'hash_test_3',
                'sl_location_hash' => $this->sl_location()[0]['hash'],
                'sl_room_hash' => $this->sl_room()[0]['hash'],
                'sl_corridor_hash' => $this->sl_corridor()[0]['hash'],
                'sl_shelf_hash' => $this->sl_shelf()[0]['hash'],
                'sl_tray_hash' => $this->sl_tray()[0]['hash'],
                'sl_chest_hash' => $this->sl_chest()[0]['hash'],
                'department_hash' => $this->department()[1]['hash'],
                'name' => 'Platz 3',
                'created_at' => '2017-01-01 00:00:00',
                'created_by' => $this->user()[0]['hash'],
                'archived_at' => null,
                'archived_by' => null,
            ],
            [
                'id' => '4',
                'hash' => 'hash_test_4',
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
    }
}
