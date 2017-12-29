<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 04.12.2017
 * Time: 21:45
 */

namespace App\Repository;


use App\Table\CityTable;
use App\Table\LanguageTable;
use App\Table\UserTable;
use Exception;
use Slim\Container;

/**
 * Class UserRepository
 */
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
     * @var CityTable
     */
    private $cityTable;

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
        $this->cityTable = $container->get(CityTable::class);
***REMOVED***

    /**
     * Get all users.
     *
     * @return array with userData
     */
    public function getUsers(): array
    ***REMOVED***
        $users = $this->userTable->getAll();
        foreach ($users as $user => $key) ***REMOVED***
            $users[$key] = $this->unsetPrecariousUserdata($user);
    ***REMOVED***

        return $users;
***REMOVED***

    /**
     * Unset precarious user data.
     *
     * @param $user
     * @return mixed
     */
    private function unsetPrecariousUserdata($user)
    ***REMOVED***
        unset($user['password']);
        $user['id'] = (int)$user['id'];
        $user['position_id'] = (int)$user['position_id'];
        $user['js_certificate'] = (bool)$user['js_certificate'];
        $user['signup_completed'] = (bool)$user['signup_completed'];
        $user['deleted'] = (bool)$user['deleted'];
        return $user;
***REMOVED***

    /**
     * Get single user.
     *
     * @param int $id
     * @return array with single user
     */
    public function getUser(int $id): array
    ***REMOVED***
        $user = $this->userTable->getById($id);
        if (empty($user)) ***REMOVED***
            return null;
    ***REMOVED***

        $user = $this->unsetPrecariousUserdata($user);

        return $user;
***REMOVED***

    /**
     * Insert user.
     *
     * @param string $email
     * @param string $firstName
     * @param string $postcode
     * @param string $username
     * @param string $password
     * @param string $langId
     * @return string last inserted user id
     */
    public function signupUser(string $email, string $firstName, string $postcode, string $username, string $password, string $langId): string
    ***REMOVED***
        $query = $this->languageTable->newSelect();
        $query->select('id')->where(['id' => $langId, 'deleted = ' => '0']);
        $row = $query->execute()->fetch('assoc');
        $languageId = !empty($row) ? $row['id'] : '';

        $query = $this->cityTable->newSelect();
        $query->select('id')->where(['number' => $postcode, 'deleted = ' => '0']);
        $row = $query->execute()->fetch('assoc');
        $cityId = !empty($row) ? (string)$row['id'] : '';

        $row = [
            'city_id' => (int)$cityId,
            'language_id' => (int)$languageId,
            'email' => $email,
            'first_name' => $firstName,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'created' => date('Y-m-d H:i:s'),
            'created_by' => 0
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
        $query = $this->userTable->newSelect();
        $query->select('username')->where(['username' => $username, 'deleted = ' => '0']);
        $row = $query->execute()->fetch();
        return empty($row);
***REMOVED***

    /**
     * Check if user exists.
     *
     * @param string $userId
     * @return bool
     */
    public function existsUser(string $userId): bool
    ***REMOVED***
        $query = $this->userTable->newSelect();
        $query->select('id')->where(['id' => $userId,'deleted = ' => '0']);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***

    /**
     * Update user.
     *
     * @param array $data
     * @param string $where
     */
    public function updateUser(array $data, string $where)
    ***REMOVED***
        $update = [];
        if (array_key_exists('city_id', $data)) ***REMOVED***
            $update['city_id'] = $data['city_id'];
    ***REMOVED***

        if (array_key_exists('language_id', $data)) ***REMOVED***
            $update['language_id'] = $data['language_id'];
    ***REMOVED***

        if (array_key_exists('department_id', $data)) ***REMOVED***
            $update['department_id'] = $data['department_id'];
    ***REMOVED***

        if (array_key_exists('posititon_id', $data)) ***REMOVED***
            $update['position_id'] = $data['position_id'];
    ***REMOVED***

        if (array_key_exists('gender_id', $data)) ***REMOVED***
            $update['gender_id'] = $data['gender_id'];
    ***REMOVED***

        if (array_key_exists('first_name', $data)) ***REMOVED***
            $update['first_name'] = $data['first_name'];
    ***REMOVED***

        if (array_key_exists('email', $data)) ***REMOVED***
            $update['email'] = $data['email'];
    ***REMOVED***

        if (array_key_exists('username', $data)) ***REMOVED***
            $update['username'] = $data['username'];
    ***REMOVED***

        if (array_key_exists('password', $data)) ***REMOVED***
            $update['password'] = $data['password'];
    ***REMOVED***

        if (array_key_exists('js_certificate', $data)) ***REMOVED***
            $update['js_certificate'] = $data['js_certificate'];
    ***REMOVED***

        if (array_key_exists('last_name', $data)) ***REMOVED***
            $update['last_name'] = $data['last_name'];
    ***REMOVED***

        if (array_key_exists('address', $data)) ***REMOVED***
            $update['address'] = $data['address'];
    ***REMOVED***

        if (array_key_exists('cevi_name', $data)) ***REMOVED***
            $update['cevi_name'] = $data['cevi_name'];
    ***REMOVED***

        if (array_key_exists('birthdate', $data)) ***REMOVED***
            $update['birthdate'] = $data['birthdate'];
    ***REMOVED***

        if (array_key_exists('phone', $data)) ***REMOVED***
            $update['phone'] = $data['phone'];
    ***REMOVED***

        if (array_key_exists('mobile', $data)) ***REMOVED***
            $update['mobile'] = $data['mobile'];
    ***REMOVED***

        $update['modified'] = date('Y-m-d H:i:s');
        $update['modified_by'] = $data['modifier'];

        $this->userTable->update($update, $where);
***REMOVED***

    /**
     * Delete user.
     *
     * @param string $userId
     * @param string $executorId
     * @return bool
     */
    public function deleteUser(string $userId, string $executorId): bool
    ***REMOVED***
        $update = [
            'deleted'=> 1,
            'deleted_by' => $executorId,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
        try ***REMOVED***
            $this->userTable->update($update, $userId);
    ***REMOVED*** catch (Exception $exception) ***REMOVED***
            return false;
    ***REMOVED***
        return true;
***REMOVED***
***REMOVED***
