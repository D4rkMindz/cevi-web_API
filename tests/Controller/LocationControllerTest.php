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
//use PHPUnit\DbUnit\DataSet\IDataSet;
//use Slim\Exception\MethodNotAllowedException;
//use Slim\Exception\NotFoundException;
//
///**
// * Class LocationControllerTest
// *
// * @coversDefaultClass App\Controller\LocationController
// */
//class LocationControllerTest extends DbTestCase
//{
//    private $data;
//
//    /**
//     * @return ArrayDataSet|IDataSet
//     */
//    public function getDataSet()
//    {
//        $testDatabase = new TestDatabase();
//        $this->data = $testDatabase->location();
//        return new ArrayDataSet($this->data);
//    }
//
//    /**
//     * Get all locations
//     *
//     * @dataProvider getAllLocationsDataProvicder
//     * @param $statuscode
//     * @param $expected
//     * @throws Exception
//     * @throws MethodNotAllowedException
//     * @throws NotFoundException
//     */
//    public function testGetAllLocationsAction($statuscode, $expected)
//    {
//        $request = $this->createRequest('GET', '/v2/departments/1/locations', true);
//        $response = $this->request($request);
//        $body = (string)$response->getBody();
//        $this->assertJson($body);
//        $this->assertSame($statuscode, $response->getStatusCode());
//        $data = json_decode($body, true);
//        $this->assertSame($expected, $data);
//    }
//
//    /**
//     * Get all
//     *
//     * @return array
//     */
//    public function getAllLocationsDataProvicder()
//    {
//        return [
//            'Test success' => [
//                200,
//                'expected response data' => [
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
//                ],
//            ]
//        ];
//    }
//}
