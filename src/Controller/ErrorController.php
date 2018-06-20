<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class ErrorController
 */
class ErrorController extends AppController
{
    /**
     * Not found action
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function notFoundAction(Request $request, Response $response): Response
    {
        return $this->error($response, 'Not Found', 404, ['message' => __('The requested route is not available on this Server')]);
    }

    /**
     * Server error action.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function serverErrorAction(Request $request, Response $response): Response
    {
        return $this->error($response, 'Server Error', 500, ['message' => __('An error occured.')]);
    }
}
