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
{
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
    {
        parent::__construct($container);
        $this->loginValidation = $container->get(LoginValidation::class);
        $this->secret = $container->get('settings')->get('jwt')['secret'];
        $this->userRepository = $container->get(UserRepository::class);
        $this->logger = $container->get(Logger::class);
    }

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
    {
        $json = (string)$request->getBody();
        $data = json_decode($json, true);
        $username = (string)$data['username'];
        $password = (string)$data['password'];
        $lang = (string)$request->getParam('lang');
        if ($this->loginValidation->canLogin($username, $password)) {
            $userHash = $this->userRepository->getHashByusername($username);
            $expireOffset = 60 * 15; // 15 Minutes
            $token = JWTFactory::generate($username, $userHash, $lang, $this->secret, $expireOffset);
            $expiresAt = (time() + $expireOffset) * 1000;
            $this->logger->info(sprintf('%s (ID: %s)issued a token. Expires at: %s', $username, $userHash, $expiresAt));
            return $this->json($response, ['token' => $token, 'expires_at' => $expiresAt, 'user_hash' => $userHash]);
        }
        return $this->error($response, 'Unprocessable entity', 422, ['message' => __('Invalid user data')]);
    }
}
