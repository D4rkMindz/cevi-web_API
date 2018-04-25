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
     * @param bool $includeArchived
     * @return Query
     */
    public function newSelect(bool $includeArchived = false): Query
    ***REMOVED***
        if (!$this->hasMetadata() || $includeArchived) ***REMOVED***
            return $this->connection->newQuery()->from($this->table);
    ***REMOVED***;

        return $this->connection->newQuery()->from($this->table)->where(['OR' => [[$this->table . '.archived_at >= ' => date('Y-m-d H:i:s')], [$this->table . '.archived_at IS NULL']]]);
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
        $query->select('*')->where(['id' => $id, 'OR' => [[$this->table . '.archived_at >= ' => date('Y-m-d H:i:s')], [$this->table . '.archived_at IS NULL']]]);
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
        if ($this->hasMetadata()) ***REMOVED***
            $row['created_at'] = date('Y-m-d H:i:s');
            $row['created_by'] = $userId;
    ***REMOVED***
        return $this->connection->insert($this->table, $row)->lastInsertId($this->table);
***REMOVED***

    /**
     * Update database
     *
     * @param array $row
     * @param array $where should be the id
     * @param string $userId
     * @return bool
     */
    public function modify(array $row, array $where, string $userId): bool
    ***REMOVED***
        if (!$this->hasMetadata()) ***REMOVED***
            return false;
    ***REMOVED***
        $row['modified_at'] = (string)date('Y-m-d H:i:s');
        $row['modified_by'] = (string)$userId;
        $query = $this->connection->newQuery();
        $query->update($this->table)
            ->set($row)
            ->where($where);
        try ***REMOVED***
            $query->execute();
    ***REMOVED*** catch (Exception $exception) ***REMOVED***
            return false;
    ***REMOVED***
        return true;
***REMOVED***

    /**
     * Delete from database.
     *
     * @param string $executorId
     * @param array $where
     * @return StatementInterface
     */
    public function archive(string $executorId, array $where): bool
    ***REMOVED***
        $row = [
            'archived_by' => $executorId,
            'archived_at' => date('Y-m-d H:i:s'),
        ];
        if ($this->hasMetadata()) ***REMOVED***
            $where['OR'] = [
                [$this->table . '.archived_at >= ' => date('Y-m-d H:i:s')],
                [$this->table . '.archived_at IS NULL']
            ];
    ***REMOVED***
        $query = $this->connection->newQuery();
        $query->update($this->table)
            ->set($row)
            ->where($where);
        try ***REMOVED***
            $query->execute();
    ***REMOVED*** catch (Exception $exception) ***REMOVED***
            return false;
    ***REMOVED***

        return true;
***REMOVED***

    /**
     * Unarchive element.
     *
     * @param string $executorId
     * @param array $where
     * @return bool true if unarchived successfully
     */
    public function unarchive(string $executorId, array $where): bool
    ***REMOVED***
        if (!$this->hasMetadata()) ***REMOVED***
            return false;
    ***REMOVED***
        $row = [
            'modified_by' => $executorId,
            'modified_at' => date('Y-m-d H:i:s')
        ];
        $query = $this->connection->newQuery();
        $query->update($this->table)
            ->set($row)
            ->where($where);
        try ***REMOVED***
            $query->execute();
    ***REMOVED*** catch (Exception $exception) ***REMOVED***
            return false;
    ***REMOVED***

        return true;
***REMOVED***

    /**
     * Check if table has not metadata like created, modified and archived information.
     *
     * @return bool
     */
    public function hasMetadata(): bool
    ***REMOVED***
        $blacklist = [
            'article_image' => 1,
            'article_quality' => 1,
            'city' => 1,
            'department_event' => 1,
            'department_group' => 1,
            'department_region' => 1,
            'educational_course_image' => 1,
            'educational_course_organiser' => 1,
            'educational_course_participant' => 1,
            'event_image' => 1,
            'event_participant' => 1,
            'event_participation_status' => 1,
            'gender' => 1,
            'language' => 1,
            'permission' => 1,
            'position' => 1,
        ];

        if (isset($blacklist[$this->table])) ***REMOVED***
            return false;
    ***REMOVED***

        return true;
***REMOVED***
***REMOVED***
