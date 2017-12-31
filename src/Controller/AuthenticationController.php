<?php


namespace App\Controller;


use App\Factory\JsonResponseFactory;
use App\Factory\JWTFactory;
use App\Service\Login\LoginValidation;
use Firebase\JWT\JWT;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class AuthenticationController extends AppController
***REMOVED***
    private $secret;

    /**
     * @var LoginValidation
     */
    private $loginValidation;

    /**
     * AuthenticationController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->loginValidation = $container->get(LoginValidation::class);
        $this->secret = $container->get('settings')->get('jwt')['secret'];
***REMOVED***

    /**
     * Get JWT token.
     *
     * @see https://github.com/firebase/php-jwt
     * @see https://github.com/tuupola/slim-jwt-auth
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function authenticateAction(Request $request, Response $response): Response
    ***REMOVED***
        $data = $request->getParams();
        $type = $data['type'] ?: 'login';
        if ($type === 'refresh') ***REMOVED***
            $jwt = $request->getHeader('X-Token');
            $data = JWT::decode($jwt, $this->secret);
    ***REMOVED***
        $username = (string)$data['username'];
        $password = (string)$data['password'];
        if ($this->loginValidation->canLogin($username, $password)) ***REMOVED***
            $tokendata = JWTFactory::generate($username);
            $token = JWT::encode($tokendata, $this->secret);
            return $response->withJson(['token' => $token]);
    ***REMOVED***
        return $response->withJson(['code' => 422, 'message' => 'Unprocessable entity', 'info' => ['message' => __('invalid user data')]], 422);//todo continue here 20171230
***REMOVED***
***REMOVED***
