<?php

namespace App\Controller;

use App\Factory\JsonResponseFactory;
use Exception;
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
{
    protected $jwt;

    protected $secret;

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
    {
        try {
            $this->jwt = (array)$container->get('jwt_decoded')['data'];
        } catch (Exception $e) {
            //do nothing about that
        }
        try {
            $this->logger = $container->get(Logger::class);
            $this->secret = $container->get('settings')->get('jwt')['secret'];
        } catch (ContainerException $exception) {
            throw new ServerErrorException('SERVER ERROR', $container->get('request'), $container->get('response'));
        }
    }

    /**
     * Redirect to main page.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function redirectToCeviWeb(Request $request, Response $response): Response
    {
        return $response->withRedirect('https://cevi-web.com/');
    }

    /**
     * Return JSON Response.
     *
     * @param Response $response
     * @param array $data with optional key message. If message is not defined, message will be "Success"
     * @param int $status
     * @param string $message
     * @return Response
     */
    public function json(Response $response, array $data, int $status = 200, string $message = 'Success'): Response
    {
        if (empty($data)) {
            return $this->error($response, __('No data available'), 404);
        }

        if ($status === 200) {
            $message = array_key_exists('message', $data) ? $data['message'] : $message;
        } else {
            $message = array_key_exists('message', $data) ? $data['message'] : 'Error ' . $status;
        }

        $responseData = JsonResponseFactory::success($data, $status, $message);
        return $response->withJson($responseData, $status);
    }

    /**
     * Return Error JSON Response
     *
     * @param Response $response
     * @param string $message
     * @param int $status
     * @param array $info
     * @return Response
     */
    public function error(Response $response, string $message = null, int $status = 404, array $info = ['message' => 'Not Found']): Response
    {
        $message = empty($message) ? __('Not found') : $message;
        $responseData = JsonResponseFactory::error($info, $status, $message);
        return $response->withJson($responseData, $status);
    }

    /**
     * Return redirect.
     *
     * @param Response $response
     * @param string $url
     * @param int $status
     * @return Response
     */
    public function redirect(Response $response, string $url, int $status = 301): Response
    {
        return $response->withRedirect($url, $status);
    }


    /**
     * Get required params for limitation.
     *
     * @param Request $request
     * @return array
     */
    protected function getLimitationParams(Request $request): array
    {
        $data = $request->getParams();
        $params = [];
        $params['limit'] = (int)array_key_exists('limit', $data) ? $data['limit'] : 1000;
        $params['page'] = (int)array_key_exists('page', $data) ? $data['limit'] : 1;

        $params['offset'] = array_key_exists('offset', $data) ? (int)$data['offset'] : null;
        $page = round($params['offset'] / $params['limit'], 0) + 1;
        $params['page'] = !empty($params['offset']) ? $page : $params['page'];

        unset($params['offset']);
        return $params;
    }
}
