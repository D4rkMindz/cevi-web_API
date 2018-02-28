<?php


namespace Controller;


use App\Test\DbTestCase;
use App\Test\TestDatabase;
use Exception;
use PHPUnit\DbUnit\DataSet\ArrayDataSet;
use Slim\Exception\MethodNotAllowedException;
use Slim\Exception\NotFoundException;

class EventControllerTest extends DbTestCase
***REMOVED***
    private $data;

    public function getDataSet()
    ***REMOVED***
        $testDatabase = new TestDatabase();
        $this->data = $testDatabase->events();
        return new ArrayDataSet($this->data);
***REMOVED***

    /**
     *
     * @dataProvider getAllDataProvider
     * @param string $departmentId
     * @param int $statuscode
     * @param array $expectedResponse
     * @throws Exception
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    public function testGetAll(string $departmentId, int $statuscode, array $expectedResponse)
    ***REMOVED***
        $request = $this->createRequest('GET', '/v2/departments/ ' . $departmentId . '/events');
        $response = $this->request($request);
        $body = (string)$response->getBody();
        $this->assertSame($statuscode, $response->getStatusCode());
        $this->assertJson($body);
        $data = json_decode($body, true);
        $this->assertSame($expectedResponse, $data);
***REMOVED***

    public function getAllDataProvider()
    ***REMOVED***
        return [
            'test Get all success' => [
                '1',
                200,
                []
            ],
        ];
***REMOVED***
***REMOVED***