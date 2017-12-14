<?php

namespace App\Controller;

use Http\Client\Common\Exception\ServerErrorException;
use Interop\Container\Exception\ContainerException;
use League\Plates\Engine;
use Monolog\Logger;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Router;
use Slim\Views\Twig;
use SlimSession\Helper as SessionHelper;

/**
 * Class AppController
 */
class AppController
***REMOVED***
    /**
     * @var SessionHelper
     */
    protected $session;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * AppController constructor.
     *
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        try ***REMOVED***
            $this->session = $container->get(SessionHelper::class);
            $this->logger = $container->get(Logger::class);
    ***REMOVED*** catch (ContainerException $exception) ***REMOVED***
            throw new ServerErrorException('SERVER ERROR', $container->get('request'), $container->get('response'));
    ***REMOVED***
***REMOVED***

    /**
     * Return Error JSON Response
     *
     * @param Response $response
     * @param string $message
     * @param int $status
     * @param array $data
     * @return Response
     */
    public function error(Response $response, string $message = 'Not Found', int $status = 404,array $data = []): Response
    ***REMOVED***
        $data['message'] = $message;
        $data['code'] = $status;
        return $this->json($response, $data, $status);
***REMOVED***

    /**
     * Return JSON Response.
     *
     * @param Response $response
     * @param array $data
     * @param int $status
     * @return Response
     */
    public function json(Response $response, array $data, int $status = 200): Response
    ***REMOVED***
        if ($status === 200) ***REMOVED***
            $data['message'] = 'Success';
    ***REMOVED*** else ***REMOVED***
            $data['message'] = 'Error ' . $status;
    ***REMOVED***
        $data['code'] = $status;
        return $response->withJson($data, $status);
***REMOVED***

    /**
     * Return redirect.
     *
     * @param Response $response
     * @param string $url
     * @param int $status
     * @return Response
     */
    public function redirect(Response $response,string $url, int $status = 301): Response
    ***REMOVED***
        return $response->withRedirect($url, $status);
***REMOVED***
***REMOVED***
