<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class ErrorController
 */
class ErrorController extends AppController
***REMOVED***
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
    ***REMOVED***
        return $this->error($response, 'Not Found', 404, ['info'=> ['message'=> 'The requested route is not available on this Server']]);
***REMOVED***
***REMOVED***
