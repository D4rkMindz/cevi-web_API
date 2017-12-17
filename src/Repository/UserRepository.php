<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 04.12.2017
 * Time: 21:45
 */

namespace App\Repository;


use App\Table\LanguageTable;
use App\Table\UserTable;
use Slim\Container;

class UserRepository
***REMOVED***
    /**
     * @var UserTable
     */
    private $userTable;

    /**
     * @var LanguageTable
     */
    private $languageTable;

    /**
     * UserRepository constructor.
     *
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->userTable = $container->get(UserTable::class);
        $this->languageTable = $container->get(LanguageTable::class);
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
     * @param string $email
     * @param string $firstName
     * @param string $postcode
     * @param string $username
     * @param string $password
     * @param string $lang
     * @return string last inserted user id
     */
    public function signupUser(string $email, string $firstName, string $postcode, string $username, string $password, string $lang): string
    ***REMOVED***
        $langaugeId = $this->languageTable->getLanguageId($lang);
        $row = [
            'language_id' => $langaugeId,
            'email' => $email,
            'first_name' => $firstName,
            'postcode'=> $postcode,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ];
        return $this->userTable->insert($row);
***REMOVED***

    /**
     * Check if username already exists.
     *
     * @param string $username
     * @return bool
     */
    public function existsUsername(string $username): bool
    ***REMOVED***
        return $this->userTable->existsUsername($username);
***REMOVED***
***REMOVED***
