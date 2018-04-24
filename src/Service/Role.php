<?php

namespace App\Service;


use App\Repository\UserRepository;
use Monolog\Logger;
use Slim\Container;

class Role
***REMOVED***
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * Role constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->userRepository = $container->get(UserRepository::class);
        $this->logger = $container->get(Logger::class);
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
            $this->logger->info(sprintf('Permission granted for %s [req: %s]', $usersPermission['level'], $requiredLevel));
            return true;
    ***REMOVED***

        $this->logger->info(sprintf('Permission not granted for %s [req: %s]', $usersPermission['level'], $requiredLevel));
        return false;
***REMOVED***
***REMOVED***
