<?php

namespace App\Test\Controller;

use App\Controller\IndexController;
use App\Test\Database\DbUnitBaseTest;
use PHPUnit\DbUnit\DataSet\ArrayDataSet;
use Slim\Container;

/**
 * Class IndexControllerTest
 *
 * @coversDefaultClass App\Controller\IndexController
 */
class IndexControllerTest extends DbUnitBaseTest
***REMOVED***
    /**
     * @var IndexController
     */
    private $indexController;

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
        $this->indexController = new IndexController($this->container);
***REMOVED***

    /**
     * Get data set.
     *
     * @return ArrayDataSet|\PHPUnit\DbUnit\DataSet\IDataSet
     */
    public function getDataSet()
    ***REMOVED***
        $this->data['user'] = require __DIR__ . '/../Database/Data/user.php';
        return new ArrayDataSet($this->data);
***REMOVED***

    /**
     * Test instance
     *
     * @return void
     */
    public function testInstance()
    ***REMOVED***
        $this->assertInstanceOf(IndexController::class, $this->indexController);
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
        $request = $this->container->get('container');
        $response = $this->container->get('response');
        $actual = $this->indexController->indexAction($request, $response);
        // TODO finish test
***REMOVED***
***REMOVED***
