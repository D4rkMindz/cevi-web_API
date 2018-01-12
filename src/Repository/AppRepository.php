<?php


namespace App\Repository;


abstract class AppRepository
***REMOVED***
    protected function exists(string $id, $table, string $param = 'id'): bool
    ***REMOVED***
        $query = $table->newSelect();
        $query->select(1)->where([$param => $id]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***
***REMOVED***
