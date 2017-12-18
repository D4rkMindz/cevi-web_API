<?php

namespace App\Table;

/**
 * Class UserTable
 */
class UserTable extends AppTable
***REMOVED***
    protected $table = 'user';

    /**
     * Check if username exists.
     *
     * @param string $username
     * @return bool true if found
     */
    public function existsUsername(string $username): bool
    ***REMOVED***
        $query = $this->newSelect();
        $query->select('username')->where(['username'=> $username]);
        $row = $query->execute()->fetch();
        return empty($row);
***REMOVED***
***REMOVED***
