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
     * Hook to get all data
     *
     * @param array $data
     */
    protected function getDataHook(array $data): void
    ***REMOVED***
***REMOVED***
***REMOVED***
