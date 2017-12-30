<?php


namespace App\Controller;


use Firebase\JWT\JWT;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class AuthenticationController extends AppController
***REMOVED***
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
***REMOVED***

    public function authenticateAction(Request $request, Response $response): Response
    ***REMOVED***
        $data = $request->getParams();
        // TODO create authentication
        /** @see https://github.com/firebase/php-jwt */
***REMOVED***
***REMOVED***
