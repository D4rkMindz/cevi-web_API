<?php


namespace App\Repository;


use App\Util\Formatter;
use App\Table\CityTable;
use App\Table\DepartmentGroupTable;
use App\Table\DepartmentTable;
use App\Table\DepartmentTypeTable;
use Cake\Database\Query;
use Exception;
use Slim\Container;

/**
 * Class DepartmentRepository
 */
class DepartmentRepository extends AppRepository
{
    /**
     * @var DepartmentTable
     */
    private $departmentTable;

    /**
     * @var CityTable
     */
    private $cityTable;

    /**
     * @var DepartmentGroupTable
     */
    private $departmentGroupTable;

    /**
     * @var DepartmentTypeTable
     */
    private $departmentTypeTable;

    /**
     * @var Formatter
     */
    private $formatter;

    /**
     * DepartmentRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    {
        $this->departmentTable = $container->get(DepartmentTable::class);
        $this->cityTable = $container->get(CityTable::class);
        $this->departmentGroupTable = $container->get(DepartmentGroupTable::class);
        $this->departmentTypeTable = $container->get(DepartmentTypeTable::class);

        $this->formatter = new Formatter();
    }

    /**
     * Check if department exists.
     *
     * @param string $departmentHash
     * @return bool true if found.
     */
    public function existsDepartment(string $departmentHash): bool
    {
        return $this->exists($this->departmentTable, ['hash' => $departmentHash]);
    }

    /**
     * Check if department exists by name.
     *
     * @param string $name
     * @return bool
     */
    public function existsDepartmentByName(string $name)
    {
        $query = $this->departmentTable->newSelect();
        $query->select(1)->where(['name LIKE' => $name]);
        $row = $query->execute()->fetch();
        return !empty($row);
    }

    /**
     * Get all departments
     *
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function getAll(int $limit, int $page)
    {
        $query = $this->getDepartmentQuery();
        $query->limit($limit)
            ->page($page);
        $departments = $query->execute()->fetchAll('assoc');

        if (empty($departments)) {
            return [];
        }

        foreach ($departments as $key => $department) {
            $departments[$key] = $this->formatter->formatDepartment($department);
        }

        return $departments;
    }

    /**
     * Get join query.
     *
     * @return Query
     */
    private function getDepartmentQuery(): Query
    {
        $departmentTableName = $this->departmentTable->getTablename();
        $cityTableName = $this->cityTable->getTablename();
        $departmentGroupTableName = $this->departmentGroupTable->getTablename();
        $departmentTypeTableName = $this->departmentTypeTable->getTablename();

        $fields = [
            'id' => $departmentTableName . '.id',
            'name' => $departmentTableName . '.name',
            'city_id' => $cityTableName . '.id',
            'city_postcode' => $cityTableName . '.number',
            'city_name_de' => $cityTableName . '.title_de',
            'city_name_en' => $cityTableName . '.title_it',
            'city_name_fr' => $cityTableName . '.title_fr',
            'city_name_it' => $cityTableName . '.title_it',
            'department_group_id' => $departmentGroupTableName . '.id',
            'department_group_name_de' => $departmentGroupTableName . '.name_de',
            'department_group_name_en' => $departmentGroupTableName . '.name_en',
            'department_group_name_fr' => $departmentGroupTableName . '.name_fr',
            'department_group_name_it' => $departmentGroupTableName . '.name_it',
            'department_type_id' => $departmentTypeTableName . '.id',
            'department_type_name_de' => $departmentTypeTableName . '.name_de',
            'department_type_name_en' => $departmentTypeTableName . '.name_en',
            'department_type_name_fr' => $departmentTypeTableName . '.name_fr',
            'department_type_name_it' => $departmentTypeTableName . '.name_it',
            'created_at' => $departmentTableName . '.created_at',
            'created_by' => $departmentTableName . '.created_by',
            'modified_at' => $departmentTableName . '.modified_at',
            'modified_by' => $departmentTableName . '.modified_by',
            'archived_at' => $departmentTableName . '.archived_at',
            'archived_by' => $departmentTableName . '.archived_by',
        ];

        $query = $this->departmentTable->newSelect();
        $query->select($fields)
            ->join([
                [
                    'table' => $cityTableName,
                    'type' => 'INNER',
                    'conditions' => $departmentTableName . '.city_id = ' . $cityTableName . '.id',
                ],
                [
                    'table' => $departmentGroupTableName,
                    'type' => 'INNER',
                    'conditions' => $departmentTableName . '.department_group_id = ' . $departmentGroupTableName . '.id',
                ],
                [
                    'table' => $departmentTypeTableName,
                    'type' => 'INNER',
                    'conditions' => $departmentTableName . '.department_type_id = ' . $departmentTypeTableName . '.id',
                ],
            ]);
        return $query;
    }

    /**
     * Get single department by ID.
     *
     * @param string $departmentId
     * @return array|false
     */
    public function getDepartment(string $departmentId)
    {
        $query = $this->getDepartmentQuery();
        $query->where([$this->departmentTable->getTablename() . '.id' => $departmentId]);
        $row = $query->execute()->fetch('assoc');
        if (empty($row)) {
            return [];
        }
        $department = $this->formatter->formatDepartment($row);
        return $department;
    }

    /**
     * Insert new department.
     *
     * @param string $name
     * @param string $postcode
     * @param string $departmentGroupId
     * @param string $departmentTypeId
     * @param string $userId
     * @return int
     */
    public function insertDepartment(string $name, string $postcode, string $departmentGroupId, string $departmentTypeId, string $userId): int
    {
        $query = $this->cityTable->newSelect();
        $query->select(['id'])->where(['number' => $postcode]);
        $row = $query->execute()->fetch('assoc');
        $cityId = $row['id'];
        $data = [
            'department_group_id' => $departmentGroupId,
            'department_type_id' => $departmentTypeId,
            'city_id' => $cityId,
            'name' => $name,
        ];
        $lastInsertedId = $this->departmentTable->insert($data, $userId);

        return $lastInsertedId;
    }

    /**
     * Update department.
     *
     * @param string $departmentId
     * @param string $name
     * @param string $postcode
     * @param string $departmentGroupId
     * @param string $departmentTypeId
     * @param string $userId
     * @return bool
     */
    public function updateDepartment(string $departmentId, string $name, string $postcode, string $departmentGroupId, string $departmentTypeId, string $userId): bool
    {
        $row = [
            'modified_at' => date('Y-m-d H:i:s'),
            'modified_by' => $userId,
        ];

        if (!empty($name)) {
            $row['name'] = $name;
        }

        if (!empty($postcode)) {
            $cityId = $this->cityTable->newSelect()->select(['id'])->where(['number' => $postcode]);
            $row['city_id'] = $cityId;
        }

        if (!empty($departmentGroupId)) {
            $row['department_group_id'] = $departmentGroupId;
        }

        if (!empty($departmentTypeId)) {
            $row['department_type_id'] = $departmentTypeId;
        }

        $error = false;

        try {
            $this->departmentTable->modify($row, [ 'id' =>  $departmentId], $userId);
        } catch (Exception $exception) {
            $error = true;
        }

        return !$error;
    }

    /**
     * Soft archive department.
     *
     * @param string $departmentId
     * @param string $userId
     * @return bool
     */
    public function deleteDepartment(string $departmentId, string $userId)
    {
        try {
            $this->departmentTable->archive($userId, ['id'=>$departmentId]);
        } catch (Exception $exception) {
            $error = true;
        }

        return !$error;
    }
}
