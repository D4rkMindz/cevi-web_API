<?php


namespace App\Repository;


use App\Table\TableInterface;

/**
 * Class AppRepository
 */
abstract class AppRepository
{
    /**
     * Check if something exists in table.
     *
     * @param TableInterface $table
     * @param array $condition
     * @return bool
     */
    protected function exists(TableInterface $table, array $condition): bool
    {
        $query = $table->newSelect();
        $query->select(1)->where($condition);
        $row = $query->execute()->fetch();
        return !empty($row);
    }
}
