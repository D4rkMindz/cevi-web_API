<?php

namespace App\Table;

use Cake\Database\Connection;
use Cake\Database\Query;
use Cake\Database\StatementInterface;
use Exception;

/**
 * Class AppTable
 */
class AppTable implements TableInterface
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
        $query->select('*')->where(['archived_at' => date('Y-m-d H:i:s')]);
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
        $query->select('*')->where(['id' => $id, 'archived_at' => date('Y-m-d H:i:s')]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row) ? $row : [];
***REMOVED***

    /**
     * Insert into database.
     *
     * @param array $row with data to insertUser into database
     * @param string $userId
     * @return string last inserted ID
     */
    public function insert(array $row, string $userId): string
    ***REMOVED***
        $row['created_at'] = date('Y-m-d H:i:s');
        $row['created_by'] = $userId;
        return $this->connection->insert($this->table, $row)->lastInsertId($this->table);
***REMOVED***

    /**
     * Update database
     *
     * @param array $row
     * @param string $where should be the id
     * @param string $userId
     * @return StatementInterface
     */
    public function update(array $row, array $where, string $userId): StatementInterface
    ***REMOVED***
        // todo add user id to all update calls
        $row['modified_at'] = date('Y-m-d H:i:s');
        $row['modified_by'] = $userId;
        $query = $this->connection->newQuery();
        $query->update($this->table)
            ->set($row)
            ->where(['id' => $where, 'archived_at' => date('Y-m-d H:i:s')]);
        return $query->execute();
***REMOVED***

    /**
     * Delete from database.
     *
     * @param string $executorId
     * @param array $where
     * @return StatementInterface
     */
    public function delete(string $executorId, array $where): bool
    ***REMOVED***
        $row = [
            'deleted' => true,
            'deleted_by' => $executorId,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
        $query = $this->connection->newQuery();
        $query->update($this->table)
            ->set($row)
            ->where($where);

        $result = true;
        try ***REMOVED***
            return $query->execute();
    ***REMOVED*** catch (Exception $exception)***REMOVED***
            $result = false;
    ***REMOVED***
        return $result;
***REMOVED***
***REMOVED***
