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
{
    protected $table = null;

    private $connection = null;

    /**
     * AppTable constructor.
     *
     * @param Connection $connection
     */
    public function __construct(Connection $connection = null)
    {
        $this->connection = $connection;
    }

    /**
     * Get table name.
     *
     * @return string table name
     */
    public function getTablename()
    {
        return $this->table;
    }

    /**
     * Get all entries from database.
     *
     * @return array $rows
     */
    public function getAll(): array
    {
        $query = $this->newSelect();
        $query->select('*');
        if ($this->hasMetadata()) {
            $query->where(['archived_at' => date('Y-m-d H:i:s')]);
        }
        $rows = $query->execute()->fetchAll('assoc');

        return $rows;
    }

    /**
     * Get Query.
     *
     * @param bool $includeArchived
     * @return Query
     */
    public function newSelect(bool $includeArchived = false): Query
    {
        if (!$this->hasMetadata() || $includeArchived) {
            return $this->connection->newQuery()->from($this->table);
        };

        return $this->connection->newQuery()->from($this->table)->where(['OR' => [[$this->table . '.archived_at >= ' => date('Y-m-d H:i:s')], [$this->table . '.archived_at IS NULL']]]);
    }

    /**
     * Get entity by id.
     *
     * @param int $id
     * @return array
     */
    public function getById($id): array
    {
        $query = $this->newSelect();
        $where = ['id' => $id];
        if ($this->hasMetadata()) {
            $where['OR'] = [
                [$this->table . '.archived_at >= ' => date('Y-m-d H:i:s')],
                [$this->table . '.archived_at IS NULL']
            ];
        }
        $query->select('*')->where($where);
        $row = $query->execute()->fetch('assoc');
        return !empty($row) ? $row : [];
    }

    /**
     * Insert into database.
     *
     * @param array $row with data to insertUser into database
     * @param string $id
     * @return string last inserted ID
     */
    public function insert(array $row, string $id): string
    {
        if ($this->hasMetadata()) {
            $row['created_at'] = date('Y-m-d H:i:s');
            $row['created_by'] = $id;
        }
        $id = $this->connection->insert($this->table, $row)->lastInsertId($this->table);
        if (!$this->hasHash()) {
            return $id;
        }

        $row = $this->connection->newQuery()
            ->select(['hash'])
            ->from($this->table)
            ->where(['id' => $id])
            ->execute()
            ->fetch('assoc');
        return !empty($row)?$row['hash']:'';
    }

    /**
     * Update database
     *
     * @param array $row
     * @param array $where should be the id
     * @param string $userId
     * @return bool
     */
    public function modify(array $row, array $where, string $userId): bool
    {
        if (!$this->hasMetadata()) {
            return false;
        }
        $row['modified_at'] = (string)date('Y-m-d H:i:s');
        $row['modified_by'] = (string)$userId;
        $query = $this->connection->newQuery();
        $query->update($this->table)
            ->set($row)
            ->where($where);
        try {
            $query->execute();
        } catch (Exception $exception) {
            return false;
        }
        return true;
    }

    /**
     * Delete from database.
     *
     * @param string $executorId
     * @param array $where
     * @return StatementInterface
     */
    public function archive(string $executorId, array $where): bool
    {
        $row = [
            'archived_by' => $executorId,
            'archived_at' => date('Y-m-d H:i:s'),
        ];
        if ($this->hasMetadata()) {
            $where['OR'] = [
                [$this->table . '.archived_at >= ' => date('Y-m-d H:i:s')],
                [$this->table . '.archived_at IS NULL']
            ];
        }
        $query = $this->connection->newQuery();
        $query->update($this->table)
            ->set($row)
            ->where($where);
        try {
            $query->execute();
        } catch (Exception $exception) {
            return false;
        }

        return true;
    }

    /**
     * Unarchive element.
     *
     * @param string $executorId
     * @param array $where
     * @return bool true if unarchived successfully
     */
    public function unarchive(string $executorId, array $where): bool
    {
        if (!$this->hasMetadata()) {
            return false;
        }
        $row = [
            'modified_by' => $executorId,
            'modified_at' => date('Y-m-d H:i:s')
        ];
        $query = $this->connection->newQuery();
        $query->update($this->table)
            ->set($row)
            ->where($where);
        try {
            $query->execute();
        } catch (Exception $exception) {
            return false;
        }

        return true;
    }

    /**
     * Check if table has not metadata like created, modified and archived information.
     *
     * @return bool
     */
    public function hasMetadata(): bool
    {
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
            'email_token' => 1,
            'event_participant' => 1,
            'event_participation_status' => 1,
            'gender' => 1,
            'language' => 1,
            'permission' => 1,
            'position' => 1,
        ];

        if (isset($blacklist[$this->table])) {
            return false;
        }

        return true;
    }

    /**
     * Check if table has hashes
     *
     * @return bool
     */
    public function hasHash(): bool
    {
        $whitelist = [
            'article' => 1,
            'article_quality' => 1,
            'department' => 1,
            'department_group' => 1,
            'department_region' => 1,
            'department_type' => 1,
            'educational_course' => 1,
            'educational_course_image' => 1,
            'educational_course_organiser' => 1,
            'educational_course_participant' => 1,
            'event' => 1,
            'event_participant' => 1,
            'event_participation_status' => 1,
            'gender' => 1,
            'iamge' => 1,
            'language' => 1,
            'permission' => 1,
            'position' => 1,
            'sl_chest' => 1,
            'sl_corridor' => 1,
            'sl_location' => 1,
            'sl_room' => 1,
            'sl_shelf' => 1,
            'sl_tray' => 1,
            'storage_place' => 1,
            'user' => 1,
        ];
        return isset($whitelist[$this->table]);
    }
}
