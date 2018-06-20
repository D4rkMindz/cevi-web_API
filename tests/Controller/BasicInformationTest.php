<?php
/**
 * Created by PhpStorm.
 * User: Björn
 * Date: 16.06.2018
 * Time: 10:34
 */

namespace Controller;


use App\Test\DbTestCase;

/**
 * Class BasicInformationTest
 *
 * @coversDefaultClass \App\Controller\BasicInformationController
 */
class BasicInformationTest extends DbTestCase
***REMOVED***
    /**
     * Test get all department groups.
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @covers ::departmentGroupAction
     */
    public function testDepartmentGroup()
    ***REMOVED***
        $request = $this->createRequest('GET', '/v2/departmentgroups', false);
        $response = $this->request($request);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertResponseHasMessage('Success', $response);

        $expectedKeys = [
            'department_groups',
            'department_groups.0',
            'department_groups.0.hash',
            'department_groups.0.name_de',
            'department_groups.0.name_en',
            'department_groups.0.name_fr',
            'department_groups.0.name_it',
        ];
        $this->assertResponseHasKeys($expectedKeys, $response);

        $data = json_decode($response->getBody()->__toString(), true);
        $this->assertArrayNotHasKey('2', $data['department_groups']);
***REMOVED***

    /**
     * Test get all cities.
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @covers ::cityAction
     */
    public function testCity()
    ***REMOVED***
        $request = $this->createRequest('GET', '/v2/cities', false);
        $response = $this->request($request);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertResponseHasMessage('Success', $response);

        $expectedKeys = [
            'cities',
            'cities.0',
            // Swiss Post City Table => No Hashes Available !
            'cities.0.id',
            'cities.0.postcode',
            'cities.0.name_de',
            'cities.0.name_en',
            'cities.0.name_fr',
            'cities.0.name_it',
        ];
        $this->assertResponseHasKeys($expectedKeys, $response);

        $data = json_decode($response->getBody()->__toString(), true);
        // if the value in TestDatabase::city is increased, increase this value below!
        $this->assertArrayNotHasKey('3', $data['cities']);
***REMOVED***

    /**
     * Test get all cities as reduced array.
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @covers ::cityAction
     */
    public function testCityReduced()
    ***REMOVED***
        $request = $this->createRequest('GET', '/v2/cities?reduced=true&lang=en', false);
        $response = $this->request($request);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertResponseHasMessage('Success', $response);


        $expectedKeys = [
            'cities',
            'cities.0',
            // Swiss Post City Table => No Hashes Available !
            'cities.0.id',
            'cities.0.postcode',
            'cities.0.name',
        ];
        $this->assertResponseHasKeys($expectedKeys, $response);

        $data = json_decode($response->getBody()->__toString(), true);
        // if the value in TestDatabase::city is increased, increase this value below!
        $this->assertArrayNotHasKey('3', $data['cities']);
        $this->assertArrayNotHasKey('name_de', $data['cities'][0]);
        $this->assertArrayNotHasKey('name_en', $data['cities'][0]);
        $this->assertArrayNotHasKey('name_fr', $data['cities'][0]);
        $this->assertArrayNotHasKey('name_it', $data['cities'][0]);
***REMOVED***

    /**
     * Test events.
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @covers ::eventAction
     */
    public function testEvents()
    ***REMOVED***
        $request = $this->createRequest('GET', '/v2/events', false);
        $response = $this->request($request);
        $this->assertSame(200, $response->getStatusCode());
        $data = json_decode($response->getBody()->__toString(), true);
        $expectedResponse = [
            'code' => 200,
            'message' => 'Success',
            'limit' => 1000,
            'page' => 1,
            'until' => $data['until'],
            'description_format' => 'both',
            'department_group' => 'all',
            'department' => 'all',
            'since' => $data['since'],
            'events' =>
                [
                    [
                        'hash' => 'hash_test_1',
                        'name' => [
                            'name_de' => 'GLK',
                            'name_en' => 'GLK',
                            'name_fr' => 'GLK',
                            'name_it' => 'GLK',
                        ],
                        'price' => '123',
                        'start' => '2018-07-05 10:00:00',
                        'end' => '2018-07-12 16:00:00',
                        'end_leader' => '2018-07-12 18:00:00',
                        'start_leader' => '2018-07-05 08:00:00',
                        'created_at' => '2017-05-10 16:32:15',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                        'images' => [
                            ['hash' => 'hash_test_1', 'url' => 'C:/xampp/htdocs/cevi-web_API/vendor/phpunit/img/events/image-url-1.jpg'],
                        ],
                        'description' => [
                            'name_de' => ['plain' => 'Beschreibung des Events', 'parsed' => '<p>Beschreibung des Events</p>'],
                            'name_en' => ['plain' => 'Description of the event', 'parsed' => '<p>Description of the event</p>'],
                            'name_fr' => ['plain' => 'Description de l\'event', 'parsed' => '<p>Description de l\'event</p>'],
                            'name_it' => ['plain' => 'Descriptione della evente', 'parsed' => '<p>Descriptione della evente</p>'],
                        ],
                    ],
                    [
                        'hash' => 'hash_test_2',
                        'name' => [
                            'name_de' => 'LLM',
                            'name_en' => 'LLM',
                            'name_fr' => 'LLM',
                            'name_it' => 'LLM',
                        ],
                        'price' => '150',
                        'start' => '2018-07-05 10:00:00',
                        'end' => '2018-07-12 16:00:00',
                        'end_leader' => '2018-07-12 18:00:00',
                        'start_leader' => '2018-07-05 08:00:00',
                        'created_at' => '2017-05-10 16:32:15',
                        'created_by' => '0',
                        'modified_at' => NULL,
                        'modified_by' => NULL,
                        'archived_at' => NULL,
                        'archived_by' => NULL,
                        'images' => ['message' => 'No images available'],
                        'description' => [
                            'name_de' => ['plain' => 'Beschreibung des Events 2', 'parsed' => '<p>Beschreibung des Events 2</p>'],
                            'name_en' => ['plain' => 'Description of the event 2', 'parsed' => '<p>Description of the event 2</p>'],
                            'name_fr' => ['plain' => 'Description de l\'event 2', 'parsed' => '<p>Description de l\'event 2</p>'],
                            'name_it' => ['plain' => 'Descriptione della evente 2', 'parsed' => '<p>Descriptione della evente 2</p>'],
                        ],
                    ],
                ],
        ];
        $this->assertSame($expectedResponse, $data);
***REMOVED***

    /**
     * Hook to get all data
     *
     * @param array $data
     */
    protected function getDataHook(array $data): void
    ***REMOVED***
***REMOVED***
***REMOVED***
