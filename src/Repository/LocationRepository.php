<?php


namespace App\Repository;


use App\Util\Formatter;
use App\Table\StoragePlaceTable;
use App\Table\TableInterface;
use Slim\Container;

class LocationRepository extends AppRepository
***REMOVED***
    /**
     * @var Formatter
     */
    private $formatter;

    /**
     * @var StoragePlaceTable
     */
    private $storagePlaceTable;

    /**
     * StorageRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->formatter = new Formatter();
        $this->storagePlaceTable = $container->get(StoragePlaceTable::class);
***REMOVED***

    /**
     * Get all storages.
     *
     * @param TableInterface $table
     * @param string $departmentId
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function getAllStorages(TableInterface $table, string $departmentId, int $limit, int $page): array
    ***REMOVED***
        $slLocationTablename = $table->getTablename();
        $storagePlaceTablename = $this->storagePlaceTable->getTablename();
        $fields = [
            'id' => $slLocationTablename . '.id',
            'name' => $slLocationTablename . '.name',
            'created_at' => $slLocationTablename . '.created_at',
            'created_by' => $slLocationTablename . '.created_by',
            'modified_at' => $slLocationTablename . '.modified_at',
            'modified_by' => $slLocationTablename . '.modified_by',
            'archived_at' => $slLocationTablename . '.archived_at',
            'archived_by' => $slLocationTablename . '.archived_by',
        ];
        $query = $this->storagePlaceTable->newSelect();
        $query->select($fields)
            ->join([
                [
                    'table' => $slLocationTablename,
                    'type' => 'INNER',
                    'conditions' => $storagePlaceTablename . '.sl_location_hash = ' . $slLocationTablename . '.hash',
                ],
            ])
            ->limit($limit)
            ->page($page)
            ->where([$storagePlaceTablename . '.department_hash' => $departmentId]);
        $locations = $query->execute()->fetchAll('assoc');
        if (empty($locations)) ***REMOVED***
            return [];
    ***REMOVED***

        return $locations;
***REMOVED***

    /**
     * CreateStorage
     *
     * @param TableInterface $table
     * @param string $name
     * @param string $userId
     * @return string
     */
    public function createStorage(TableInterface $table, string $name, string $userId): string
    ***REMOVED***
        $row = [
            'name' => $name,
        ];
        return $table->insert($row, $userId);
***REMOVED***

    /**
     * Update storage
     *
     * @param TableInterface $table
     * @param string $id
     * @param string $name
     * @param string $userId
     * @return bool|\Cake\Database\StatementInterface
     */
    public function updateStorage(TableInterface $table, string $id, string $name, string $userId)
    ***REMOVED***
        return $table->modify(['name' => (string)$name], ['id' => $id], $userId);
***REMOVED***

    /**
     * Delete storage.
     *
     * @param TableInterface $table
     * @param string $id
     * @param string $userId
     * @return bool
     */
    public function deleteStorage(TableInterface $table, string $id, string $userId)
    ***REMOVED***
        return $table->archive($userId, ['id'=>$id]);
***REMOVED***
***REMOVED***
