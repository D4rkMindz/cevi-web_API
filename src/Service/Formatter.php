<?php


namespace App\Service;


class Formatter
***REMOVED***
    /**
     * Format user.
     *
     * @param $user
     * @return array
     */
    public function formatUser(array $user): array
    ***REMOVED***
        $tmp['id'] = (int)$user['id'];
        $tmp['department'] = [
            'id' => $user['department_id'],
            'name' => $user['department_name'],
        ];
        $tmp['position'] = [
            'name_de' => $user['position_name_de'],
            'name_en' => $user['position_name_en'],
            'name_fr' => $user['position_name_fr'],
            'name_it' => $user['position_name_it'],
        ];
        $tmp['gender'] = [
            'id' => $user['gender_id'],
            'name' => $user['gender_name'],
        ];
        $tmp['language'] = [
            'full_name' => $user['language_full'],
            'abbreviation' => $user['language_abbr'],
        ];
        $tmp['last_name'] = $user['last_name'];
        $tmp['first_name'] = $user['first_name'];
        $tmp['cevi_name'] = $user['cevi_name'];
        $tmp['email'] = $user['email'];
        $tmp['username'] = $user['username'];
        $tmp['address'] = [
            'city' => [
                'id' => $user['city_id'],
                'name_de' => $user['city_name_de'],
                'name_en' => $user['city_name_en'],
                'name_fr' => $user['city_name_fr'],
                'name_it' => $user['city_name_it'],
            ],
            'street' => $user['street'],
        ];
        $tmp['birthdate'] = $user['birthdate'];
        $tmp['js_certificate'] = (bool)$user['js_certificate'];
        $tmp['js_certificate'] = date('Y-m-d H:i:s', $user['js_certificate_until']);
        $tmp['signup_completed'] = (bool)$user['signup_completed'];
        $tmp['url'] = baseurl('/v2/users/' . $user['id']);
        $tmp['created'] = date('Y-m-d H:i:s', $user['created']);
        $tmp['created_by'] = $user['modified_by'];
        $tmp['modified'] = date('Y-m-d H:i:s', $user['modified']);
        $tmp['modified_by'] = $user['modified_by'];
        $tmp['deleted'] = (bool)$user['deleted'];
        $tmp['deleted_by'] = (int)$user['deleted_by'];
        $tmp['deleted_at'] = date('Y-m-d H:i:s', $user['deleted_at']);

        return $tmp;
***REMOVED***

    /**
     * Format event.
     *
     * @see http://parsedown.org/
     * @param array $event from event Repository::getEvent();
     * @param string|null $descriptionFormat
     * @return array
     */
    public function formatEvent(array $event, string $descriptionFormat = null): array
    ***REMOVED***
        $tmp = [];
        $tmp['id'] = $event['id'];
        $tmp['name'] = [
            'name_de' => $event['event_name_de'],
            'name_en' => $event['event_name_en'],
            'name_fr' => $event['event_name_fr'],
            'name_it' => $event['event_name_it'],
        ];

        $tmp['price'] = $event['price'];
        $tmp['start'] = $event['start'];
        $tmp['end'] = $event['end'];
        $tmp['end_leader'] = $event['end_leader'];
        $tmp['start_leader'] = $event['start_leader'];
        $tmp['created'] = $event['created'];
        $tmp['created_by'] = $event['created_by'];
        $tmp['modified'] = $event['modified'];
        $tmp['modified_by'] = $event['modified_by'];
        $tmp['deleted'] = $event['deleted'];
        $tmp['deleted_at'] = $event['deleted_at'];
        $tmp['deleted_by'] = $event['deleted_by'];

        if ($descriptionFormat === 'plain') ***REMOVED***
            $tmp['description'] = [
                'name_de' => [
                    'plain' => $event['description_name_de'],
                ],
                'name_en' => [
                    'plain' => $event['description_name_en'],
                ],
                'name_fr' => [
                    'plain' => $event['description_name_fr'],
                ],
                'name_it' => [
                    'plain' => $event['description_name_it'],
                ],
            ];
    ***REMOVED*** else if ($descriptionFormat === 'parsed') ***REMOVED***
            $tmp['description'] = [
                'name_de' => [
                    'parsed' => MDParser::parse($event['description_name_de']),
                ],
                'name_en' => [
                    'parsed' => MDParser::parse($event['description_name_en']),
                ],
                'name_fr' => [
                    'parsed' => MDParser::parse($event['description_name_fr']),
                ],
                'name_it' => [
                    'parsed' => MDParser::parse($event['description_name_it']),
                ],
            ];
    ***REMOVED*** else ***REMOVED***
            $tmp['description'] = [
                'name_de' => [
                    'plain' => $event['description_name_de'],
                    'parsed' => MDParser::parse($event['description_name_de']),
                ],
                'name_en' => [
                    'plain' => $event['description_name_en'],
                    'parsed' => MDParser::parse($event['description_name_en']),
                ],
                'name_fr' => [
                    'plain' => $event['description_name_fr'],
                    'parsed' => MDParser::parse($event['description_name_fr']),
                ],
                'name_it' => [
                    'plain' => $event['description_name_it'],
                    'parsed' => MDParser::parse($event['description_name_it']),
                ],
            ];
    ***REMOVED***
        return $tmp;
***REMOVED***

    public function formatDepartment(array $department)
    ***REMOVED***
        $tmp = [];
        $tmp['id'] = $department['id'];
        $tmp['name'] = $department['name'];
        $tmp['city'] = [
            'id' => $department['city_id'],
            'postcode' => $department['city_postcode'],
            'name_de' => $department['city_name_de'],
            'name_en' => $department['city_name_en'],
            'name_fr' => $department['city_name_fr'],
            'name_it' => $department['city_name_it'],
        ];
        $tmp['department_group'] = [
            'id' => $department['department_group_id'],
            'name_de' => $department['department_group_name_de'],
            'name_en' => $department['department_group_name_en'],
            'name_fr' => $department['department_group_name_fr'],
            'name_it' => $department['department_group_name_it'],
        ];
        $tmp['department_type'] = [
            'id'=>$department['department_type_id'],
            'name_de'=>$department['department_type_name_de'],
            'name_en'=>$department['department_type_name_en'],
            'name_fr'=>$department['department_type_name_fr'],
            'name_it'=>$department['department_type_name_it'],
            ];
        $tmp['created'] = $department['created'];
        $tmp['created_by'] = $department['created_by'];
        $tmp['modified'] = $department['modified'];
        $tmp['modified_by'] = $department['modified_by'];
        $tmp['deleted'] = $department['deleted'];
        $tmp['deleted_at'] = $department['deleted_at'];
        $tmp['deleted_by'] = $department['deleted_by'];

        return $tmp;
***REMOVED***
***REMOVED***
