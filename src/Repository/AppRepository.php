<?php


namespace App\Repository;


use App\Table\TableInterface;

/**
 * Class AppRepository
 */
abstract class AppRepository
***REMOVED***
    /**
     * Check if something exists in table.
     *
     * @param TableInterface $table
     * @param array $condition
     * @return bool
     */
    protected function exists(TableInterface $table, array $condition): bool
    ***REMOVED***
        $condition['archived_at'] = date('Y-m-d H:i:s');
        $query = $table->newSelect();
        $query->select(1)->where($condition);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***
***REMOVED***
