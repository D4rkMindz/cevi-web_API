<?php

namespace App\Controller;

use App\Factory\JsonResponseFactory;
use Http\Client\Common\Exception\ServerErrorException;
use Interop\Container\Exception\ContainerException;
use Monolog\Logger;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class AppController
 */
class AppController
***REMOVED***
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
            $this->logger = $container->get(Logger::class);
    ***REMOVED*** catch (ContainerException $exception) ***REMOVED***
            throw new ServerErrorException('SERVER ERROR', $container->get('request'), $container->get('response'));
    ***REMOVED***
***REMOVED***

    /**
     * Redirect to main page.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function redirectToCeviWeb(Request $request, Response $response): Response
    ***REMOVED***
        return $response->withRedirect('https://cevi-web.com/');
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
        if (empty($data)) ***REMOVED***
            return $this->error($response, __('No data available'), 404);
    ***REMOVED***

        if ($status === 200) ***REMOVED***
            $message = 'Success';
    ***REMOVED*** else ***REMOVED***
            $message = 'Error ' . $status;
    ***REMOVED***

        $responseData = JsonResponseFactory::success($data, $status, $message);
        return $response->withJson($responseData, $status);
***REMOVED***

    /**
     * Return Error JSON Response
     *
     * @param Response $response
     * @param string $message
     * @param int $status
     * @param array $info
     * @return Response
     */
    public function error(Response $response, string $message = null, int $status = 404, array $info = []): Response
    ***REMOVED***
        $message = empty($message) ? __('Not found') : $message;
        $responseData = JsonResponseFactory::error($info, $status, $message);
        return $response->withJson($responseData, $status);
***REMOVED***

    /**
     * Return redirect.
     *
     * @param Response $response
     * @param string $url
     * @param int $status
     * @return Response
     */
    public function redirect(Response $response, string $url, int $status = 301): Response
    ***REMOVED***
        return $response->withRedirect($url, $status);
***REMOVED***
***REMOVED***
