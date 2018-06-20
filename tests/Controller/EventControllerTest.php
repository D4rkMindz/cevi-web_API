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
//class EventControllerTest extends DbTestCase
//{
//    private $data;
//
//    public function getDataSet()
//    {
//        $testDatabase = new TestDatabase();
//        $this->data = $testDatabase->events();
//        return new ArrayDataSet($this->data);
//    }
//
//    /**
//     *
//     * @dataProvider getAllDataProvider
//     * @param string $departmentId
//     * @param int $statuscode
//     * @param array $expectedResponse
//     * @throws Exception
//     * @throws MethodNotAllowedException
//     * @throws NotFoundException
//     */
//    public function testGetAll(string $departmentId, int $statuscode, array $expectedResponse)
//    {
//        $request = $this->createRequest('GET', '/v2/departments/ ' . $departmentId . '/events');
//        $response = $this->request($request);
//        $body = (string)$response->getBody();
//        $this->assertSame($statuscode, $response->getStatusCode());
//        $this->assertJson($body);
//        $data = json_decode($body, true);
//        $this->assertSame($expectedResponse, $data);
//    }
//
//    public function getAllDataProvider()
//    {
//        return [
//            'test Get all success' => [
//                '1',
//                200,
//                []
//            ],
//        ];
//    }
//}