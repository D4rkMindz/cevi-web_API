<?php

namespace App\Service\User;

use App\ArrayObjects\UserArray;
use App\Table\UserTable;

/**
 * Class UserService
 */
class UserService
***REMOVED***
    /**
     * Get users as User array.
     *
     * @return UserArray
     */
    public function getUsers(): UserArray
    ***REMOVED***
        $userTable = new UserTable();
        $userEntities = $userTable->getAll();
        $users = new UserArray();
        foreach ($userEntities as $userEntity) ***REMOVED***
            $users[] = $userEntity;
    ***REMOVED***
        return $users;
***REMOVED***
***REMOVED***
