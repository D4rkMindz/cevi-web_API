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
***REMOVED***
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
    ***REMOVED***
        parent::__construct($container);
        $this->userRepository = $container->get(UserRepository::class);
        $this->languageRepository = $container->get(LanguageRepository::class);
        $this->userValidation = $container->get(UserValidation::class);
        $this->mailer = $container->get(MailerInterface::class);
        $this->twig = $container->get(Twig_Environment::class);
        $this->isProduction = $container->get('settings')->get('isProduction');
***REMOVED***

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
    ***REMOVED***
        $data = $this->getLimitationParams($request);
        $users = $this->userRepository->getUsers($data['limit'], $data['page']);

        if (empty($users)) ***REMOVED***
            return $this->error($response, __('No users found'), 404);
    ***REMOVED***

        return $this->json($response, ['users' => $users]);
***REMOVED***

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
    ***REMOVED***
        $userId = (int)$request->getAttribute('route')->getArgument('user_id');
        if (!is_numeric($userId)) ***REMOVED***
            return $this->error($response, 'Unprocessable Entity', 422,
                ['message' => __('Please define user_id correctly')]);
    ***REMOVED***
        $user = $this->userRepository->getUser($userId);
        if (empty($user)) ***REMOVED***
            return $this->error($response, __('No user found'), 404);
    ***REMOVED***

        return $this->json($response, ['user' => $user]);
***REMOVED***

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
    ***REMOVED***
        $json = (string)$request->getBody();
        $data = json_decode($json, true);

        $email = $data['email'];
        $firstName = $data['first_name'];
        $lastName = $data['last_name'] ? $data['last_name'] : null;
        $ceviName = $data['cevi_name'] ? $data['cevi_name'] : null;
        $postcode = $data['postcode'];
        $username = $data['username'];
        $password = $data['password'];
        $lang = $data['language'];
        // todo implement validation if fields are correct

        $languageId = $this->languageRepository->getLanguageByAbbreviation($lang);

        $validationContext = $this->userValidation->validateSignup($email, $firstName, $lastName, $postcode, $username,
            $password, $ceviName, $languageId);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $userdata = $this->userRepository->signupUser($email, $firstName, $lastName, $postcode, $username, $password,
            $ceviName, $lang);

        $url = 'https://cevi-web.com/registration/verify/' . $userdata['token'];
        if (!$this->isProduction) ***REMOVED***
            $url = 'http://localhost:4200/registration/verify/' . $userdata['token'];
    ***REMOVED***

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
            'user_id' => $userdata['user_id'],
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Verify email action
     *
     * @auth JWT
     * @post string email_token The token received in the email
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function verifyEmailAction(Request $request, Response $response): Response
    ***REMOVED***
        $json = (string)$request->getBody();
        $data = json_decode($json, true);
        $token = (string)$data['email_token'];
        $emailToken = $this->userRepository->getEmailTokenById($this->jwt['user_id']);
        if ($emailToken !== $token) ***REMOVED***
            return $this->json($response, ['verified' => false]);
    ***REMOVED***
        $this->userRepository->confirmEmail($this->jwt['user_id']);
        return $this->json($response, ['verified' => $json]);
***REMOVED***

    /**
     * Update user action.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function updateUserAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $json = (string)$request->getBody();
        $data = json_decode($json, true);

        $validationContext = $this->userValidation->validateUpdate($data, $this->jwt['user_id']);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $singupCompleted = $this->userRepository->updateUser($data, $args['user_id'], $this->jwt['user_id']);

        $responseData = [
            'message' => __('Updated user successfully'),
            'signup_completed' => (bool)$singupCompleted,
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Delete user action.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteUserAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        if (!$this->userRepository->deleteUser($args['user_id'], $this->jwt['user_id'])) ***REMOVED***
            $this->error($response, 'Forbidden', 403, ['message' => __('Deleting user failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('User deleted successfully')]);
***REMOVED***
***REMOVED***
