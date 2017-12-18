<?php

namespace App\Test;

use PHPUnit\Framework\TestCase;
use Slim\App;
use Slim\Http\Environment;
use Slim\Http\Headers;
use Slim\Http\Request;
use Slim\Http\RequestBody;
use Slim\Http\Response;
use Slim\Http\Uri;

require_once __DIR__ . '/bootstrap.php';

/**
 * Class BaseTest
 */
abstract class BaseTest extends TestCase
***REMOVED***
    /**
     * @var Request
     */
    protected $request;

    /** @var Response */
    private $response;
    /** @var App */
    private $app;

    /**
     * Send test request.
     *
     * @param $method
     * @param $url
     * @param array $requestParameters
     * @return \Psr\Http\Message\ResponseInterface|Response
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     */
    protected function request(string $method, string $url, array $requestParameters = [])
    ***REMOVED***
        $request = $this->prepareRequest($method, $url, $requestParameters);
        $response = new Response();

        $app = app();
        $response = $app($request, $response);
        return $response;
***REMOVED***

    /**
     * Prepare request.
     *
     * @param string $method
     * @param string $url
     * @param array $requestParameters
     * @return Request
     */
    private function prepareRequest(string $method, string $url, array $requestParameters): Request
    ***REMOVED***
        $env = Environment::mock([
            'SCRIPT_NAME' => '/index.php',
            'REQUEST_URI' => $url,
            'REQUEST_METHOD' => $method,
        ]);

        $parts = explode('?', $url);

        if (isset($parts[1])) ***REMOVED***
            $env['QUERY_STRING'] = $parts[1];
    ***REMOVED***

        $uri = Uri::createFromEnvironment($env);
        $headers = Headers::createFromEnvironment($env);
        $cookies = [];

        $serverParams = $env->all();

        $body = new RequestBody();
        $body->write(json_encode($requestParameters));

        $request = new Request($method, $uri, $headers, $cookies, $serverParams, $body);

        return $request->withHeader('Content-Type', 'application/json');
***REMOVED***
***REMOVED***
