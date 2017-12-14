<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Slim\Container;
use Slim\Exception\MethodNotAllowedException;
use Slim\Http\Request;
use Slim\Http\Response;

class UserController extends AppController
***REMOVED***
    /**
     * @var UserRepository;
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->userRepository = $container->get(UserRepository::class);
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
        return $this->json($response, ['users'=> $users]);
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
        return $this->json($response, ['user'=> $user]);
***REMOVED***
***REMOVED***
