<?php

namespace App\Test;

use App\Factory\JWTFactory;
use App\Service\Mail\MailerInterface;
use App\Test\Mock\MockMailer;
use Exception;
use App\Test\Mock\MockLogger;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Slim\App;
use Slim\Container;
use Slim\Exception\MethodNotAllowedException;
use Slim\Exception\NotFoundException;
use Slim\Http\Environment;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\RequestBody;
use Slim\Http\Response;
use Slim\Http\UploadedFile;
use Slim\Http\Uri;

/**
 * Class ApiTestCase
 */
abstract class ApiTestCase extends TestCase
***REMOVED***
    /**
     * @var App|null
     */
    protected $app;

    /**
     * Set up method.
     *
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function setUp()
    ***REMOVED***
        $this->app = require __DIR__ . '/../config/bootstrap.php';
***REMOVED***

    /**
     * Tear down method
     *
     * @return void
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function tearDown()
    ***REMOVED***
        $this->app = null;
***REMOVED***

    /**
     * Create mock request.
     *
     * @param string $method
     * @param string $url
     * @param bool $withJwt
     * @param array $jwtAuthUser
     * @return Request
     */
    protected function createRequest(string $method, string $url, bool $withJwt = true, $jwtAuthUser = ['users' => 'test_user', 'id' => 1, 'lang' => 'en', 'scope' => '/']): Request
    ***REMOVED***
        $env = Environment::mock();
        $uri = Uri::createFromString('http://localhost' . $url);
        $headers = Headers::createFromEnvironment($env);
        $cookies = [];
        $serverParams = $env->all();
        $body = new RequestBody();
        $uploadedFiles = UploadedFile::createFromEnvironment($env);

        $request = new Request($method, $uri, $headers, $cookies, $serverParams, $body, $uploadedFiles);

        if ($withJwt) ***REMOVED***
            $secret = $this->getContainer()->get('settings')->get('jwt')['secret'];
            $token = JWTFactory::generate($jwtAuthUser['users'], $jwtAuthUser['id'], $jwtAuthUser['lang'], $secret, 60 * 60 * 8, $jwtAuthUser['scope']);
            $request = $request->withHeader('X-Token', $token);
    ***REMOVED***

        return $request;
***REMOVED***

    /**
     * Make silent request.
     *
     * @param Request $request
     * @return Response
     * @throws Exception
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     */
    protected function request(Request $request): Response
    ***REMOVED***
        $container = $this->getContainer();
        $this->setFrozenValueInContainer($container, 'request', $request);
        $this->setFrozenValueInContainer($container, 'response', new Response());
        $container[MailerInterface::class] = function () ***REMOVED***
            return new MockMailer();
    ***REMOVED***;
        $container[Logger::class] = function () ***REMOVED***
            return new MockLogger();
    ***REMOVED***;
        $container[Logger::class . '_request'] = function() ***REMOVED***
            return new MockLogger();
    ***REMOVED***;
        $container[Logger::class . '_error'] = function () ***REMOVED***
            return new MockLogger();
    ***REMOVED***;
        $container[Logger::class . '_debug'] = function () ***REMOVED***
            return new MockLogger();
    ***REMOVED***;

        $response = $this->app->run(true);

        return $response;
***REMOVED***

    /**
     * Set container.
     *
     * @param Container $container
     * @param string $key
     * @param $value
     * @return void
     */
    protected function setFrozenValueInContainer(Container $container, string $key, $value)
    ***REMOVED***
        $class = new ReflectionClass(\Pimple\Container::class);
        $property = $class->getProperty('frozen');
        $property->setAccessible(true);
        $values = $property->getValue($container);
        unset($values[$key]);
        $property->setValue($container, $values);
        $container[$key] = $value;
***REMOVED***

    /**
     * Get container object for tests.
     *
     * @return Container
     */
    protected function getContainer(): Container
    ***REMOVED***
        $container = $this->app->getContainer();

        return $container;
***REMOVED***

    /**
     * Add post data to request.
     *
     * @param Request $request
     * @param array $data
     * @return Request
     */
    protected function withFormData(Request $request, array $data): Request
    ***REMOVED***
        if ($request->getMethod() == 'GET') ***REMOVED***
            $request = $request->withMethod('POST');
    ***REMOVED***

        if (!empty($data)) ***REMOVED***
            $request = $request->withParsedBody($data);
    ***REMOVED***
        $request = $request->withHeader('Content-Type', 'application/x-www-form-urlencoded');

        return $request;
***REMOVED***

    /**
     * Add JSON body to request
     *
     * @param Request $request
     * @param array $data
     * @return Request
     */
    protected function withJson(Request $request, array $data): Request
    ***REMOVED***
        $body = $request->getBody();
        $body->write(json_encode($data));
        $request = $request->withHeader('Content-Type', 'application/json');

        return $request->withBody($body);
***REMOVED***
***REMOVED***
