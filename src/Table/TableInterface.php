<?php
/**
 * Created by PhpStorm.
 * User: Björn
 * Date: 16.01.2018
 * Time: 22:13
 */

namespace App\Table;


use Cake\Database\Connection;
use Cake\Database\Query;
use Cake\Database\StatementInterface;

interface TableInterface
***REMOVED***
    /**
     * AppTable constructor.
     *
     * @param Connection $connection
     */
    public function __construct(Connection $connection = null);

    /**
     * Get table name.
     *
     * @return string table name
     */
    public function getTablename();

    /**
     * Get all entries from database.
     *
     * @return array $rows
     */
    public function getAll(): array;

    /**
     * Get Query.
     *
     * @return Query
     */
    public function newSelect(): Query;

    /**
     * Get entity by id.
     *
     * @param int $id
     * @return array
     */
    public function getById($id): array;

    /**
     * Insert into database.
     *
     * @param array $row with data to insertUser into database
     * @param string $id
     * @return string last inserted ID
     */
    public function insert(array $row, string $id): string;

    /**
     * Update database
     *
     * @param array $row
     * @param string $where should be the id
     * @param string $userId
     * @return StatementInterface
     */
    public function modify(array $row, array $where, string $userId): bool;

    /**
     * Delete from database.
     *
     * @param string $executorId
     * @param array $where
     * @return bool
     */
    public function archive(string $executorId, array $where): bool;

    /**
     * Unarchive element.
     *
     * @param string $executorId
     * @param array $where
     * @return bool true if unarchived successfully
     */
    public function unarchive(string $executorId, array $where): bool;

    /**
     * Check if table has not metadata like created, modified and archived information.
     *
     * @return bool
     */
    public function hasMetadata(): bool;
***REMOVED***
