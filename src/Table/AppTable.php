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

    private $connection = null;

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
     * Get table name.
     *
     * @return string table name
     */
    public function getTablename()
    ***REMOVED***
        return $this->table;
***REMOVED***

    /**
     * Get all entries from database.
     *
     * @return array $rows
     */
    public function getAll(): array
    ***REMOVED***
        $query = $this->newSelect();
        $query->select('*')->where(['deleted' => false]);
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
        $query->select('*')->where(['id' => $id, 'deleted = ' => false]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row) ? $row : [];
***REMOVED***

    /**
     * Insert into database.
     *
     * @param array $row with data to insertUser into database
     * @return string last inserted ID
     */
    public function insert(array $row): string
    ***REMOVED***
        return $this->connection->insert($this->table, $row)->lastInsertId($this->table);
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
            ->where(['id' => $where, 'deleted = ' => false]);
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
        return $this->connection->delete($this->table, ['id' => $id, 'deleted = ' => false]);
***REMOVED***
***REMOVED***
