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
     * @covers ::__constructor
     * @return void
     */
    public function testInstance()
    ***REMOVED***
        $this->assertInstanceOf(AppController::class, $this->appController);
***REMOVED***

    /**
     * Test render method
     *
     * @covers ::render
     * @return void
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function testRender()
    ***REMOVED***
        $response = $this->appController->render('Mail/mail.index.twig');
        $this->assertInstanceOf(Response::class, $response);

        $content = (string) $response->getBody();

        $twig = $this->container->get(Twig::class);
        $responseNew = $twig->render(new Response(), 'Mail/mail.index.twig');
        $expected = (string) $responseNew->getBody();

        $this->assertSame($expected, $content);
***REMOVED***
***REMOVED***