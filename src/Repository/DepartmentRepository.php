<?php


namespace App\Repository;


use App\Service\Formatter;
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
***REMOVED***
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
    ***REMOVED***
        $this->departmentTable = $container->get(DepartmentTable::class);
        $this->cityTable = $container->get(CityTable::class);
        $this->departmentGroupTable = $container->get(DepartmentGroupTable::class);
        $this->departmentTypeTable = $container->get(DepartmentTypeTable::class);

        $this->formatter = new Formatter();
***REMOVED***

    /**
     * Check if department exists.
     *
     * @param string $departmentId
     * @return bool true if found.
     */
    public function existsDepartment(string $departmentId): bool
    ***REMOVED***
        return $this->exists($this->departmentTable, ['id' => $departmentId]);
***REMOVED***

    /**
     * Check if department exists by name.
     *
     * @param string $name
     * @return bool
     */
    public function existsDepartmentByName(string $name)
    ***REMOVED***
        $query = $this->departmentTable->newSelect();
        $query->select(1)->where(['name LIKE' => $name]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***

    /**
     * Get all departments
     *
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function getAll(int $limit, int $page)
    ***REMOVED***
        $query = $this->getDepartmentQuery();
        $query->limit($limit)
            ->page($page);
        $departments = $query->execute()->fetchAll('assoc');

        if (empty($departments)) ***REMOVED***
            return [];
    ***REMOVED***

        foreach ($departments as $key => $department) ***REMOVED***
            $departments[$key] = $this->formatter->formatDepartment($department);
    ***REMOVED***

        return $departments;
***REMOVED***

    /**
     * Get join query.
     *
     * @return Query
     */
    private function getDepartmentQuery(): Query
    ***REMOVED***
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
***REMOVED***

    /**
     * Get single department by ID.
     *
     * @param string $departmentId
     * @return array|false
     */
    public function getDepartment(string $departmentId)
    ***REMOVED***
        $query = $this->getDepartmentQuery();
        $query->where([$this->departmentTable->getTablename() . '.id' => $departmentId]);
        $row = $query->execute()->fetch('assoc');
        if (empty($row)) ***REMOVED***
            return [];
    ***REMOVED***
        $department = $this->formatter->formatDepartment($row);
        return $department;
***REMOVED***

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
    ***REMOVED***
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
***REMOVED***

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
    ***REMOVED***
        $row = [
            'modified_at' => date('Y-m-d H:i:s'),
            'modified_by' => $userId,
        ];

        if (!empty($name)) ***REMOVED***
            $row['name'] = $name;
    ***REMOVED***

        if (!empty($postcode)) ***REMOVED***
            $cityId = $this->cityTable->newSelect()->select(['id'])->where(['number' => $postcode]);
            $row['city_id'] = $cityId;
    ***REMOVED***

        if (!empty($departmentGroupId)) ***REMOVED***
            $row['department_group_id'] = $departmentGroupId;
    ***REMOVED***

        if (!empty($departmentTypeId)) ***REMOVED***
            $row['department_type_id'] = $departmentTypeId;
    ***REMOVED***

        $error = false;

        try ***REMOVED***
            $this->departmentTable->update($row, [ 'id' =>  $departmentId], $userId);
    ***REMOVED*** catch (Exception $exception) ***REMOVED***
            $error = true;
    ***REMOVED***

        return !$error;
***REMOVED***

    /**
     * Soft archive department.
     *
     * @param string $departmentId
     * @param string $userId
     * @return bool
     */
    public function deleteDepartment(string $departmentId, string $userId)
    ***REMOVED***
        try ***REMOVED***
            $this->departmentTable->archive($userId, ['id'=>$departmentId]);
    ***REMOVED*** catch (Exception $exception) ***REMOVED***
            $error = true;
    ***REMOVED***

        return !$error;
***REMOVED***
***REMOVED***
