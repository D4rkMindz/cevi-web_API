<?php

namespace App\Repository;


use App\Service\Formatter;
use App\Table\CityTable;
use App\Table\DepartmentTable;
use App\Table\GenderTable;
use App\Table\LanguageTable;
use App\Table\PermissionTable;
use App\Table\PositionTable;
use App\Table\UserTable;
use Cake\Database\Query;
use Exception;
use Slim\Container;

/**
 * Class UserRepository
 */
class UserRepository extends AppRepository
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
     * @var PositionTable
     */
    private $positionTable;

    /**
     * @var GenderTable
     */
    private $genderTable;

    /**
     * @var DepartmentTable
     */
    private $departmentTable;

    /**
     * @var CityTable
     */
    private $cityTable;

    /**
     * @var PermissionTable
     */
    private $permissionTable;

    /**
     * @var Formatter
     */
    private $formatter;

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
        $this->positionTable = $container->get(PositionTable::class);
        $this->genderTable = $container->get(GenderTable::class);
        $this->departmentTable = $container->get(DepartmentTable::class);
        $this->cityTable = $container->get(CityTable::class);
        $this->permissionTable = $container->get(PermissionTable::class);

        $this->formatter = new Formatter();
***REMOVED***

    /**
     * Get ID by username
     *
     * @param string $username
     * @return string
     */
    public function getIdByusername(string $username): string
    ***REMOVED***
        $query = $this->userTable->newSelect();
        $query->select('id')->where(['username' => $username]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row) ? $row['id'] : '';
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
     * @param int $limit
     * @param int $page
     * @return array with userData
     */
    public function getUsers(int $limit, int $page): array
    ***REMOVED***
        $query = $this->getUserQuery()->limit($limit)->page($page);
        $users = $query->execute()->fetchAll('assoc');

        if (empty($users)) ***REMOVED***
            return [];
    ***REMOVED***

        foreach ($users as $key => $user) ***REMOVED***
            $users[$key] = $this->formatter->formatUser($user);
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
        $userTableName = $this->userTable->getTablename();
        $query = $this->getUserQuery();
        $query->where([$userTableName . '.id' => $id]);
        $user = $query->execute()->fetch('assoc');
        if (empty($user)) ***REMOVED***
            return [];
    ***REMOVED***

        return $this->formatter->formatUser($user);
***REMOVED***

    /**
     * Get permission.
     *
     * @param string $userId
     * @return array
     */
    public function getPermission(string $userId): array
    ***REMOVED***
        $permissionTablename = $this->permissionTable->getTablename();
        $userTableName = $this->userTable->getTablename();

        $fields = [
            'id' => $permissionTablename . '.id',
            'level' => $permissionTablename . '.level',
        ];

        $query = $this->userTable->newSelect();
        $query->select($fields)->where([$userTableName . '.id' => $userId])->join([
            [
                'table' => $permissionTablename,
                'type' => 'INNER',
                'conditions' => $userTableName . '.permission_id = ' . $permissionTablename . '.id',
            ],
        ]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row) ? $row : [];
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
        $query->select('id')->where(['id' => $langId]);
        $row = $query->execute()->fetch('assoc');
        $languageId = !empty($row) ? $row['id'] : '';

        $query = $this->cityTable->newSelect();
        $query->select('id')->where(['number' => $postcode]);
        $row = $query->execute()->fetch('assoc');
        $cityId = !empty($row) ? (string)$row['id'] : '';

        $row = [
            'city_id' => (int)$cityId,
            'language_id' => (int)$languageId,
            'email' => $email,
            'first_name' => $firstName,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'created_at' => date('Y-m-d H:i:s'),
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
        $query->select('username')->where(['username' => $username]);
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
        $query->select(1)->where(['id' => $userId]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***

    /**
     * Update user.
     *
     * @param array $data
     * @param string $where
     * @param string $userId
     * @return bool true if users signup is completed
     */
    public function updateUser(array $data, string $where, string $userId): bool
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
            $update['js_certificate'] = (bool)$data['js_certificate'];
    ***REMOVED***

        if (array_key_exists('js_certificate_until', $data)) ***REMOVED***
            $update['js_certificate_until'] = date('Y-m-d H:i:s', $data['js_certificate_until']);
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
            $update['birthdate'] = date('Y-m-d H:i:s', $data['birthdate']);
    ***REMOVED***

        if (array_key_exists('phone', $data)) ***REMOVED***
            $update['phone'] = $data['phone'];
    ***REMOVED***

        if (array_key_exists('mobile', $data)) ***REMOVED***
            $update['mobile'] = $data['mobile'];
    ***REMOVED***

        $update['modified_at'] = date('Y-m-d H:i:s');
        $update['modified_by'] = $userId;

        $this->userTable->update($update, ['id' => $where], $userId);
        $query = $this->userTable->newSelect();
        $query->select('signup_completed')->where(['id' => $where]);
        $row = $query->execute()->fetch();
        if (!(bool)$row['signup_completed']) ***REMOVED***
            $fields = [
                'city_id',
                'language_id',
                'department_id',
                'position_id',
                'gender_id',
                'first_name',
                'email',
                'username',
                'js_certificate',
                'last_name',
                'address',
                'cevi_name',
                'birthdate',
                'phone',
                'mobile',
            ];
            $query->select($fields)->where(['id' => $where]);
            $row = $query->execute()->fetch('assoc');
            if (!array_search(null, $row) && !array_search('', $row)) ***REMOVED***
                $this->userTable->update(['signup_completed' => true], ['id' => $where], $userId);
                return true;
        ***REMOVED***
            return false;
    ***REMOVED***
        return true;
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
        try ***REMOVED***
            $this->userTable->archive($executorId, ['id' => $userId]);
    ***REMOVED*** catch (Exception $exception) ***REMOVED***
            return false;
    ***REMOVED***
        return true;
***REMOVED***

    /**
     * Get user query.
     *
     * @return Query
     */
    private function getUserQuery(): Query
    ***REMOVED***
        $query = $this->userTable->newSelect();

        $userTableName = $this->userTable->getTablename();
        $positionTableName = $this->positionTable->getTablename();
        $cityTableName = $this->cityTable->getTablename();
        $genderTableName = $this->genderTable->getTablename();
        $departmentTableName = $this->departmentTable->getTablename();
        $languageTableName = $this->languageTable->getTablename();

        $fields = [
            'id' => $userTableName . '.id',
            'department_id' => $userTableName . '.department_id',
            'department_name' => $departmentTableName . '.name',
            'gender_id' => $userTableName . '.gender_id',
            'gender_name_de' => $genderTableName . '.name_de',
            'gender_name_en' => $genderTableName . '.name_en',
            'gender_name_fr' => $genderTableName . '.name_fr',
            'gender_name_it' => $genderTableName . '.name_it',
            'position_id' => $userTableName . '.position_id',
            'position_name_de' => $positionTableName . '.name_de',
            'position_name_en' => $positionTableName . '.name_en',
            'position_name_fr' => $positionTableName . '.name_fr',
            'position_name_it' => $positionTableName . '.name_it',
            'language_full' => $languageTableName . '.name',
            'language_abbr' => $languageTableName . '.abbreviation',
            'last_name' => $userTableName . '.last_name',
            'first_name' => $userTableName . '.first_name',
            'cevi_name' => $userTableName . '.cevi_name',
            'email' => $userTableName . '.email',
            'username' => $userTableName . '.username',
            'phone' => $userTableName . '.phone',
            'mobile' => $userTableName . '.mobile',
            'city_id' => $cityTableName . '.id',
            'city_name_de' => $cityTableName . '.title_de',
            'city_name_en' => $cityTableName . '.title_en',
            'city_name_fr' => $cityTableName . '.title_fr',
            'city_name_it' => $cityTableName . '.title_it',
            'city_code' => $cityTableName . '.number',
            'street' => $userTableName . '.address',
            'birthdate' => $userTableName . '.birthdate',
            'js_certificate' => $userTableName . '.js_certificate',
            'js_certificate_until' => $userTableName . '.js_certificate_until',
            'signup_completed' => $userTableName . '.signup_completed',
            'created_at' => $userTableName . '.created_at',
            'created_by' => $userTableName . '.created_by',
            'modified_at' => $userTableName . '.modified_at',
            'modified_by' => $userTableName . '.modified_by',
            'archived_by' => $userTableName . '.archived_by',
            'archived_at' => $userTableName . '.archived_at',
        ];

        $query->select($fields)
            ->join([
                [
                    'table' => $cityTableName,
                    'type' => 'INNER',
                    'conditions' => $userTableName . '.city_id=' . $cityTableName . '.id',
                ],
                [
                    'table' => $departmentTableName,
                    'type' => 'INNER',
                    'conditions' => $userTableName . '.department_id=' . $departmentTableName . '.id',
                ],
                [
                    'table' => $genderTableName,
                    'type' => 'INNER',
                    'conditions' => $userTableName . '.gender_id=' . $genderTableName . '.id',
                ],
                [
                    'table' => $positionTableName,
                    'type' => 'INNER',
                    'conditions' => $userTableName . '.position_id=' . $positionTableName . '.id',
                ],
                [
                    'table' => $languageTableName,
                    'type' => 'INNER',
                    'conditions' => $userTableName . '.language_id=' . $languageTableName . '.id',
                ],
            ]);
        return $query;
***REMOVED***
***REMOVED***
