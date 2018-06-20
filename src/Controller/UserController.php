<?php

namespace App\Controller;

use App\Repository\LanguageRepository;
use App\Repository\UserRepository;
use App\Service\Mail\MailerInterface;
use App\Service\User\UserValidation;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use Twig_Environment;

/**
 * UserController
 */
class UserController extends AppController
{
    /**
     * @var UserRepository;
     */
    private $userRepository;

    /**
     * @var UserValidation
     */
    private $userValidation;

    /**
     * @var MailerInterface
     */
    private $mailer;

    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * @var LanguageRepository
     */
    private $languageRepository;

    /**
     * @var boolean
     */
    private $isProduction;

    /**
     * UserController constructor.
     *
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->userRepository = $container->get(UserRepository::class);
        $this->languageRepository = $container->get(LanguageRepository::class);
        $this->userValidation = $container->get(UserValidation::class);
        $this->mailer = $container->get(MailerInterface::class);
        $this->twig = $container->get(Twig_Environment::class);
        $this->isProduction = $container->get('settings')->get('isProduction');
    }

    /**
     * Get all users.
     *
     * @auth JWT
     * @get int|string limit
     * @get int|string page
     * @get int|string offset
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function getAllUsersAction(Request $request, Response $response): Response
    {
        $data = $this->getLimitationParams($request);
        $users = $this->userRepository->getUsers($data['limit'], $data['page']);

        if (empty($users)) {
            return $this->error($response, __('No users found'), 404);
        }

        return $this->json($response, ['users' => $users]);
    }

    /**
     * Get single user.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function getUserAction(Request $request, Response $response): Response
    {
        $userHash = (string)$request->getAttribute('route')->getArgument('user_hash');
        $user = $this->userRepository->getUser($userHash);
        if (empty($user)) {
            return $this->error($response, __('No user found'), 404);
        }

        return $this->json($response, ['user' => $user]);
    }

    /**
     * Signup user
     *
     * @auth none
     * @post string first_name
     * @post string email
     * @post string|int postcode
     * @post string username
     * @post string password
     * @post string language abbreviation like de en fr it
     * @post string|null last_name
     * @post string|null cevi_name
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function signupAction(Request $request, Response $response): Response
    {
        $json = (string)$request->getBody();
        $data = json_decode($json, true);

        $email = array_value('email', $data);
        $firstName = array_value('first_name', $data);
        $lastName = array_value('last_name', $data);
        $ceviName = array_value('cevi_name', $data);
        $postcode = array_value('postcode', $data);
        $username = array_value('username', $data);
        $password = array_value('password', $data);
        $lang = array_value('language', $data);
        $departmentHash = array_value('department_hash', $data);

        $languageHash = $this->languageRepository->getLanguageByAbbreviation((string)$lang);

        $validationContext = $this->userValidation->validateSignup(
            (string)$email,
            (string)$firstName,
            (string)$lastName,
            (string)$postcode,
            (string)$username,
            (string)$password,
            (string)$ceviName,
            (string)$languageHash,
            (string)$departmentHash
        );
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
        }

        $signupData = $this->userRepository->signupUser(
            (string)$email,
            (string)$firstName,
            (string)$lastName,
            (string)$postcode,
            (string)$username,
            (string)$password,
            (string)$ceviName,
            (string)$languageHash,
            (string)$departmentHash
        );

        $url = 'https://cevi-web.com/registration/verify/' . $signupData['token'];
        if (!$this->isProduction) {
            $url = 'http://localhost:4200/registration/verify/' . $signupData['token'];
        }

        $templateData = [
            'url' => $url,
            'firstName' => $firstName,
            'email' => $email,
            'username' => $username,
        ];
        $template = $this->twig->render('signup.twig', $templateData);
        // Todo replace email after setting up mailgun account
        $this->mailer->sendHtml('bjoern.pfoster@gmail.com', __('CEVI Web sign up'), $template);

        $responseData = [
            'code' => 200,
            'message' => __('Signed up user successfully'),
            'user_hash' => $signupData['hash'],
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Verify email action
     *
     * @auth none
     * @post string email_token The token received in the email
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function verifyEmailAction(Request $request, Response $response): Response
    {
        $json = (string)$request->getBody();
        $data = json_decode($json, true);
        $token = (string)array_value('token', $data);
        $userHash = $this->userRepository->getUserIdByEmailToken($token);
        if (!$this->userRepository->existsUser($userHash)) {
            return $this->error($response, __('Please check your data'), 422, ['message' => __('User does not exist'), 'verified' => false]);
        }
        $this->userRepository->confirmEmail($userHash);
        return $this->json($response, ['verified' => true]);
    }

    /**
     * Update user action.
     *
     * @put null|string|int postcode
     * @put null|string language Abbreviation like de en fr it
     * @put null|string department_hash
     * @put null|string position_hash
     * @put null|string gender_hash
     * @put null|string first_name
     * @put null|string email
     * @put null|string username
     * @put null|string password
     * @put null|bool js_certificate
     * @put null|bool js_certificate_until Required if js_certificate is true. As Time
     * @put null|string last_name
     * @put null|string address
     * @put null|string cevi_name
     * @put null|string|int birthdate As Time
     * @put null|string phone
     * @put null|string mobile
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function updateUserAction(Request $request, Response $response, array $args): Response
    {
        $json = (string)$request->getBody();
        $data = json_decode($json, true);

        if (array_key_exists('language', $data)) {
            $data['language_hash'] = $this->languageRepository->getLanguageByAbbreviation($data['language']);
        }

        $validationContext = $this->userValidation->validateUpdate($data, $this->jwt['user_id']);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
        }

        $singupCompleted = $this->userRepository->updateUser($data, $args['user_hash'], $this->jwt['user_id']);

        $responseData = [
            'info' => [
                'message' => __('Updated user successfully'),
                'signup_completed' => (bool)$singupCompleted,
            ],
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Delete user action.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteUserAction(Request $request, Response $response, array $args): Response
    {
        if (!$this->userRepository->deleteUser($args['user_hash'], $this->jwt['user_id'])) {
            $this->error($response, 'Forbidden', 403, ['message' => __('Deleting user failed')]);
        }

        return $this->json($response, ['message' => __('Deleted user successfully')]);
    }
}
