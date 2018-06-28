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
            ],
        ];
        $corridors = [
            'url' => '/v2/departments/{department_hash}/corridors',
            'expectedResponseCode' => 200,
            'expectedResponseData' => [
                'code' => 200,
                'message' => 'Success',
            ],
        ];
        $shelfs = [
            'url' => '/v2/departments/{department_hash}/shelfs',
            'expectedResponseCode' => 200,
            'expectedResponseData' => [
                'code' => 200,
                'message' => 'Success',
            ],
        ];
        $trays = [
            'url' => '/v2/departments/{department_hash}/trays',
            'expectedResponseCode' => 200,
            'expectedResponseData' => [
                'code' => 200,
                'message' => 'Success',
            ],
        ];
        $chests = [
            'url' => '/v2/departments/{department_hash}/chests',
            'expectedResponseCode' => 200,
            'expectedResponseData' => [
                'code' => 200,
                'message' => 'Success',
            ],
        ];
        return [
            'Test get all storages' => $storages,
//            'Test get all locations' => $locations,
//            'Test get all rooms' => $rooms,
//            'Test get all corridors' => $corridors,
//            'Test get all shelfs' => $shelfs,
//            'Test get all trays' => $trays,
//            'Test get all chests' => $chests,
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
