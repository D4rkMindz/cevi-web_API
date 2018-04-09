<?php


namespace App\Controller;


use App\Factory\JWTFactory;
use App\Repository\UserRepository;
use App\Service\Login\LoginValidation;
use Monolog\Logger;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class AuthenticationController extends AppController
***REMOVED***
    /**
     * @var LoginValidation
     */
    private $loginValidation;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var Logger
     */
    protected $logger;

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
        $this->logger = $container->get(Logger::class);
***REMOVED***

    /**
     * Get JWT token.
     *
     * @auth none
     * @post username
     * @post password
     * @post lang
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
        $json = (string)$request->getBody();
        $data = json_decode($json, true);
        $username = (string)$data['username'];
        $password = (string)$data['password'];
        $lang = (string)$request->getParam('lang');
        if ($this->loginValidation->canLogin($username, $password)) ***REMOVED***
            $userId = $this->userRepository->getIdByusername($username);
            $expireOffset = 60 * 60 * 8;
            $token = JWTFactory::generate($username, $userId, $lang, $this->secret, $expireOffset);
            $expiresAt = (time() + $expireOffset) * 1000;
            $this->logger->info(sprintf('%s (ID: %s)issued a token. Expires at: %s', $username, $userId, $expiresAt));
            return $this->json($response, ['token' => $token, 'expires_at' => $expiresAt, 'user_id' => $userId]);
    ***REMOVED***
        return $this->error($response, 'Unprocessable entity', 422, ['message' => __('invalid user data')]);
***REMOVED***
***REMOVED***
