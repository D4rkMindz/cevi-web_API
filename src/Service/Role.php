<?php

namespace App\Service;


use App\Repository\UserRepository;
use Slim\Container;

class Role
***REMOVED***
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * Role constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->userRepository = $container->get(UserRepository::class);
***REMOVED***

    /**
     * Check if user has permission.
     *
     * @param int $requiredLevel
     * @param string $userId
     * @return bool
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function hasPermission(int $requiredLevel, string $userId): bool
    ***REMOVED***
        $usersPermission = $this->userRepository->getPermission($userId);
        if ($requiredLevel <= (int)$usersPermission['level']) ***REMOVED***
            return true;
    ***REMOVED***

        return false;
***REMOVED***
***REMOVED***
