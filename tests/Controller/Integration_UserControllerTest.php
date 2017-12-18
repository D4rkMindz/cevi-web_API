<?php

namespace App\Test\Controller;

use App\Controller\UserController;
use App\Factory\JsonResponseFactory;
use App\Test\Database\DbUnitBaseTest;
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
     */
    public function setUp()
    ***REMOVED***
        $this->container = app()->getContainer();
        $this->userController = new UserController($this->container);
        $this->getData();
***REMOVED***

    /**
     * Get data set.
     *
     * @return ArrayDataSet|\PHPUnit\DbUnit\DataSet\IDataSet
     */
    public function getDataSet()
    ***REMOVED***
        $this->getData();
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
     * Test indexAction method.
     *
     * @coversNothing
     * @return void
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function testGetAllUsersAction()
    ***REMOVED***
        $environment = Environment::mock([
            'REQUEST_METHOD'=> 'GET',
            'REQUEST_URI' =>'/v2/users',
        ]);
        $request = Request::createFromEnvironment($environment);
        $response = new Response();
        $actual = $this->userController->getAllUsersAction($request, $response);

        $expected = JsonResponseFactory::createSuccess(['users' => $this->data['users']]);

        $this->assertInstanceOf(Response::class, $actual);
        $this->assertSame($expected, (string)$actual->getBody());
***REMOVED***

    /**
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function testGetUserAction()
    ***REMOVED***
        $userId = $this->data['users'][0]['id'];
        $environment = Environment::mock([
            'REQUEST_METHOD'=> 'GET',
            'REQUEST_URI' =>'/v2/users/'. $userId,
        ]);
        $request = Request::createFromEnvironment($environment);
        $actual = $this->userController->getUserAction($request, new Response());
        $expected = JsonResponseFactory::createSuccess(['user'=> $this->data['users'][0]]);

        $this->assertInstanceOf(Response::class, $actual);
        $this->assertSame($expected, (string) $actual->getBody());
***REMOVED***

    private function getData(): void
    ***REMOVED***
        if (empty($this->data)) ***REMOVED***
            $this->data['users'] = require __DIR__ . '/../Database/Data/user.php';
    ***REMOVED***
***REMOVED***
***REMOVED***
