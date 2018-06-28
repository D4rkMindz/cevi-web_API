<?php


namespace App\Util;


class Formatter
{
    /**
     * Format user.
     *
     * @param $user
     * @return array
     */
    public function formatUser(array $user): array
    {
        $tmp['hash'] = $user['hash'];
        $tmp['department'] = [
            'hash' => $user['department_hash'],
            'name' => $user['department_name'],
        ];
        $tmp['position'] = [
            'hash' => $user['position_hash'],
            'name_de' => $user['position_name_de'],
            'name_en' => $user['position_name_en'],
            'name_fr' => $user['position_name_fr'],
            'name_it' => $user['position_name_it'],
        ];
        $tmp['gender'] = [
            'hash' => $user['gender_hash'],
            'name_de' => $user['gender_name_de'],
            'name_en' => $user['gender_name_en'],
            'name_fr' => $user['gender_name_fr'],
            'name_it' => $user['gender_name_it'],
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
        $tmp['js_certificate_until'] = $user['js_certificate_until'];
        $tmp['signup_completed'] = (bool)$user['signup_completed'];
        $tmp['email_verified'] = (bool)$user['email_verified'];
        $tmp['url'] = baseurl('/v2/users/' . $user['hash']);
        $tmp['created_at'] = $user['created_at'];
        $tmp['created_by'] = $user['created_by'];
        $tmp['modified_at'] = $user['modified_at'];
        $tmp['modified_by'] = $user['modified_by'];
        $tmp['archived_by'] = $user['archived_by'];
        $tmp['archived_at'] = $user['archived_at'];

        return $tmp;
    }

    /**
     * Format event.
     *
     * @see http://parsedown.org/
     * @param array $event from event Repository::getEvent();
     * @param string|null $descriptionFormat
     * @return array
     */
    public function formatEvent(array $event, string $descriptionFormat = null): array
    {
        $tmp = [];
        $tmp['hash'] = $event['hash'];
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
        $tmp['created_at'] = $event['created_at'];
        $tmp['created_by'] = $event['created_by'];
        $tmp['modified_at'] = $event['modified_at'];
        $tmp['modified_by'] = $event['modified_by'];
        $tmp['archived_at'] = $event['archived_at'];
        $tmp['archived_by'] = $event['archived_by'];
        $tmp['images'] = $event['images'];

        if ($descriptionFormat === 'plain') {
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
        } else if ($descriptionFormat === 'parsed') {
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
        } else {
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
        }
        return $tmp;
    }

    /**
     * Format simple event array.
     *
     * @param array $event
     * @param string|null $descriptionFormat
     * @return array
     */
    public function formatEventSimple(array $event, string $descriptionFormat = null): array
    {
        $tmp = [];
        $tmp['hash'] = $event['hash'];
        $tmp['name'] = [
            'name_de' => $event['event_name_de'],
            'name_en' => $event['event_name_en'],
            'name_fr' => $event['event_name_fr'],
            'name_it' => $event['event_name_it'],
        ];

        $tmp['created_at'] = $event['created_at'];
        $tmp['created_by'] = $event['created_by'];
        $tmp['modified_at'] = $event['modified_at'];
        $tmp['modified_by'] = $event['modified_by'];
        $tmp['archived_at'] = $event['archived_at'];
        $tmp['archived_by'] = $event['archived_by'];

        if ($descriptionFormat === 'plain') {
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
        } else if ($descriptionFormat === 'parsed') {
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
        } else {
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
        }
        return $tmp;
    }

    /**
     * Format department.
     *
     * @param array $department
     * @return array
     */
    public function formatDepartment(array $department)
    {
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
            'id' => $department['department_type_id'],
            'name_de' => $department['department_type_name_de'],
            'name_en' => $department['department_type_name_en'],
            'name_fr' => $department['department_type_name_fr'],
            'name_it' => $department['department_type_name_it'],
        ];
        $tmp['created_at'] = $department['created_at'];
        $tmp['created_by'] = $department['created_by'];
        $tmp['modified_at'] = $department['modified_at'];
        $tmp['modified_by'] = $department['modified_by'];
        $tmp['archived_at'] = $department['archived_at'];
        $tmp['archived_by'] = $department['archived_by'];

        return $tmp;
    }

    /**
     * Format article
     *
     * @param array $article
     * @param string $departemntId
     * @param string|null $descriptionFormat
     * @param bool $withStorageplaces
     * @return array
     */
    public function formatArticle(array $article, string $departemntId, string $descriptionFormat = null, bool $withStorageplaces = true): array
    {
        $tmp = [];
        $tmp['hash'] = $article['hash'];
        $tmp['title'] = [
            'name_de' => $article['title_name_de'],
            'name_en' => $article['title_name_en'],
            'name_fr' => $article['title_name_fr'],
            'name_it' => $article['title_name_it'],
        ];

        if ($descriptionFormat === 'parsed') {
            $tmp['description'] = [
                'name_de' => [
                    'parsed' => MDParser::parse($article['description_name_de']),
                ],
                'name_en' => [
                    'parsed' => MDParser::parse($article['description_name_en']),
                ],
                'name_fr' => [
                    'parsed' => MDParser::parse($article['description_name_fr']),
                ],
                'name_it' => [
                    'parsed' => MDParser::parse($article['description_name_it']),
                ],
            ];
        } else if ($descriptionFormat === 'plain') {
            $tmp['description'] = [
                'name_de' => [
                    'plain' => $article['description_name_de']
                ],
                'name_en' => [
                    'plain' => $article['description_name_en']
                ],
                'name_fr' => [
                    'plain' => $article['description_name_fr']
                ],
                'name_it' => [
                    'plain' => $article['description_name_it']
                ],
            ];
        } else {
            $tmp['description'] = [
                'name_de' => [
                    'plain' => $article['description_name_de'],
                    'parsed' => MDParser::parse($article['description_name_de']),
                ],
                'name_en' => [
                    'plain' => $article['description_name_en'],
                    'parsed' => MDParser::parse($article['description_name_en']),
                ],
                'name_fr' => [
                    'plain' => $article['description_name_fr'],
                    'parsed' => MDParser::parse($article['description_name_fr']),
                ],
                'name_it' => [
                    'plain' => $article['description_name_it'],
                    'parsed' => MDParser::parse($article['description_name_it']),
                ],
            ];
        }
        $tmp['purchase_date'] = $article['purchase_date'];
        $tmp['quantity'] = (int)$article['quantity'];
        $tmp['quality'] = [
            'hash' => (int)$article['quality_hash'],
            'level' => (int)$article['quality_level'],
            'name' => [
                'name_de' => $article['quality_name_de'],
                'name_en' => $article['quality_name_en'],
                'name_fr' => $article['quality_name_fr'],
                'name_it' => $article['quality_name_it'],
            ],
        ];
        if ($withStorageplaces) {
            $tmp['storage'] = [
                'hash' => $article['location_hash'],
                'name' => $article['location_name'],
                'url' => baseurl('/v2/departments/' . $departemntId . '/storages/' . $article['location_hash']),
            ];
            if (!empty($article['room_name'])) {
                $tmp['room'] = [
                    'hash' => $article['room_hash'],
                    'name' => $article['room_name'],
                    'url' => baseurl('/v2/departments/' . $departemntId . '/rooms/' . $article['room_hash']),
                ];
            }
            if (!empty($article['corridor_name'])) {
                $tmp['corridor'] = [
                    'hash' => $article['corridor_hash'],
                    'name' => $article['corridor_name'],
                    'url' => baseurl('/v2/departments/' . $departemntId . '/corridors/' . $article['corridor_hash']),
                ];
            }
            if (!empty($article['shelf_name'])) {
                $tmp['shelf'] = [
                    'hash' => $article['shelf_hash'],
                    'name' => $article['shelf_name'],
                    'url' => baseurl('/v2/departments/' . $departemntId . '/shelfs/' . $article['shelf_hash']),
                ];
            }
            if (!empty($article['tray_name'])) {
                $tmp['tray'] = [
                    'hash' => $article['tray_hash'],
                    'name' => $article['tray_name'],
                    'url' => baseurl('/v2/departments/' . $departemntId . '/trays/' . $article['tray_hash']),
                ];
            }
            if (!empty($article['chest_name'])) {
                $tmp['chest'] = [
                    'hash' => $article['chest_hash'],
                    'name' => $article['chest_name'],
                    'url' => baseurl('/v2/departments/' . $departemntId . '/chest/' . $article['chest_hash']),
                ];
            }
        }
        $tmp['replacement'] = [
            'needed' => !empty($article['replacement']),
            'urgent' => strtotime($article['replacement']) <= time() + 60 * 60 * 24 * 30 * 3, // three months
            'date' => $article['replacement'],
        ];
        $tmp['rent'] = [
            'available' => (bool)$article['available_for_rent'],
            'price' => !empty($article['rent_price']) ? (float)$article['rent_price'] : null
        ];
        $tmp['created_at'] = $article['created_at'];
        $tmp['created_by'] = $article['created_by'];
        $tmp['modified_at'] = empty($article['modified_at']) ? $article['modified_at'] : null;
        $tmp['modified_by'] = empty($article['modified_by']) ? $article['modified_by'] : null;
        $tmp['archived_at'] = empty($article['archived_at']) ? $article['archived_at'] : null;
        $tmp['archived_by'] = empty($article['archived_by']) ? $article['archived_by'] : null;

        return $tmp;
    }

    /**
     * Format storage place.
     *
     * @param array $storagePlace
     * @param string $departmentHash
     * @return array
     */
    public function formatStoragePlace(array $storagePlace, string $departmentHash): array
    {
        $tmp = [];
        $tmp['location'] = [
            'hash' => $storagePlace['location_hash'],
            'name' => $storagePlace['location_name'],
            'url' => baseurl('/v2/departments/' . $departmentHash . '/locations/' . $storagePlace['location_hash']),
        ];
        $tmp['room'] = [
            'hash' => $storagePlace['room_hash'],
            'name' => $storagePlace['room_name'],
            'url' => baseurl('/v2/departments/' . $departmentHash . '/rooms/' . $storagePlace['room_hash']),
        ];
        $tmp['corrhashor'] = [
            'hash' => $storagePlace['corridor_hash'],
            'name' => $storagePlace['corridor_name'],
            'url' => baseurl('/v2/departments/' . $departmentHash . '/corridors/' . $storagePlace['corridor_hash']),
        ];
        $tmp['shelf'] = [
            'hash' => $storagePlace['shelf_hash'],
            'name' => $storagePlace['shelf_name'],
            'url' => baseurl('/v2/departments/' . $departmentHash . '/shelfs/' . $storagePlace['shelf_hash']),
        ];
        $tmp['tray'] = [
            'hash' => $storagePlace['tray_hash'],
            'name' => $storagePlace['tray_name'],
            'url' => baseurl('/v2/departments/' . $departmentHash . '/trays/' . $storagePlace['tray_hash']),
        ];
        $tmp['chest'] = [
            'hash' => $storagePlace['chest_hash'],
            'name' => $storagePlace['chest_name'],
            'url' => baseurl('/v2/departments/' . $departmentHash . '/chests/' . $storagePlace['chest_hash']),
        ];
        $tmp['name'] = $storagePlace['name'];
        $tmp['hash'] = $storagePlace['hash'];
        return $tmp;
    }

    /**
     * Format participation.
     *
     * @param array $participation
     * @param string $departmentId
     * @param string $format
     * @return array
     */
    public function formatParticipation(array $participation, string $departmentId, string $format): array
    {
        // works, because in the Participation Repository
        // are the same array keys used for getting all
        // and getting only users
        $tmp = $this->formatParticipatingUser($participation);
        if ($format === 'plain') {
            $tmp['event'] = [
                'id' => $participation['event_id'],
                'title' => [
                    'name_de' => $participation['event_title_de'],
                    'name_en' => $participation['event_title_en'],
                    'name_fr' => $participation['event_title_fr'],
                    'name_it' => $participation['event_title_it'],
                ],
                'description' => [
                    'name_de' => [
                        'plain' => $participation['event_description_de'],
                    ],
                    'name_en' => [
                        'plain' => $participation['event_description_en'],
                    ],
                    'name_fr' => [
                        'plain' => $participation['event_description_fr'],
                    ],
                    'name_it' => [
                        'plain' => $participation['event_description_it'],
                    ],
                ]
            ];
        } elseif ($format === 'parsed') {
            $tmp['event'] = [
                'id' => $participation['event_id'],
                'title' => [
                    'name_de' => $participation['event_title_de'],
                    'name_en' => $participation['event_title_en'],
                    'name_fr' => $participation['event_title_fr'],
                    'name_it' => $participation['event_title_it'],
                ],
                'description' => [
                    'name_de' => [
                        'parsed' => MDParser::parse($participation['event_description_de']),
                    ],
                    'name_en' => [
                        'parsed' => MDParser::parse($participation['event_description_en']),
                    ],
                    'name_fr' => [
                        'parsed' => MDParser::parse($participation['event_description_fr']),
                    ],
                    'name_it' => [
                        'parsed' => MDParser::parse($participation['event_description_it']),
                    ],
                ]
            ];
        } else {
            $tmp['event'] = [
                'id' => $participation['event_id'],
                'title' => [
                    'name_de' => $participation['event_title_de'],
                    'name_en' => $participation['event_title_en'],
                    'name_fr' => $participation['event_title_fr'],
                    'name_it' => $participation['event_title_it'],
                ],
                'description' => [
                    'name_de' => [
                        'plain' => $participation['event_description_de'],
                        'parsed' => MDParser::parse($participation['event_description_de']),
                    ],
                    'name_en' => [
                        'plain' => $participation['event_description_en'],
                        'parsed' => MDParser::parse($participation['event_description_en']),
                    ],
                    'name_fr' => [
                        'plain' => $participation['event_description_fr'],
                        'parsed' => MDParser::parse($participation['event_description_fr']),
                    ],
                    'name_it' => [
                        'plain' => $participation['event_description_it'],
                        'parsed' => MDParser::parse($participation['event_description_it']),
                    ],
                ]
            ];
        }

        $tmp['event']['url'] = baseurl('/v2/departments/' . $departmentId . '/events/' . $participation['event_id']);

        return $tmp;
    }

    /**
     * Format user who's participating at an event.
     *
     * @param array $user
     */
    public function formatParticipatingUser(array $user)
    {
        $tmp['user_id'] = $user['user_id'];
        $tmp['department'] = [
            'id' => $user['department_hash'],
            'name' => $user['department_name'],
        ];
        $tmp['last_name'] = $user['last_name'];
        $tmp['first_name'] = $user['first_name'];
        $tmp['cevi_name'] = $user['cevi_name'];
        $tmp['language'] = [
            'id' => $user['language_id'],
            'name' => $user['language_name'],
            'abbreviation' => $user['language_abbreviation'],
        ];
        $tmp['city'] = [
            'id' => $user['city_id'],
            'postcode' => $user['city_postcode'],
            'name_de' => $user['city_name_de'],
            'name_en' => $user['city_name_en'],
            'name_fr' => $user['city_name_fr'],
            'name_it' => $user['city_name_it'],
        ];
        $tmp['user_url'] = baseurl('/v2/users/' . $user['user_id']);

        return $tmp;
    }
}
