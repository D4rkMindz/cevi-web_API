<?php

namespace App\Service;


use App\Repository\UserRepository;

class Role
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
    public static function hasPermission(int $level, string $userId): bool
    ***REMOVED***
        $userRepository = app()->getContainer()->get(UserRepository::class);
        $permission = $userRepository->getPermission($userId);
        if ($level < (int)$permission['level']) ***REMOVED***
            return false;
    ***REMOVED***

        return true;
***REMOVED***
***REMOVED***
