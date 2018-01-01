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
     * Check if user can login by username.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function checkLoginByUsername(string $username, string $password): bool
    ***REMOVED***
        $query = $this->userTable->newSelect();
        $query->select(['password'])->where(['username' => $username]);
        $row = $query->execute()->fetch('assoc');
        if (empty($row)) ***REMOVED***
            return false;
    ***REMOVED***

        return password_verify($password, $row['password']);
***REMOVED***

    /**
     * Check if user can login by email.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function checkLoginByEmail(string $email, string $password): bool
    ***REMOVED***
        $query = $this->userTable->newSelect();
        $query->select(['password'])->where(['email' => $email]);
        $row = $query->execute()->fetch('assoc');
        if (empty($row)) ***REMOVED***
            return false;
    ***REMOVED***

        return password_verify($password, $row['password']);
***REMOVED***

    /**
     * Get all users.
     *
     * @return array with userData
     */
    public function getUsers(): array
    ***REMOVED***
        $query = $this->userTable->newSelect();
        $fields = [
            'id' => 'user.id',
            'department_id' => 'user.department_id',
            'department_name' => 'department.name',
            'gender_id' => 'user.gender_id',
            'gender_name' => 'gender.name',
            'position_id' => 'user.position_id',
            'position_name_de' => 'position.name_de',
            'position_name_en' => 'position.name_en',
            'position_name_fr' => 'position.name_fr',
            'position_name_it' => 'position.name_it',
            'language_full' => 'language.name',
            'language_abbr' => 'language.abbreviation',
            'last_name' => 'user.last_name',
            'first_name' => 'user.first_name',
            'cevi_name' => 'user.cevi_name',
            'email' => 'user.email',
            'username' => 'user.username',
            'phone' => 'user.phone',
            'mobile' => 'user.mobile',
            'city_id' => 'city.id',
            'city_name_de' => 'city.title_de',
            'city_name_en' => 'city.title_en',
            'city_name_fr' => 'city.title_fr',
            'city_name_it' => 'city.title_it',
            'city_code' => 'city.number',
            'street' => 'user.address',
            'birthdate' => 'user.birthdate',
            'js_certificate' => 'user.js_certificate',
            'js_certificate_until' => 'user.js_certificate_until',
            'signup_completed' => 'user.signup_completed',
            'created' => 'user.created',
            'created_by' => 'user.created_by',
            'modified' => 'user.modified',
            'modified_by' => 'user.modified_by',
            'deleted' => 'user.deleted',
            'deleted_by' => 'user.deleted_by',
            'deleted_at' => 'user.deleted_at',
        ];
        $query->select($fields)
            ->join([
                'city' => [
                    'table' => 'city',
                    'type' => 'INNER',
                    'conditions' => 'user.city_id = city.id',
                ],
                'department' => [
                    'table' => 'department',
                    'type' => 'INNER',
                    'conditions' => 'user.department_id = department.id',
                ],
                'gender' => [
                    'table' => 'gender',
                    'type' => 'INNER',
                    'conditions' => 'user.gender_id = gender.id',
                ],
                'position' => [
                    'table' => 'position',
                    'type' => 'INNER',
                    'conditions' => 'user.position_id = position.id',
                ],
                'language' => [
                    'table' => 'language',
                    'type' => 'INNER',
                    'conditions' => 'user.language_id = language.id',
                ],
            ]);
        $users = $query->execute()->fetch('assoc');

        foreach ($users as $key => $user) ***REMOVED***
            $users[$key] = $this->formatUser($user);
    ***REMOVED***

        return $users;
***REMOVED***

    /**
     * Get single user.
     *
     * @param int $id
     * @return array with single user
     */
    public function getUser(int $id): array
    ***REMOVED***
        $query = $this->userTable->newSelect();
        $fields = [
            'id' => 'user.id',
            'department_id' => 'user.department_id',
            'department_name' => 'department.name',
            'gender_id' => 'user.gender_id',
            'gender_name' => 'gender.name',
            'position_id' => 'user.position_id',
            'position_name_de' => 'position.name_de',
            'position_name_en' => 'position.name_en',
            'position_name_fr' => 'position.name_fr',
            'position_name_it' => 'position.name_it',
            'language_full' => 'language.name',
            'language_abbr' => 'language.abbreviation',
            'last_name' => 'user.last_name',
            'first_name' => 'user.first_name',
            'cevi_name' => 'user.cevi_name',
            'email' => 'user.email',
            'username' => 'user.username',
            'phone' => 'user.phone',
            'mobile' => 'user.mobile',
            'city_id' => 'city.id',
            'city_name_de' => 'city.title_de',
            'city_name_en' => 'city.title_en',
            'city_name_fr' => 'city.title_fr',
            'city_name_it' => 'city.title_it',
            'city_code' => 'city.number',
            'street' => 'user.address',
            'birthdate' => 'user.birthdate',
            'js_certificate' => 'user.js_certificate',
            'js_certificate_until' => 'user.js_certificate_until',
            'created' => 'user.created',
            'created_by' => 'user.created_by',
            'modified' => 'user.modified',
            'modified_by' => 'user.modified_by',
            'deleted' => 'user.deleted',
            'deleted_by' => 'user.deleted_by',
            'deleted_at' => 'user.deleted_at',
        ];
        $query->select($fields)
            ->join([
                'city' => [
                    'table' => 'city',
                    'type' => 'INNER',
                    'conditions' => 'user.city_id = city.id',
                ],
                'department' => [
                    'table' => 'department',
                    'type' => 'INNER',
                    'conditions' => 'user.department_id = department.id',
                ],
                'gender' => [
                    'table' => 'gender',
                    'type' => 'INNER',
                    'conditions' => 'user.gender_id = gender.id',
                ],
                'position' => [
                    'table' => 'position',
                    'type' => 'INNER',
                    'conditions' => 'user.position_id = position.id',
                ],
                'language' => [
                    'table' => 'language',
                    'type' => 'INNER',
                    'conditions' => 'user.language_id = language.id',
                ],
            ])
            ->where(['id' => $id]);
        $user = $query->execute()->fetch('assoc');
        if (empty($user)) ***REMOVED***
            return [];
    ***REMOVED***


        return $this->formatUser($user);
***REMOVED***

    /**
     * Format user data.
     *
     * @param $user
     * @return mixed
     */
    private function formatUser($user)
    ***REMOVED***
        $tmp['id'] = (int)$user['id'];
        $tmp['department'] = [
            'id' => $user['department_id'],
            'name' => $user['department_name'],
        ];
        $tmp['position'] = [
            'name_de' => $user['position_name_de'],
            'name_en' => $user['position_name_en'],
            'name_fr' => $user['position_name_fr'],
            'name_it' => $user['position_name_it'],
        ];
        $tmp['gender'] = [
            'id' => $user['gender_id'],
            'name' => $user['gender_name'],
        ];
        $tmp['language'] = [
            'full_name' => $user['language_full'],
            'abbreviation' => $user['language_abbr'],
        ];
        $tmp['last_name'] = $user['last_name'];
        $tmp['first_name'] = $user['first_name'];
        $tmp['cevi_name'] = $user['cevi_name'];
        $tmp['email'] = $user['email'];
        $tmp['username'] = $user['username'];
        $tmp['address'] = [
            'city' => [
                'id'=> $user['city_id'],
                'name_de' => $user['city_name_de'],
                'name_en' => $user['city_name_en'],
                'name_fr' => $user['city_name_fr'],
                'name_it' => $user['city_name_it'],
            ],
            'street' => $user['street'],
        ];
        $tmp['birthdate'] = $user['birthdate'];
        $tmp['js_certificate'] = (bool)$user['js_certificate'];
        $tmp['js_certificate'] = date('Y-m-d H:i:s', $user['js_certificate_until']);
        $tmp['signup_completed'] = (bool)$user['signup_completed'];
        $tmp['url'] = baseurl('/v2/users/' . $user['id']);
        $tmp['created'] = date('Y-m-d H:i:s', $user['created']);
        $tmp['created_by'] = $user['modified_by'];
        $tmp['modified'] = date('Y-m-d H:i:s', $user['modified']);
        $tmp['modified_by'] = $user['modified_by'];
        $tmp['deleted'] = (bool)$user['deleted'];
        $tmp['deleted_by'] = (int)$user['deleted_by'];
        $tmp['deleted_at'] = date('Y-m-d H:i:s', $user['deleted_at']);
        return $tmp;
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
        $query->select('id')->where(['id' => $userId, 'deleted = ' => '0']);
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
            'deleted' => 1,
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
