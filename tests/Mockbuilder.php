<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 18.12.2017
 * Time: 22:46
 */

namespace App\Test;


class Mockbuilder
***REMOVED***
    /**
     * Get User data
     *
     * @return array
     */
    public function user()
    ***REMOVED***
        return [
            'app_language' => $this->app_language(),
            'app_user' => $this->app_user(),
            'app_position' => $this->app_position(),
            'city' => $this->city(3),
            'permission' => $this->permission(),
            'gender' => $this->gender(),
            'department' => $this->department(),
            'department_group' => $this->department_group(),
            'department_region' => $this->department_region(),
            'department_type' => $this->department_type(),
        ];
***REMOVED***

    /**
     * Get app_language table data.
     * @return array
     */
    private function app_language()
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

    private function app_position()
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

    private function app_user()
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
                'created' => '2017-01-01 00:00:00',
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
                'created' => '2017-01-01 00:00:00',
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
                'created' => '2017-01-01 00:00:00',
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
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name_de' => 'Artikel 2',
                'name_en' => 'Artikel 2',
                'name_fr' => 'Artikel 2',
                'name_it' => 'Artikel 2',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name_de' => 'Artikel 3',
                'name_en' => 'Artikel 3',
                'name_fr' => 'Artikel 3',
                'name_it' => 'Artikel 3',
                'created' => '2017-01-01 00:00:00',
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
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name_de' => 'Beschreibung 2',
                'name_en' => 'Beschreibung 2',
                'name_fr' => 'Beschreibung 2',
                'name_it' => 'Beschreibung 2',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name_de' => 'Beschreibung 3',
                'name_en' => 'Beschreibung 3',
                'name_fr' => 'Beschreibung 3',
                'name_it' => 'Beschreibung 3',
                'created' => '2017-01-01 00:00:00',
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
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'department_group_id' => '2',
                'department_type_id' => '2',
                'city_id' => '2',
                'name' => 'Department 2',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'department_group_id' => '3',
                'department_type_id' => '3',
                'city_id' => '3',
                'name' => 'Department 3',
                'created' => '2017-01-01 00:00:00',
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

    private function permission()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'level' => '64',
                'name' => 'delete',
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
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Kiste 2',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Kiste 3',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ]
        ];
***REMOVED***

    private function sl_corridor()
    ***REMOVED***
        return [
            [
                'id' => '1',
                'name' => 'Korriodor 1',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Korriodor 2',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Korriodor 3',
                'created' => '2017-01-01 00:00:00',
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
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Ort 2',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Ort 3',
                'created' => '2017-01-01 00:00:00',
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
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Raum 2',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Raum 3',
                'created' => '2017-01-01 00:00:00',
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
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Regal 2',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Regal 3',
                'created' => '2017-01-01 00:00:00',
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
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Tablar 2',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Tablar 3',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
        ];
***REMOVED***

    private function storage_location()
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
                'name' => 'Platz 1',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '2',
                'sl_location_id' => '2',
                'sl_room_id' => '2',
                'sl_corridor_id' => '2',
                'sl_shelf_id' => '2',
                'sl_tray_id' => '2',
                'sl_chest_id' => '2',
                'name' => 'Platz 2',
                'created' => '2027-02-01 00:00:00',
                'created_by' => '1',
            ],
            [
                'id' => '3',
                'sl_location_id' => '3',
                'sl_room_id' => '3',
                'sl_corridor_id' => '3',
                'sl_shelf_id' => '3',
                'sl_tray_id' => '3',
                'sl_chest_id' => '3',
                'name' => 'Platz 3',
                'created' => '2017-01-01 00:00:00',
                'created_by' => '1',
            ],
        ];
***REMOVED***
***REMOVED***
