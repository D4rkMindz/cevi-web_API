<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 05.01.2018
 * Time: 14:44
 */

namespace App\Repository;


use App\Table\DepartmentTypeTable;
use Slim\Container;

/**
 * Class DepartmentTypeRepository
 */
class DepartmentTypeRepository extends AppRepository
***REMOVED***
    /**
     * @var DepartmentTypeTable
     */
    private $departmentTypeTable;

    /**
     * DepartmentTypeRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->departmentTypeTable = $container->get(DepartmentTypeTable::class);
***REMOVED***

    /**
     * Chexk if department type exists.
     *
     * @param string $departmentTypeId
     * @return bool
     */
    public function existsDepartmentType(string $departmentTypeId): bool
    ***REMOVED***
        $query = $this->departmentTypeTable->newSelect();
        $query->select(1)->where(['id'=> $departmentTypeId, '' => false]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***
***REMOVED***
