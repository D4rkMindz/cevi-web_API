<?php

namespace App\Repository;

use App\Util\Formatter;
use App\Service\Mail\MailToken;
use App\Util\PhonenumberConverter;
use App\Util\Role;
use App\Table\CityTable;
use App\Table\DepartmentTable;
use App\Table\EmailTokenTable;
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
{
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
     * @var EmailTokenTable
     */
    private $emailTokenTable;

    /**
     * UserRepository constructor.
     *
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    {
        $this->userTable = $container->get(UserTable::class);
        $this->languageTable = $container->get(LanguageTable::class);
        $this->positionTable = $container->get(PositionTable::class);
        $this->genderTable = $container->get(GenderTable::class);
        $this->departmentTable = $container->get(DepartmentTable::class);
        $this->cityTable = $container->get(CityTable::class);
        $this->permissionTable = $container->get(PermissionTable::class);
        $this->emailTokenTable = $container->get(EmailTokenTable::class);

        $this->formatter = new Formatter();
    }

    /**
     * Get ID by username
     *
     * @param string $username
     * @return string
     */
    public function getHashByusername(string $username): string
    {
        $where = ['username' => $username];
        if (is_email($username)) {
            $where = ['email' => $username];
        }
        $query = $this->userTable->newSelect();
        $query->select('hash')->where($where);
        $row = $query->execute()->fetch('assoc');

        return !empty($row) ? $row['hash'] : '';
    }

    /**
     * Check if user can login by username.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function checkLoginByUsername(string $username, string $password): bool
    {
        $query = $this->userTable->newSelect();
        $query->select(['password'])->where(['username' => $username]);
        $row = $query->execute()->fetch('assoc');
        if (empty($row)) {
            return false;
        }

        return password_verify($password, $row['password']);
    }

    /**
     * Check if user can login by email.
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function checkLoginByEmail(string $email, string $password): bool
    {
        $query = $this->userTable->newSelect();
        $query->select(['password'])->where(['email' => $email]);
        $row = $query->execute()->fetch('assoc');
        if (empty($row)) {
            return false;
        }

        return password_verify($password, $row['password']);
    }

    /**
     * Get all users.
     *
     * @param int $limit
     * @param int $page
     * @return array with userData
     */
    public function getUsers(int $limit, int $page): array
    {
        $query = $this->getUserQuery()->limit($limit)->page($page);
        $users = $query->execute()->fetchAll('assoc');

        if (empty($users)) {
            return [];
        }

        foreach ($users as $key => $user) {
            $users[$key] = $this->formatter->formatUser($user);
        }

        return $users;
    }

    /**
     * Get single user.
     *
     * @param string $hash
     * @return array with single user
     */
    public function getUser(string $hash): array
    {
        $userTableName = $this->userTable->getTablename();
        $query = $this->getUserQuery();
        $query->where([$userTableName . '.hash' => $hash]);
        $user = $query->execute()->fetch('assoc');
        if (empty($user)) {
            return [];
        }

        return $this->formatter->formatUser($user);
    }

    /**
     * Get permission.
     *
     * @param string $userId
     * @return array
     */
    public function getPermission(string $userId): array
    {
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
                'conditions' => $userTableName . '.permission_hash = ' . $permissionTablename . '.hash',
            ],
        ]);
        $row = $query->execute()->fetch('assoc');

        return !empty($row) ? $row : [];
    }

    /**
     * Insert user.
     *
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param string $postcode
     * @param string $username
     * @param string $password
     * @param string $ceviName
     * @param string $languageHash
     * @param string $departmentHash
     * @return array last inserted user id
     */
    public function signupUser(
        string $email,
        string $firstName,
        string $lastName,
        string $postcode,
        string $username,
        string $password,
        string $ceviName,
        string $languageHash,
        string $departmentHash
    ): array
    {
        $query = $this->cityTable->newSelect();
        $query->select('id')->where(['number' => $postcode]);
        $row = $query->execute()->fetch('assoc');
        $cityId = !empty($row) ? (string)$row['id'] : '';

        $query = $this->permissionTable->newSelect();
        $query->select('hash')->where(['level' => Role::ANONYMOUS]);
        $row = $query->execute()->fetch('assoc');
        $permissionHash = !empty($row) ? $row['hash'] : '';

        $row = [
            'hash' => uniqid(),
            'city_id' => (int)$cityId,
            'language_hash' => (string)$languageHash,
            'department_hash' => (string)$departmentHash,
            'email' => $email,
            'first_name' => $firstName,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'permission_hash' => $permissionHash,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => 0,
        ];

        if (!empty($lastName)) {
            $row['last_name'] = $lastName;
        }

        if (!empty($ceviName)) {
            $row['cevi_name'] = $ceviName;
        }

        $userHash = $this->userTable->insert($row, 'NOT REQUIRED');
        $emailToken = MailToken::generate();
        $emailTokenRow = [
            'user_hash' => $userHash,
            'token' => $emailToken,
        ];
        $this->emailTokenTable->insert($emailTokenRow, 0);

        $data = ['hash' => $row['hash'], 'token' => $emailTokenRow['token']];
        return $data;
    }

    /**
     * Get email token by id
     *
     * @param string $emailToken
     * @return string
     */
    public function getUserIdByEmailToken(string $emailToken): string
    {
        $query = $this->emailTokenTable->newSelect();
        $query->select(['user_hash'])
            ->where(['token' => $emailToken, 'issued_at <= ' => date('Y-m-d H:i:s')]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row) ? $row['user_hash'] : '';
    }

    /**
     * Confirm email as verified
     *
     * @param string $userHash
     * @return bool
     */
    public function confirmEmail(string $userHash): bool
    {
        return $this->userTable->modify(['email_verified' => true], ['hash' => $userHash], 0);
    }

    /**
     * Check if username already exists.
     *
     * @param string $username
     * @return bool
     */
    public function existsUsername(string $username): bool
    {
        $query = $this->userTable->newSelect();
        $query->select('username')->where(['username' => $username]);
        $row = $query->execute()->fetch();

        return empty($row);
    }

    /**
     * Check if user exists.
     *
     * @param string $userHash
     * @return bool
     */
    public function existsUser(string $userHash): bool
    {
        return $this->exists($this->userTable, ['hash' => $userHash]);
    }

    /**
     * Check if user exists by user ID.
     *
     * @param string $userId
     * @return bool
     */
    public function existsUserById(string $userId)
    {
        return $this->exists($this->userTable, ['id' => $userId]);
    }

    /**
     * Update user.
     *
     * @param array $data
     * @param string $whereHash
     * @param string $userId
     * @return bool true if users signup is completed
     */
    public function updateUser(array $data, string $whereHash, string $userId): bool
    {
        $update = [];
        if (array_key_exists('postcode', $data)) {
            $query = $this->cityTable->newSelect();
            $query->select('id')->where(['number' => $data['postcode']]);
            $row = $query->execute()->fetch('assoc');
            $cityId = !empty($row) ? $row['id'] : null;
            if (!empty($cityId)) {
                $update['city_id'] = $cityId;
            }
        }

        if (array_key_exists('language_hash', $data)) {
            $update['language_hash'] = $data['language_hash'];
        }

        if (array_key_exists('department_hash', $data)) {
            $update['department_hash'] = $data['department_hash'];
        }

        if (array_key_exists('position_hash', $data)) {
            $update['position_hash'] = $data['position_hash'];
        }

        if (array_key_exists('gender_hash', $data)) {
            $update['gender_hash'] = $data['gender_hash'];
        }

        if (array_key_exists('first_name', $data)) {
            $update['first_name'] = $data['first_name'];
        }

        if (array_key_exists('email', $data)) {
            $update['email'] = $data['email'];
        }

        if (array_key_exists('username', $data)) {
            $update['username'] = $data['username'];
        }

        if (array_key_exists('password', $data)) {
            $update['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }

        if (array_key_exists('js_certificate', $data)) {
            $update['js_certificate'] = (bool)$data['js_certificate'];
        }

        if (array_key_exists('js_certificate_until', $data)) {
            $update['js_certificate_until'] = date('Y-m-d H:i:s', $data['js_certificate_until']);
        }

        if (array_key_exists('last_name', $data)) {
            $update['last_name'] = $data['last_name'];
        }

        if (array_key_exists('address', $data)) {
            $update['address'] = $data['address'];
        }

        if (array_key_exists('cevi_name', $data)) {
            $update['cevi_name'] = $data['cevi_name'];
        }

        if (array_key_exists('birthdate', $data)) {
            $update['birthdate'] = date('Y-m-d', $data['birthdate']);
        }

        $phonenumberConverter = new PhonenumberConverter();

        if (array_key_exists('phone', $data)) {
            $update['phone'] = $phonenumberConverter->convert($data['phone']);
        }

        if (array_key_exists('mobile', $data)) {
            $update['mobile'] = $phonenumberConverter->convert($data['mobile']);
        }

        $update['modified_at'] = date('Y-m-d H:i:s');
        $update['modified_by'] = $userId;

        $this->userTable->modify($update, ['hash' => $whereHash], $userId);
        $query = $this->userTable->newSelect();
        $query->select(['signup_completed'])->where(['hash' => $whereHash]);
        $row1 = $query->execute()->fetch('assoc');
        if (!(bool)$row1['signup_completed']) {
            $fields = [
                'city_id',
                'language_hash',
                'department_hash',
                'position_hash',
                'gender_hash',
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
            $query->select($fields)->where(['hash' => $whereHash]);
            $row2 = $query->execute()->fetch('assoc');
            if (!array_search(null, $row2) && !array_search('', $row2)) {
                $this->userTable->modify(['signup_completed' => true], ['hash' => $whereHash], $userId);
                return true;
            }

            return false;
        }

        return true;
    }

    /**
     * Delete user.
     *
     * @param string $userHash
     * @param string $executorId
     * @return bool
     */
    public function deleteUser(string $userHash, string $executorId): bool
    {
        try {
            $this->userTable->archive($executorId, ['hash' => $userHash]);
        } catch (Exception $exception) {
            return false;
        }

        return true;
    }

    /**
     * Get user query.
     *
     * @return Query
     */
    private function getUserQuery(): Query
    {
        $query = $this->userTable->newSelect();

        $userTableName = $this->userTable->getTablename();
        $positionTableName = $this->positionTable->getTablename();
        $cityTableName = $this->cityTable->getTablename();
        $genderTableName = $this->genderTable->getTablename();
        $departmentTableName = $this->departmentTable->getTablename();
        $languageTableName = $this->languageTable->getTablename();

        $fields = [
            'hash' => $userTableName . '.hash',
            'department_hash' => $userTableName . '.department_hash',
            'department_name' => $departmentTableName . '.name',
            'gender_hash' => $userTableName . '.gender_hash',
            'gender_name_de' => $genderTableName . '.name_de',
            'gender_name_en' => $genderTableName . '.name_en',
            'gender_name_fr' => $genderTableName . '.name_fr',
            'gender_name_it' => $genderTableName . '.name_it',
            'position_hash' => $userTableName . '.position_hash',
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
            'email_verified' => $userTableName . '.email_verified',
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
                    'type' => 'LEFT',
                    'conditions' => $userTableName . '.city_id=' . $cityTableName . '.id',
                ],
                [
                    'table' => $departmentTableName,
                    'type' => 'LEFT',
                    'conditions' => $userTableName . '.department_hash=' . $departmentTableName . '.hash',
                ],
                [
                    'table' => $genderTableName,
                    'type' => 'LEFT',
                    'conditions' => $userTableName . '.gender_hash=' . $genderTableName . '.hash',
                ],
                [
                    'table' => $positionTableName,
                    'type' => 'LEFT',
                    'conditions' => $userTableName . '.position_hash=' . $positionTableName . '.hash',
                ],
                [
                    'table' => $languageTableName,
                    'type' => 'LEFT',
                    'conditions' => $userTableName . '.language_hash=' . $languageTableName . '.hash',
                ],
            ]);

        return $query;
    }
}
