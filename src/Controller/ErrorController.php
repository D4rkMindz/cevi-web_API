<?php

namespace App\Controller;

use Slim\Http\Request;
use Slim\Http\Response;

class ErrorController extends AppController
***REMOVED***
    public function notFoundAction(Request $request, Response $response): Response
    ***REMOVED***
        return $this->render($response,'Error/error.twig');
***REMOVED***
***REMOVED***
