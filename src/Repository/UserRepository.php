<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 04.12.2017
 * Time: 21:45
 */

namespace App\Repository;


use App\Table\UserTable;
use Slim\Container;

class UserRepository
***REMOVED***
    /**
     * @var UserTable
     */
    public $userTable;

    /**
     * UserRepository constructor.
     *
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->userTable = $container->get(UserTable::class);
***REMOVED***

    /**
     * Get all users.
     *
     * @return array with userData
     */
    public function getUsers(): array
    ***REMOVED***
        return $this->userTable->getAll();
***REMOVED***

    /**
     * Get single user.
     *
     * @param int $id
     * @return array with single user
     */
    public function getUser(int $id): array
    ***REMOVED***
        return $this->userTable->getById($id);
***REMOVED***

    /**
     * Insert user.
     *
     * @param array $user
     * @return string last inserted user id
     */
    public function insertUser(array $user): string
    ***REMOVED***
        return "1";
***REMOVED***
***REMOVED***
