<?php
//
//
//namespace Controller;
//
//
//use App\Test\DbTestCase;
//use App\Test\TestDatabase;
//use Exception;
//use PHPUnit\DbUnit\DataSet\ArrayDataSet;
//use Slim\Exception\MethodNotAllowedException;
//use Slim\Exception\NotFoundException;
//
//class SlControllersTest extends DbTestCase
//***REMOVED***
//    private $data;
//
//    public function getDataSet()
//    ***REMOVED***
//        $testDatabase = new TestDatabase();
//        $this->data = $testDatabase->sl_locations();
//        return new ArrayDataSet($this->data);
//***REMOVED***
//
//    /**
//     * Test get all.
//     * @dataProvider getAllDataProvider
//     * @param string $type
//     * @param string $departmentId
//     * @param int $statuscode
//     * @param array $expectedResponse
//     * @throws Exception
//     * @throws MethodNotAllowedException
//     * @throws NotFoundException
//     */
//    public function testGetAll(string $type, string $departmentId, int $statuscode, array $expectedResponse)
//    ***REMOVED***
//        $request = $this->createRequest('GET', '/v2/departments/' . $departmentId . '/' . $type, true);
//        $response = $this->request($request);
//        $body = (string)$response->getBody();
//        $this->assertJson($body);
//        $this->assertSame($statuscode, $response->getStatusCode());
//        $data = json_decode($body, true);
//        $this->assertSame($expectedResponse, $data);
//***REMOVED***
//
//    /**
//     * Test insert all.
//     *
//     * @dataProvider createAllDataProvider
//     * @param string $type
//     * @param array $requestData
//     * @param int $statuscode
//     * @param array $expectedResponse
//     * @throws Exception
//     * @throws MethodNotAllowedException
//     * @throws NotFoundException
//     */
//    public function testCreateAll(string $type, array $requestData, int $statuscode, array $expectedResponse)
//    ***REMOVED***
//        $request = $this->createRequest('POST', '/v2/departments/1/' . $type, true);
//        $request = $this->withJson($request, $requestData);
//        $response = $this->request($request);
//        $body = (string)$response->getBody();
//        $this->assertJson($body);
//        $this->assertSame($statuscode, $response->getStatusCode());
//        $data = json_decode($body, true);
//        $this->assertSame($expectedResponse, $data);
//***REMOVED***
//
//    /**
//     * Test modify all
//     *
//     * @dataProvider updateAllDataProvider
//     * @param string $departmentId
//     * @param string $type
//     * @param string $elementId
//     * @param array $requestData
//     * @param int $statuscode
//     * @param array $expectedResponse
//     * @throws Exception
//     * @throws MethodNotAllowedException
//     * @throws NotFoundException
//     */
//    public function testUpdateAll(string $departmentId, string $type, string $elementId, array $requestData, int $statuscode, array $expectedResponse)
//    ***REMOVED***
//        $request = $this->createRequest('PUT', '/v2/departments/' . $departmentId . '/' . $type . '/' . $elementId, true);
//        $request = $this->withJson($request, $requestData);
//        $response = $this->request($request);
//        $body = (string)$response->getBody();
//        $this->assertJson($body);
//        $this->assertSame($statuscode, $response->getStatusCode());
//        $data = json_decode($body, true);
//        $this->assertSame($expectedResponse, $data);
//***REMOVED***
//
//    /**
//     * Test delete.
//     *
//     * @dataProvider deleteDataProvider
//     * @param string $departmentId
//     * @param string $type
//     * @param string $elementId
//     * @param int $statuscode
//     * @param array $expectedResponse
//     * @throws Exception
//     * @throws MethodNotAllowedException
//     * @throws NotFoundException
//     */
//    public function testDelete(string $departmentId, string $type, string $elementId, int $statuscode, array $expectedResponse)
//    ***REMOVED***
//        $request = $this->createRequest('DELETE', '/v2/departments/' . $departmentId . '/' . $type . '/' . $elementId, true);
//        $response = $this->request($request);
//        $body = (string)$response->getBody();
//        $this->assertJson($body);
//        $this->assertSame($statuscode, $response->getStatusCode());
//        $data = json_decode($body, true);
//        $this->assertSame($expectedResponse, $data);
//***REMOVED***
//
//    public function getAllDataProvider()
//    ***REMOVED***
//        return [
//            'sl_location Test success' => [
//                'locations',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Success',
//                    'limit' => 1000,
//                    'page' => 1,
//                    'locations' => [
//                        0 => [
//                            'id' => '1',
//                            'name' => 'Ort 1',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                        1 => [
//                            'id' => '2',
//                            'name' => 'Ort 2',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                    ],
//                ]
//            ],
//            'sl_location Test department without storages' => [
//                'locations',
//                '4',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'No locations found',
//                    ]
//                ]
//            ],
//            'sl_location Test not existing department' => [
//                'locations',
//                '1000',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ]
//                ]
//            ],
//            'sl_room Test success' => [
//                'rooms',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Success',
//                    'limit' => 1000,
//                    'page' => 1,
//                    'rooms' => [
//                        0 => [
//                            'id' => '1',
//                            'name' => 'Raum 1',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                        1 => [
//                            'id' => '2',
//                            'name' => 'Raum 2',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                    ],
//                ]
//            ],
//            'sl_room Test department without storages' => [
//                'rooms',
//                '4',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'No rooms found',
//                    ]
//                ]
//            ],
//            'sl_room Test not existing department' => [
//                'rooms',
//                '1000',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ]
//                ]
//            ],
//            'sl_corridor Test success' => [
//                'corridors',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Success',
//                    'limit' => 1000,
//                    'page' => 1,
//                    'corridors' => [
//                        0 => [
//                            'id' => '1',
//                            'name' => 'Korridor 1',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                        1 => [
//                            'id' => '2',
//                            'name' => 'Korridor 2',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                    ],
//                ]
//            ],
//            'sl_corridor Test department without storages' => [
//                'corridors',
//                '4',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'No corridors found',
//                    ]
//                ]
//            ],
//            'sl_corridor Test not existing department' => [
//                'corridors',
//                '1000',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ]
//                ]
//            ],
//            'sl_shelf Test success' => [
//                'shelfs',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Success',
//                    'limit' => 1000,
//                    'page' => 1,
//                    'shelfs' => [
//                        0 => [
//                            'id' => '1',
//                            'name' => 'Regal 1',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                        1 => [
//                            'id' => '2',
//                            'name' => 'Regal 2',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                    ],
//                ]
//            ],
//            'sl_shelf Test department without storages' => [
//                'shelfs',
//                '4',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'No shelfs found',
//                    ]
//                ]
//            ],
//            'sl_shelf Test not existing department' => [
//                'shelfs',
//                '1000',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ]
//                ]
//            ],
//            'sl_tray Test success' => [
//                'trays',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Success',
//                    'limit' => 1000,
//                    'page' => 1,
//                    'trays' => [
//                        0 => [
//                            'id' => '1',
//                            'name' => 'Tablar 1',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                        1 => [
//                            'id' => '2',
//                            'name' => 'Tablar 2',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                    ],
//                ]],
//            'sl_tray Test department without storages' => [
//                'trays',
//                '4',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'No trays found',
//                    ]
//                ]
//            ],
//            'sl_trays Test not existing department' => [
//                'trays',
//                '1000',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ]
//                ]
//            ],
//            'sl_chest Test success' => [
//                'chests',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Success',
//                    'limit' => 1000,
//                    'page' => 1,
//                    'chests' => [
//                        0 => [
//                            'id' => '1',
//                            'name' => 'Kiste 1',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                        1 => [
//                            'id' => '2',
//                            'name' => 'Kiste 2',
//                            'created_at' => '2017-01-01 00:00:00',
//                            'created_by' => '1',
//                            'modified_at' => NULL,
//                            'modified_by' => NULL,
//                            'archived_at' => NULL,
//                            'archived_by' => NULL,
//                        ],
//                    ],
//                ]
//            ],
//            'sl_chest Test department without storages' => [
//                'chests',
//                '4',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'No chests found',
//                    ]
//                ]
//            ],
//            'sl_chests Test not existing department' => [
//                'chests',
//                '1000',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ]
//                ]
//            ],
//        ];
//***REMOVED***
//
//    public function createAllDataProvider()
//    ***REMOVED***
//        return [
//            'sl_location Test insert success' => [
//                'locations',
//                [
//                    'name' => 'New name',
//                ],
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Created location successfully',
//                ]
//            ],
//            'sl_location Test name too short' => [
//                'locations',
//                [
//                    'name' => 'ab',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too short',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_location Test name too long' => [
//                'locations',
//                [
//                    'name' => 'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too long',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_location Test name empty' => [
//                'locations',
//                [
//                    'name' => '',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'Required',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_room Test insert success' => [
//                'rooms',
//                [
//                    'name' => 'New name',
//                ],
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Created room successfully',
//                ]
//            ],
//            'sl_room Test name too short' => [
//                'rooms',
//                [
//                    'name' => 'ab',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too short',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_room Test name too long' => [
//                'rooms',
//                [
//                    'name' => 'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too long',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_room Test name empty' => [
//                'rooms',
//                [
//                    'name' => '',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'Required',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_corridor Test insert success' => [
//                'corridors',
//                [
//                    'name' => 'New name',
//                ],
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Created corridor successfully',
//                ]
//            ],
//            'sl_corridor Test name too short' => [
//                'corridors',
//                [
//                    'name' => 'ab',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too short',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_corridor Test name too long' => [
//                'corridors',
//                [
//                    'name' => 'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too long',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_corridor Test name empty' => [
//                'corridors',
//                [
//                    'name' => '',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'Required',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_shelf Test insert success' => [
//                'shelfs',
//                [
//                    'name' => 'New name',
//                ],
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Created shelf successfully',
//                ]
//            ],
//            'sl_shelf Test name too short' => [
//                'shelfs',
//                [
//                    'name' => 'ab',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too short',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_shelf Test name too long' => [
//                'shelfs',
//                [
//                    'name' => 'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too long',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_shelf Test name empty' => [
//                'shelfs',
//                [
//                    'name' => '',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'Required',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_tray Test insert success' => [
//                'trays',
//                [
//                    'name' => 'New name',
//                ],
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Created tray successfully',
//                ]
//            ],
//            'sl_tray Test name too short' => [
//                'trays',
//                [
//                    'name' => 'ab',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too short',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_tray Test name too long' => [
//                'trays',
//                [
//                    'name' => 'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too long',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_tray Test name empty' => [
//                'trays',
//                [
//                    'name' => '',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'Required',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_chest Test insert success' => [
//                'chests',
//                [
//                    'name' => 'New name',
//                ],
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Created chest successfully',
//                ]
//            ],
//            'sl_chest Test name too short' => [
//                'chests',
//                [
//                    'name' => 'ab',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too short',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_chest Test name too long' => [
//                'chests',
//                [
//                    'name' => 'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too long',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//            'sl_chest Test name empty' => [
//                'chests',
//                [
//                    'name' => '',
//                ],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'Required',
//                            ],
//                        ],
//                    ],
//                ]
//            ],
//        ];
//***REMOVED***
//
//    public function updateAllDataProvider()
//    ***REMOVED***
//        return [
//            'sl_location Test modify success' => [
//                '1',
//                'locations',
//                '1',
//                ['name' => 'Updated name'],
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Updated location successfully',
//                ],
//            ],
//            'sl_location Test modify name too short' => [
//                '1',
//                'locations',
//                '1',
//                ['name' => 'ab'],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too short',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//            'sl_location Test modify name too long' => [
//                '1',
//                'locations',
//                '1',
//                ['name' => 'abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ 0123456789'],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'too long',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//            'sl_location Test modify name empty' => [
//                '1',
//                'locations',
//                '1',
//                ['name' => ''],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'name',
//                                'message' => 'Required',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//            'sl_location Test modify not existing department' => [
//                '1000',
//                'locations',
//                '1',
//                ['name' => 'abcde'],
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ]
//                ],
//            ],
//            'sl_location Test modify not existing location' => [
//                '1',
//                'locations',
//                '100',
//                ['name' => 'abcde'],
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'storage_id',
//                                'message' => 'Storage not found',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//        ];
//***REMOVED***
//
//    public function deleteDataProvider()
//    ***REMOVED***
//        return [
//            'sl_location Test delete success' => [
//                '1',
//                'locations',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Deleted location successfully',
//                ],
//            ],
//            'sl_location Test delete not existing department' => [
//                '1000',
//                'locations',
//                '1',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ],
//                ],
//            ],
//            'sl_location Test delete not existing storage' => [
//                '1',
//                'locations',
//                '1000',
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'storage_id',
//                                'message' => 'Storage not found',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//            'sl_room Test delete success' => [
//                '1',
//                'rooms',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Deleted room successfully',
//                ],
//            ],
//            'sl_room Test delete not existing department' => [
//                '1000',
//                'rooms',
//                '1',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ],
//                ],
//            ],
//            'sl_room Test delete not existing storage' => [
//                '1',
//                'rooms',
//                '1000',
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'storage_id',
//                                'message' => 'Storage not found',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//            'sl_corridor Test delete success' => [
//                '1',
//                'corridors',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Deleted corridor successfully',
//                ],
//            ],
//            'sl_corridor Test delete not existing department' => [
//                '1000',
//                'corridors',
//                '1',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ],
//                ],
//            ],
//            'sl_corridor Test delete not existing storage' => [
//                '1',
//                'corridors',
//                '1000',
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'storage_id',
//                                'message' => 'Storage not found',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//            'sl_shelf Test delete success' => [
//                '1',
//                'shelfs',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Deleted shelf successfully',
//                ],
//            ],
//            'sl_shelf Test delete not existing department' => [
//                '1000',
//                'shelfs',
//                '1',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ],
//                ],
//            ],
//            'sl_shelf Test delete not existing storage' => [
//                '1',
//                'shelfs',
//                '1000',
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'storage_id',
//                                'message' => 'Storage not found',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//            'sl_tray Test delete success' => [
//                '1',
//                'trays',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Deleted tray successfully',
//                ],
//            ],
//            'sl_tray Test delete not existing department' => [
//                '1000',
//                'trays',
//                '1',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ],
//                ],
//            ],
//            'sl_tray Test delete not existing storage' => [
//                '1',
//                'trays',
//                '1000',
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'storage_id',
//                                'message' => 'Storage not found',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//            'sl_chest Test delete success' => [
//                '1',
//                'chests',
//                '1',
//                200,
//                [
//                    'code' => 200,
//                    'message' => 'Deleted chest successfully',
//                ],
//            ],
//            'sl_chest Test delete not existing department' => [
//                '1000',
//                'chests',
//                '1',
//                404,
//                [
//                    'code' => 404,
//                    'message' => 'Not found',
//                    'info' => [
//                        'message' => 'Department not found',
//                    ],
//                ],
//            ],
//            'sl_chest Test delete not existing storage' => [
//                '1',
//                'chests',
//                '1000',
//                422,
//                [
//                    'code' => 422,
//                    'message' => 'Please check your data',
//                    'info' => [
//                        'message' => 'Please check your data',
//                        'errors' => [
//                            0 => [
//                                'field' => 'storage_id',
//                                'message' => 'Storage not found',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//        ];
//***REMOVED***
//***REMOVED***
