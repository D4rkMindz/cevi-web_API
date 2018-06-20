<?php
///**
// * Created by PhpStorm.
// * User: Björn
// * Date: 25.01.2018
// * Time: 19:09
// */
//
//namespace Controller;
//
//
//use App\Test\DbTestCase;
//use App\Test\TestDatabase;
//use PHPUnit\DbUnit\DataSet\ArrayDataSet;
//use PHPUnit\DbUnit\DataSet\IDataSet;
//
///**
// * Class DbStorageControllerTest
// */
//class DbStorageControllerTest extends DbTestCase
//{
//    private $data;
//
//    /**
//     * Get data set.
//     *
//     * @return ArrayDataSet|IDataSet
//     */
//    public function getDataSet()
//    {
//        $testDatabase = new TestDatabase();
//        $this->data = $testDatabase->storage();
//        return new ArrayDataSet($this->data);
//    }
//
//    /**
//     * @param $requestData
//     * @param $expected
//     * @param $statuscode
//     * @throws \Exception
//     * @throws \Slim\Exception\MethodNotAllowedException
//     * @throws \Slim\Exception\NotFoundException
//     *
//     * @dataProvider createStorageDataProvider
//     */
//    public function testCreateStorage($requestData, $expected, $statuscode)
//    {
//        $request = $this->createRequest('POST', '/v2/departments/1/storages', true);
//        $request = $this->withJson($request, $requestData);
//        $response = $this->request($request);
//        $body = (string)$response->getBody();
//        $this->assertJson($body);
//        $this->assertSame($statuscode, $response->getStatusCode());
//        $data = json_decode($body, true);
//        $this->assertSame($expected, $data['info']);
//        $this->assertSame($statuscode, $data['code']);
//    }
//
//    /**
//     * @param $requestData
//     * @param $expected
//     * @param $statuscode
//     * @throws \Exception
//     * @throws \Slim\Exception\MethodNotAllowedException
//     * @throws \Slim\Exception\NotFoundException
//     *
//     * @dataProvider updateStorageDataProvider
//     */
//    public function testUpdateStorage($requestData, $expected, $statuscode)
//    {
//        $request = $this->createRequest('PUT', '/v2/departments/1/storages/2', true);
//        $request = $this->withJson($request, $requestData);
//        $response = $this->request($request);
//        $body = (string)$response->getBody();
//        $this->assertJson($body);
//        $this->assertSame($statuscode, $response->getStatusCode());
//        $data = json_decode($body, true);
//        $this->assertSame($expected, $data['info']);
//        $this->assertSame($statuscode, $data['code']);
//    }
//
//    /**
//     * @return array
//     */
//    public function createStorageDataProvider()
//    {
//        return [
//            'Test with valid request data' => [
//                'requestData' => [
//                    'name' => 'A new storage',
//                    'location_id' => 1,
//                    'room_id' => 1,
//                    'corridor_id' => 1,
//                    'shelf_id' => 1,
//                    'tray_id' => null,
//                    'chest_id' => 1,
//                ],
//                'expectedResponseInfo' => [
//                    'url' => baseurl('/v2/departments/1/storages/4'),
//                    'message' => 'Created storage place successfully',
//                ],
//                200,
//            ],
//            'Test with existing storage' => [
//                'requestData' => [
//                    'name' => 'A new storage',
//                    'location_id' => 1,
//                    'room_id' => 1,
//                    'corridor_id' => 1,
//                    'shelf_id' => 1,
//                    'tray_id' => 1,
//                    'chest_id' => 1,
//                ],
//                'expectedResponseInfo' => [
//                    'message' => 'Please check your data',
//                    'errors' => [
//                        0 => [
//                            'field' => 'storage_place',
//                            'message' => 'Storage place already exists',
//                        ],
//                    ],
//                ],
//                422,
//            ],
//            'Test with non existent storages' => [
//                'requestData' => [
//                    'name' => 'A new storage',
//                    'location_id' => 1000,
//                    'room_id' => 1000,
//                    'corridor_id' => 1000,
//                    'shelf_id' => 1000,
//                    'tray_id' => 1000,
//                    'chest_id' => 1000,
//                ],
//                'expectedResponseInfo' => [
//                    'message' => 'Please check your data',
//                    'errors' => [
//                        0 => [
//                            'field' => 'location_id',
//                            'message' => 'Location does not exist',
//                        ],
//                        1 => [
//                            'field' => 'room_id',
//                            'message' => 'Room does not exist',
//                        ],
//                        2 => [
//                            'field' => 'corridor_id',
//                            'message' => 'Corridor does not exist',
//                        ],
//                        3 => [
//                            'field' => 'shelf_id',
//                            'message' => 'Shelf does not exist',
//                        ],
//                        4 => [
//                            'field' => 'tray_id',
//                            'message' => 'Tray does not exist',
//                        ],
//                        5 => [
//                            'field' => 'chest_id',
//                            'message' => 'Chest does not exist',
//                        ],
//                    ],
//                ],
//                422,
//            ],
//            'Test with all empty' => [
//                'requestData' => [
//                    'name' => 'A new storage',
//                    'location_id' => null,
//                    'room_id' => null,
//                    'corridor_id' => null,
//                    'shelf_id' => null,
//                    'tray_id' => null,
//                    'chest_id' => null,
//                ],
//                'expectedResponseInfo' => [
//                    'message' => 'Please check your data',
//                    'errors' => [
//                        0 => [
//                            'field' => 'storage_place',
//                            'message' => 'Nothing defined',
//                        ],
//                    ],
//                ],
//                422,
//            ],
//        ];
//    }
//
//    /**
//     * @return array
//     */
//    public function updateStorageDataProvider()
//    {
//        return [
//            'Test with valid request data' => [
//                'requestData' => [
//                    'name' => 'An updated storage',
//                    'location_id' => 1,
//                    'room_id' => 1,
//                    'corridor_id' => 1,
//                    'shelf_id' => 1,
//                    'tray_id' => null,
//                    'chest_id' => 1,
//                ],
//                'expectedResponseInfo' => [
//                    'message' => 'Updated storage successfully',
//                ],
//                200,
//            ],
//        ];
//    }
//}
