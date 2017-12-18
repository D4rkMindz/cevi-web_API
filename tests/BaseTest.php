<?php

namespace App\Test;

use PHPUnit\Framework\TestCase;
use Slim\App;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class BaseTest
 */
abstract class BaseTest extends TestCase
***REMOVED***
    /**
     * @var App
     */
    protected $app;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    public function setUp()
    ***REMOVED***

***REMOVED***

    /**
     * Get
     *
     * @return App
     */
    public static function getApp()
    ***REMOVED***
        static $app = null;
        if ($app === null) ***REMOVED***
            $config = ['settings' => require_once __DIR__ . '/../config/config.php'];
            $app = new App();
    ***REMOVED***
        return $app;
***REMOVED***

    /**
     * Make request
     *
     * @param $method
     * @param $path
     * @param array $options
     * @return string
     */
    public function request(string $method, string $path,array $options = array())
    ***REMOVED***
        // Capture STDOUT
        ob_start();

        // Prepare a mock environment
        Environment::mock(array_merge(array(
            'REQUEST_METHOD' => $method,
            'PATH_INFO' => $path,
            'SERVER_NAME' => 'slim-test.dev',
        ), $options));

        $app = new ();
        $this->app = $app;
        $this->request = ->request();
        $this->response = $app->response();

        // Return STDOUT
        return ob_get_clean();
***REMOVED***

    public function get($path, $options = array())
    ***REMOVED***
        $this->request('GET', $path, $options);
***REMOVED***
***REMOVED***
