<?php

namespace App\Test\Controller;

use App\Controller\UserController;
use App\Factory\JsonResponseFactory;
use App\Test\Database\DbUnitBaseTest;
use App\Test\Mockbuilder;
use PHPUnit\DbUnit\DataSet\ArrayDataSet;
use Slim\Container;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class Integration_UserControllerTest
 *
 * @coversDefaultClass App\Controller\IndexController
 * @group actual
 */
class Integration_UserControllerTest extends DbUnitBaseTest
***REMOVED***
    /**
     * @var UserController
     */
    private $userController;

    /**
     * @var Container
     */
    private $container;

    private $data = [];

    /**
     * Set up before test.
     *
     * @return void
     * @throws \Exception
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function setUp()
    ***REMOVED***
        parent::setUp();
        $this->container = app()->getContainer();
        $this->userController = new UserController($this->container);
***REMOVED***

    /**
     * Get data set.
     *
     * @return ArrayDataSet|\PHPUnit\DbUnit\DataSet\IDataSet
     */
    public function getDataSet()
    ***REMOVED***
        $this->data = Mockbuilder::User();
        return new ArrayDataSet($this->data);
***REMOVED***

    /**
     * Test instance
     *
     * @return void
     */
    public function testInstance()
    ***REMOVED***
        $this->assertInstanceOf(UserController::class, $this->userController);
***REMOVED***

    /**
     * Test get all users action.
     *
     * @coversNothing
     * @return void
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     */
    public function testGetAllUsersAction()
    ***REMOVED***
        $actual = $this->request('GET', '/v2/users');
        $expected = json_encode(JsonResponseFactory::success(['users' => $this->data['users']]));

        $this->assertInstanceOf(Response::class, $actual);
        $this->assertSame($expected, (string)$actual->getBody());
***REMOVED***

    /**
     * Test get single user action.
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     */
    public function testGetUserAction()
    ***REMOVED***
        $userId = $this->data['users'][0]['id'];

        $actual = $this->request('GET', '/v2/users/' . $userId);
        $expected = json_encode(JsonResponseFactory::success(['user' => $this->data['users'][0]]));

        $this->assertInstanceOf(Response::class, $actual);
        $this->assertSame($expected, (string)$actual->getBody());
***REMOVED***
***REMOVED***
