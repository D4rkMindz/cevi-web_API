<?php


namespace App\Repository;


use App\Service\Formatter;
use App\Table\CityTable;
use App\Table\DepartmentGroupTable;
use App\Table\DepartmentTable;
use App\Table\DepartmentTypeTable;
use Slim\Container;

/**
 * Class DepartmentRepository
 */
class DepartmentRepository
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
        $query = $this->departmentTable->newSelect();
        $query->select('id')->where(['id' => $departmentId, 'deleted = ' => '0']);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***

    public function getAll(int $limit, int $page)
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
            'created' => $departmentTableName . '.created',
            'created_by' => $departmentTableName . '.created_by',
            'modified' => $departmentTableName . '.modified',
            'modified_by' => $departmentTableName . '.modified_by',
            'deleted' => $departmentTableName . '.deleted',
            'deleted_at' => $departmentTableName . '.deleted_at',
            'deleted_by' => $departmentTableName . '.deleted_by',
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
            ])
            ->limit($limit)
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
***REMOVED***
