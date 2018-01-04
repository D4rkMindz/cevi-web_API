<?php


namespace App\Repository;


use App\Table\DepartmentGroupTable;
use Slim\Container;

class DepartmentGroupRepository
***REMOVED***
    /**
     * @var DepartmentGroupTable
     */
    private $departmentGroupTable;

    /**
     * DepartmentGroupRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->departmentGroupTable = $container->get(DepartmentGroupTable::class);
***REMOVED***

    /**
     * Get all department groups
     *
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function getAll(int $limit=10000, int $page = 0): array
    ***REMOVED***
        $query = $this->departmentGroupTable->newSelect();
        $query->select(['id', 'name_de', 'name_en', 'name_fr', 'name_it'])
            ->limit($limit)
            ->page($page);
        $rows = $query->execute()->fetchAll('assoc');
        return !empty($rows) ? $rows : [];
***REMOVED***
***REMOVED***