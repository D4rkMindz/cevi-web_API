<?php

namespace App\Table;

use Cake\Database\Connection;
use Cake\Database\Query;
use Cake\Database\StatementInterface;

/**
 * Class AppTable
 */
class AppTable
***REMOVED***
    protected $table = null;

    protected $connection = null;


    /**
     * AppTable constructor.
     *
     * @param Connection $connection
     */
    public function __construct(Connection $connection = null)
    ***REMOVED***
        $this->connection = $connection;
***REMOVED***

    /**
     * Get all entries from database.
     *
     * @return array $rows
     */
    public function getAll(): array
    ***REMOVED***
        $query = $this->newSelect();
        $query->select('*');
        $rows = $query->execute()->fetchAll('assoc');

        return $rows;
***REMOVED***

    /**
     * Get Query.
     *
     * @return Query
     */
    public function newSelect(): Query
    ***REMOVED***
        return $this->connection->newQuery()->from($this->table);
***REMOVED***

    /**
     * Get entity by id.
     *
     * @param int $id
     * @return array
     */
    public function getById($id): array
    ***REMOVED***
        $query = $this->newSelect();
        $query->select('*')->where(['id' => $id]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row) ? $row : [];
***REMOVED***

    /**
     * Insert into database.
     *
     * @param array $row with data to insertUser into database
     * @return StatementInterface
     */
    public function insert(array $row): StatementInterface
    ***REMOVED***
        return $this->connection->insert($this->table, $row);
***REMOVED***

    /**
     * Update database
     *
     * @param string $where should be the id
     * @param array $row
     * @return StatementInterface
     */
    public function update(array $row, string $where): StatementInterface
    ***REMOVED***
        $query = $this->connection->newQuery();
        $query->update($this->table)
            ->set($row)
            ->where(['id' => $where]);
        return $query->execute();
***REMOVED***

    /**
     * Delete from database.
     *
     * @param string $id
     * @return StatementInterface
     */
    public function delete(string $id): StatementInterface
    ***REMOVED***
        return $this->connection->delete($this->table, ['id' => $id]);
***REMOVED***
***REMOVED***
