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
     * @param int $level
     * @param string $userId
     * @return bool
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function hasPermission(int $level, string $userId): bool
    ***REMOVED***
        $permission = $this->userRepository->getPermission($userId);
        if ($level > (int)$permission['level']) ***REMOVED***
            return false;
    ***REMOVED***

        return true;
***REMOVED***
***REMOVED***
