<?php


namespace App\Controller;


use App\Factory\JWTFactory;
use App\Repository\UserRepository;
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
     * @var UserRepository
     */
    private $userRepository;

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
        $this->userRepository = $container->get(UserRepository::class);
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
            $userId = $this->userRepository->getIdByusername($username);
            $tokendata = JWTFactory::generate($username, $userId);
            $expiresAt = $tokendata['exp'];
            $token = JWT::encode($tokendata, $this->secret);
            return $this->json($response, ['token' => $token, 'expires_at' => $expiresAt]);
    ***REMOVED***
        return $this->error($response, 'Unprocessable entity', 422, ['message' => __('invalid user data')]);
***REMOVED***
***REMOVED***
