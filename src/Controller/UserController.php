<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

class UserController extends AppController
***REMOVED***
    /**
     * Send
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function indexAction(Request $request, Response $response): Response
    ***REMOVED***
        return $this->render($response,'User/user.indexAction.twig');
***REMOVED***
***REMOVED***
