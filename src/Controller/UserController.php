<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Service\User\UserValidation;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

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
     * UserController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->userRepository = $container->get(UserRepository::class);
        $this->userValidation = $container->get(UserValidation::class);
***REMOVED***

    /**
     * Get all users.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function getAllUsersAction(Request $request, Response $response): Response
    ***REMOVED***
        $users = $this->userRepository->getUsers();

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
            return $this->error($response, 'Unprocessable Entity', 422, ['info' => ['message' => __('Please define user_id correctly')]]);
    ***REMOVED***
        $user = $this->userRepository->getUser($userId);
        if (empty($user)) ***REMOVED***
            return $this->error($response, __('No user found'), 404);
    ***REMOVED***

        return $this->json($response, ['user' => $user]);
***REMOVED***

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function signupAction(Request $request, Response $response): Response
    ***REMOVED***
        $data = $request->getParams();

        $email = $data['email'];
        $firstName = $data['first_name'];
        $postcode = $data['postcode'];
        $username = $data['username'];
        $password = $data['password'];
        $lang = $data['language_id'];

        $validationContext = $this->userValidation->validateSignup($email, $firstName, $postcode, $username, $password, $lang);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $this->userRepository->signupUser($email, $firstName, $postcode, $username, $password, $lang);
        $responseData = [
            'code' => 200,
            'message' => __('Signed up user successfully')
        ];

        return $this->json($response, $responseData);
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
        $data = $request->getParams();

        $validationContext = $this->userValidation->validateUpdate($data);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $this->userRepository->updateUser($data, $args['user_id']);

        $responseData = [
            'message' => __('Updated user successfully')
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
        $this->userRepository->deleteUser($args['user_id'], 0); // TODO get executor ID from token.
        return $this->json($response,[]);
***REMOVED***
***REMOVED***
