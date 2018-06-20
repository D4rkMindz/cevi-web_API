<?php

namespace App\Util;


use App\Repository\UserRepository;
use Monolog\Logger;
use Slim\Container;

class Role
{
    const SUPER_ADMIN = 64;
    const ADMIN = 32;
    const SUPER_USER = 16;
    const USER = 8;
    const GUEST = 4;
    const ANONYMOUS = 2;

    /**
     * @var UserRepository
     */
    private $userRepository;

    private $allowedPaths = [];

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
    {
        $this->userRepository = $container->get(UserRepository::class);
        $this->logger = $container->get(Logger::class);
        $this->allowedPaths = $container->get('settings')->get('allowedPaths');
    }

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
    {
        $usersPermission = $this->userRepository->getPermission($userId);

        // allow user to get it's user data
        if ($this->checkAllowedRoutes($userId, $requestedPath, $method)) {
            return true;
        }
        if ($requiredLevel <= (int)$usersPermission['level']) {
            $this->logger->info(sprintf('Permission granted for %s [req: %s]', $usersPermission['level'], $requiredLevel));
            return true;
        }

        $this->logger->info(sprintf('Permission not granted for %s [req: %s]', $usersPermission['level'], $requiredLevel));
        return false;
    }

    /**
     * Check if route is available for the user without the usual permissions
     *
     * @param string $userId
     * @param string $requestedPath
     * @param string $method
     * @return bool
     */
    private function checkAllowedRoutes(string $userId, string $requestedPath, string $method): bool
    {
        $requestedPath = baseurl($requestedPath);
        foreach ($this->allowedPaths as $route) {
            $path = $route['path'];
            $path = preg_replace('/{user_id}/', $userId, $path);
            $path = preg_replace('/\//', '\/', $path);
            $regex = sprintf('/%s/', $path);
            if (preg_match($regex, $requestedPath)) {
                return in_array($method, $route['methods']);
            }
        }
        return false;
    }
}
