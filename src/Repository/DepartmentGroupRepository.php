<?php


namespace App\Repository;


use App\Table\DepartmentGroupTable;
use Slim\Container;

class DepartmentGroupRepository extends AppRepository
{
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
    {
        $this->departmentGroupTable = $container->get(DepartmentGroupTable::class);
    }

    /**
     * Get all department groups
     *
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function getAll(int $limit=10000, int $page = 0): array
    {
        $query = $this->departmentGroupTable->newSelect();
        $query->select(['hash', 'name_de', 'name_en', 'name_fr', 'name_it'])
            ->limit($limit)
            ->page($page);
        $rows = $query->execute()->fetchAll('assoc');
        return !empty($rows) ? $rows : [];
    }

    /**
     * Check if department exists.
     *
     * @param string $departmentGroupId
     * @return bool
     */
    public function existsDepartment(string $departmentGroupId): bool
    {
        $query = $this->departmentGroupTable->newSelect();
        $query->select(1)->where(['id'=>$departmentGroupId]);
        $row = $query->execute()->fetch();
        return !empty($row);
    }
}
