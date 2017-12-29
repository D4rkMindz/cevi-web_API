<?php


namespace App\Repository;


use App\Table\DepartmentTable;
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
     * DepartmentRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->departmentTable = $container->get(DepartmentTable::class);
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
        $query->select('id')->where(['id'=> $departmentId, 'deleted = ' => '0']);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***
***REMOVED***
