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
***REMOVED***

    /**
     * Get data set.
     *
     * @return ArrayDataSet|\PHPUnit\DbUnit\DataSet\IDataSet
     */
    public function getDataSet()
    ***REMOVED***
        $this->data['users'] = require __DIR__ . '/../Database/Data/user.php';
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
    public function testIndex()
    ***REMOVED***
        $environment = Environment::mock([
            'REQUEST_METHOD'=> 'GET',
            'REQUEST_URI' =>'/v2/users',
        ]);
        $request = Request::createFromEnvironment($environment);
        $response = new Response();
        $actual = $this->userController->indexAction($request, $response);

        $expected = JsonResponseFactory::createSuccess(['users' => $this->data['users']]);

        $this->assertInstanceOf(Response::class, $actual);
        $this->assertSame($expected, (string)$actual->getBody());
***REMOVED***
***REMOVED***
