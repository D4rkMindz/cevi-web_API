<?php

namespace App\Test\Controller;

use App\Controller\AppController;
use App\Test\BaseTest;
use Slim\Container;
use Slim\Http\Response;
use Slim\Views\Twig;

/**
 * Class AppControllerTest
 *
 * @coversDefaultClass App\Controller\AppController
 */
class AppControllerTest extends BaseTest
***REMOVED***
    /**
     * @var AppController
     */
    private $appController;

    /**
     * @var Container
     */
    private $container;

    /**
     * Set up before test.
     *
     * @return void
     */
    public function setUp()
    ***REMOVED***
        $this->container = app()->getContainer();
        $this->appController = new AppController($this->container);
***REMOVED***

    /**
     * Test AppController instance.
     *
     * @covers ::__construct
     * @return void
     */
    public function testInstance()
    ***REMOVED***
        $this->assertInstanceOf(AppController::class, $this->appController);
***REMOVED***

    /**
     * Test JSON response.
     *
     * @covers ::json
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function testJsonResponse()
    ***REMOVED***
        $data = [
            'test' => 'value',
            'value' => [
                'second' => 'val',
                'third' => 'val',
            ],
        ];

        $responseExpected = $this->container->get('response');
        $responseExpected = $responseExpected->withJson($data, 200);
        $response = $this->appController->json($data, 200);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame((string)$responseExpected->getBody(), (string)$response->getBody());
        $this->assertSame(200, $response->getStatusCode());
***REMOVED***

    /**
     * Test redirect.
     *
     * @covers ::redirect
     * @return void
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function testRedirect()
    ***REMOVED***
        $expected = $this->container->get('response');
        $expected = $expected->withRedirect('/', 301);
        $response = $this->appController->redirect('/', 301);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame((string)$expected->getBody(), (string)$response->getBody());
        $this->assertSame(301, $response->getStatusCode());
***REMOVED***
***REMOVED***
