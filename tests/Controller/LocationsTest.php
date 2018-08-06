<?php
/**
 * Created by PhpStorm.
 * User: Björn
 * Date: 25.06.2018
 * Time: 07:04
 */

namespace Controller;


use App\Test\DbTestCase;

/**
 * Class LocationsTest
 * @package Controller
 */
class LocationsTest extends DbTestCase
{
    private $hashes = [];

    /**
     * Test get all actions on the location controllers.
     *
     * @param string $url
     * @param int $expectedResponseCode
     * @param array $expectedResponse
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @dataProvider getAllDataProvider
     */
    public function testGetAll(string $url, int $expectedResponseCode, array $expectedResponse)
    {
        $url = $this->arrayReplaceHashes($url);
        $request = $this->createRequest('GET', $url);
        $response = $this->request($request);
        $this->assertDefaultValues($response, $expectedResponseCode, $expectedResponse, false, false, false);
    }

    /**
     * @param string $url
     * @param array $requestData
     * @param int $expectedResponseCode
     * @param array $expectedResponse
     * @param array $expectedDatabaseState
     * @param array $notExpectedDatabaseState
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @dataProvider createDataProvider
     */
    public function testCreate(string $url, array $requestData, int $expectedResponseCode, array $expectedResponse, $expectedDatabaseState, $notExpectedDatabaseState)
    {
        $url = $this->arrayReplaceHashes($url);
        $request = $this->createRequest('POST', $url);
        $request = $this->withJson($request, $requestData);
        $response = $this->request($request);
        $this->assertDefaultValues($response, $expectedResponseCode, $expectedResponse, $expectedDatabaseState, $notExpectedDatabaseState, false);
    }

    /**
     * Get all data provider
     *
     * @return array
     */
    public function getAllDataProvider()
    {
        $storages = [
            'url' => '/v2/departments/{department_hash}/storages',
            'expectedResponseCode' => 200,
            'expectedResponseData' => [
                'code' => 200,
                'message' => 'Success',
                'limit' => 1000,
                'page' => 1,
                'storage_places' => [
                    [
                        'location' => [
                            'hash' => 'hash_test_1',
                            'name' => 'Ort 1',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/locations/hash_test_1'),
                        ],
                        'room' => [
                            'hash' => 'hash_test_1',
                            'name' => 'Raum 1',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/rooms/hash_test_1'),
                        ],
                        'corrhashor' => [
                            'hash' => 'hash_test_1',
                            'name' => 'Korridor 1',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/corridors/hash_test_1'),
                        ],
                        'shelf' => [
                            'hash' => 'hash_test_1',
                            'name' => 'Regal 1',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/shelfs/hash_test_1'),
                        ],
                        'tray' => [
                            'hash' => 'hash_test_1',
                            'name' => 'Tablar 1',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/trays/hash_test_1'),
                        ],
                        'chest' => [
                            'hash' => 'hash_test_1',
                            'name' => 'Kiste 1',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/chests/hash_test_1'),
                        ],
                        'name' => 'Platz 1',
                        'hash' => 'hash_test_1',
                    ],
                    [
                        'location' => [
                            'hash' => 'hash_test_2',
                            'name' => 'Ort 2',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/locations/hash_test_2'),
                        ],
                        'room' => [
                            'hash' => 'hash_test_2',
                            'name' => 'Raum 2',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/rooms/hash_test_2'),
                        ],
                        'corrhashor' => [
                            'hash' => 'hash_test_2',
                            'name' => 'Korridor 2',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/corridors/hash_test_2'),
                        ],
                        'shelf' => [
                            'hash' => 'hash_test_2',
                            'name' => 'Regal 2',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/shelfs/hash_test_2'),
                        ],
                        'tray' => [
                            'hash' => 'hash_test_2',
                            'name' => 'Tablar 2',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/trays/hash_test_2'),
                        ],
                        'chest' => [
                            'hash' => 'hash_test_2',
                            'name' => 'Kiste 2',
                            'url' => $this->baseurl('/v2/departments/hash_test_1/chests/hash_test_2'),
                        ],
                        'name' => 'Platz 2',
                        'hash' => 'hash_test_2',
                    ],
                ]
            ],
        ];
        $locations = [
            'url' => '/v2/departments/{department_hash}/locations',
            'expectedResponseCode' => 200,
            'expectedResponseData' => [
                'code' => 200,
                'message' => 'Success',
                'limit' => 1000,
                'page' => 1,
                'locations' => [
                    [
                        'hash' => 'hash_test_1',
                        'name' => 'Ort 1',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                    [
                        'hash' => 'hash_test_2',
                        'name' => 'Ort 2',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                ],
            ],
        ];
        $rooms = [
            'url' => '/v2/departments/{department_hash}/rooms',
            'expectedResponseCode' => 200,
            'expectedResponseData' => [
                'code' => 200,
                'message' => 'Success',
                'limit' => 1000,
                'page' => 1,
                'rooms' => [
                    [
                        'hash' => 'hash_test_1',
                        'name' => 'Raum 1',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                    [
                        'hash' => 'hash_test_2',
                        'name' => 'Raum 2',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                ]
            ],
        ];
        $corridors = [
            'url' => '/v2/departments/{department_hash}/corridors',
            'expectedResponseCode' => 200,
            'expectedResponseData' => [
                'code' => 200,
                'message' => 'Success',
                'limit' => 1000,
                'page' => 1,
                'corridors' => [
                    [
                        'hash' => 'hash_test_1',
                        'name' => 'Korridor 1',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                    [
                        'hash' => 'hash_test_2',
                        'name' => 'Korridor 2',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                ]
            ],
        ];
        $shelfs = [
            'url' => '/v2/departments/{department_hash}/shelfs',
            'expectedResponseCode' => 200,
            'expectedResponseData' => [
                'code' => 200,
                'message' => 'Success',
                'limit' => 1000,
                'page' => 1,
                'shelfs' => [
                    [
                        'hash' => 'hash_test_1',
                        'name' => 'Regal 1',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                    [
                        'hash' => 'hash_test_2',
                        'name' => 'Regal 2',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                ],
            ],
        ];
        $trays = [
            'url' => '/v2/departments/{department_hash}/trays',
            'expectedResponseCode' => 200,
            'expectedResponseData' => [
                'code' => 200,
                'message' => 'Success',
                'limit' => 1000,
                'page' => 1,
                'trays' => [
                    [
                        'hash' => 'hash_test_1',
                        'name' => 'Tablar 1',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                    [
                        'hash' => 'hash_test_2',
                        'name' => 'Tablar 2',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                ]
            ],
        ];
        $chests = [
            'url' => '/v2/departments/{department_hash}/chests',
            'expectedResponseCode' => 200,
            'expectedResponseData' => [
                'code' => 200,
                'message' => 'Success',
                'limit' => 1000,
                'page' => 1,
                'chests' => [
                    [
                        'hash' => 'hash_test_1',
                        'name' => 'Kiste 1',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                    [
                        'hash' => 'hash_test_2',
                        'name' => 'Kiste 2',
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                    ],
                ]
            ],
        ];
        return [
            'Test get all storages' => $storages,
            'Test get all locations' => $locations,
            'Test get all rooms' => $rooms,
            'Test get all corridors' => $corridors,
            'Test get all shelfs' => $shelfs,
            'Test get all trays' => $trays,
            'Test get all chests' => $chests,
        ];
    }

    /**
     * Create data provider
     *
     * @return array
     */
    public function createDataProvider()
    {
        $createStorageSuccessfully = [
            'url' => '/v2/departments/{department_hash}/storages',
            'requestData' => [
                'name' => 'new storage',
                'location_hash' => 'hash_test_1',
                'corridor_hash' => 'hash_test_1',
                'shelf_hash' => 'hash_test_1',
                'tray_hash' =>'hash_test_1',
                'chest_hash' => 'hash_test_1',
            ],
            'expectedResponseCode' => 200,
            'expectedResponse' => [
                'code' => 200,
                'message' => 'Success',
                'info' =>
                    [
                        'url' => $this->baseurl('/v2/departments/hash_test_1/storages/'),
                        'message' => 'Created storage place successfully',
                    ],
            ],
            'expectedDatabaseState' => [
                'storage_place' => [
                    'id' => '5',
                    'name' => 'new storage',
                    'created_by' => 1,
                    'sl_location_hash' => 'hash_test_1',
                    'sl_corridor_hash' => 'hash_test_1',
                    'sl_shelf_hash' => 'hash_test_1',
                    'sl_tray_hash' =>'hash_test_1',
                    'sl_chest_hash' => 'hash_test_1',
                ],
            ],
            'notExpectedDatabaseState' => null,
        ];
        $createLocationSuccessfully = [
            'url' => '/v2/departments/{department_hash}/locations',
            'requestData' => [
                'name' => 'new location',
            ],
            'expectedResponseCode' => 200,
            'expectedResponse' => [
                'code' => 200,
                'message' => 'Created location successfully',
            ],
            'expectedDatabaseState' => [
                'sl_location' => [
                    'id' => '4',
                    'name' => 'new location',
                    'created_by' => 1
                ],
            ],
            'notExpectedDatabaseState' => null,
        ];
        $createRoomSuccessfully = [
            'url' => '/v2/departments/{department_hash}/rooms',
            'requestData' => [
                'name' => 'new room',
            ],
            'expectedResponseCode' => 200,
            'expectedResponse' => [
                'code' => 200,
                'message' => 'Created room successfully',
            ],
            'expectedDatabaseState' => [
                'sl_room' => [
                    'id' => '4',
                    'name' => 'new room',
                    'created_by' => 1
                ],
            ],
            'notExpectedDatabaseState' => null,
        ];
        $createCorridorSuccessfully = [
            'url' => '/v2/departments/{department_hash}/corridors',
            'requestData' => [
                'name' => 'new corridor',
            ],
            'expectedResponseCode' => 200,
            'expectedResponse' => [
                'code' => 200,
                'message' => 'Created corridor successfully',
            ],
            'expectedDatabaseState' => [
                'sl_corridor' => [
                    'id' => '4',
                    'name' => 'new corridor',
                    'created_by' => 1
                ],
            ],
            'notExpectedDatabaseState' => null,
        ];
        $createShelfSuccessfully = [
            'url' => '/v2/departments/{department_hash}/shelfs',
            'requestData' => [
                'name' => 'new shelf',
            ],
            'expectedResponseCode' => 200,
            'expectedResponse' => [
                'code' => 200,
                'message' => 'Created shelf successfully',
            ],
            'expectedDatabaseState' => [
                'sl_shelf' => [
                    'id' => '4',
                    'name' => 'new shelf',
                    'created_by' => 1
                ],
            ],
            'notExpectedDatabaseState' => null,
        ];
        $createTraySuccessfully = [
            'url' => '/v2/departments/{department_hash}/trays',
            'requestData' => [
                'name' => 'new tray',
            ],
            'expectedResponseCode' => 200,
            'expectedResponse' => [
                'code' => 200,
                'message' => 'Created tray successfully',
            ],
            'expectedDatabaseState' => [
                'sl_tray' => [
                    'id' => '4',
                    'name' => 'new tray',
                    'created_by' => 1
                ],
            ],
            'notExpectedDatabaseState' => null,
        ];
        $createChestSuccessfully = [
            'url' => '/v2/departments/{department_hash}/chests',
            'requestData' => [
                'name' => 'Pandoras box',
            ],
            'expectedResponseCode' => 200,
            'expectedResponse' => [
                'code' => 200,
                'message' => 'Created chest successfully',
            ],
            'expectedDatabaseState' => [
                'sl_chest' => [
                    'id' => '4',
                    'name' => 'Pandoras box',
                    'created_by' => 1
                ],
            ],
            'notExpectedDatabaseState' => null,
        ];
        return [
            'Create Storage successfully' => $createStorageSuccessfully,
            'Create Location successfully' => $createLocationSuccessfully,
            'Create Room successfully' => $createRoomSuccessfully,
            'Create Corridor successfully' => $createCorridorSuccessfully,
            'Create Shelf successfully' => $createShelfSuccessfully,
            'Create Tray successfully' => $createTraySuccessfully,
            'Create Chest Successfully' => $createChestSuccessfully,
        ];
    }

    /**
     * Hook to get all data
     *
     * @param array $data
     */
    protected function getDataHook(array $data): void
    {
        $this->hashes = [
            'storages' => [
                $data['storage_place'][0]['hash'],
                $data['storage_place'][1]['hash'],
                $data['storage_place'][2]['hash'],
            ],
            'locations' => [
                $data['sl_location'][0]['hash'],
                $data['sl_location'][1]['hash'],
                $data['sl_location'][2]['hash'],
            ],
            'rooms' => [
                $data['sl_room'][0]['hash'],
                $data['sl_room'][1]['hash'],
                $data['sl_room'][2]['hash'],
            ],
        ];
    }
}
