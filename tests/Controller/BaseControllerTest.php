<?php

namespace App\Test\Controller;

use App\Test\BaseTest;
use Slim\App;
use Slim\Container;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class BaseControllerTest
 */
abstract class BaseControllerTest extends BaseTest
***REMOVED***
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var Container
     */
    protected $container;

    /**
     * Set up method.
     *
     * @return void
     */
    public function setUp()
    ***REMOVED***
        $this->request = Request::createFromEnvironment(new Environment($_SERVER));
        $this->response = new Response();
        $app = app();
        $container = $app->getContainer();
        $this->container = $container;
***REMOVED***
***REMOVED***
