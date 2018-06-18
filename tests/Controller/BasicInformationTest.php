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
     * Hook to get all data
     *
     * @param array $data
     */
    protected function getDataHook(array $data): void
    ***REMOVED***
***REMOVED***
***REMOVED***
