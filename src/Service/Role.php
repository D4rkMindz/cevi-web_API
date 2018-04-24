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

    private $allowedPaths = [
        ['path' => '/v2/users/***REMOVED***user_id***REMOVED***', 'methods' => ['GET'],],
        ['path' => '/v2/departmentgroups', 'methods' => ['GET'],],
        ['path' => '/v2/cities', 'methods' => ['GET'],],
        ['path' => '/v2/events', 'methods' => ['GET'],],
        ['path' => '/v2/user-error', 'methods' => ['GET'],],
    ];

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
     * @param string $requestedPath
     * @param string $method
     * @return bool
     */
    public function hasPermission(int $requiredLevel, string $userId, string $requestedPath, string $method): bool
    ***REMOVED***
        $usersPermission = $this->userRepository->getPermission($userId);

        // allow user to get it's user data
        if ($this->checkAllowedRoutes($userId, $requestedPath, $method)) ***REMOVED***
            return true;
    ***REMOVED***
        if ($requiredLevel <= (int)$usersPermission['level']) ***REMOVED***
            $this->logger->info(sprintf('Permission granted for %s [req: %s]', $usersPermission['level'], $requiredLevel));
            return true;
    ***REMOVED***

        $this->logger->info(sprintf('Permission not granted for %s [req: %s]', $usersPermission['level'], $requiredLevel));
        return false;
***REMOVED***

    /**
     * Check if route is available for the user without the usual permissions
     *
     * @param string $userId
     * @param string $requestedPath
     * @param string $method
     * @return bool
     */
    private function checkAllowedRoutes(string $userId, string $requestedPath, string $method): bool
    ***REMOVED***
        $requestedPath = baseurl($requestedPath);
        foreach ($this->allowedPaths as $route) ***REMOVED***
            $path = $route['path'];
            $path = preg_replace('/***REMOVED***user_id***REMOVED***/', $userId, $path);
            $path = preg_replace('/\//','\/', $path);
            $regex = sprintf('/%s/', $path);
            if (preg_match($regex, $requestedPath)) ***REMOVED***
                return in_array($method, $route['methods']);
        ***REMOVED***
    ***REMOVED***
        return false;
***REMOVED***
***REMOVED***
