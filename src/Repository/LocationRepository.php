<?php


namespace App\Repository;


use App\Util\Formatter;
use App\Table\StoragePlaceTable;
use App\Table\TableInterface;
use Slim\Container;

class LocationRepository extends AppRepository
{
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
    {
        $this->formatter = new Formatter();
        $this->storagePlaceTable = $container->get(StoragePlaceTable::class);
    }

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
    {
        $slLocationTablename = $table->getTablename();
        $storagePlaceTablename = $this->storagePlaceTable->getTablename();
        $fields = [
            'hash' => $slLocationTablename . '.hash',
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
        if (empty($locations)) {
            return [];
        }

        return $locations;
    }

    /**
     * CreateStorage
     *
     * @param TableInterface $table
     * @param string $name
     * @param string $userId
     * @return string
     */
    public function createStorage(TableInterface $table, string $name, string $userId): string
    {
        $row = [
            'name' => $name,
            'hash' => uniqid(),
        ];
        return $table->insert($row, $userId);
    }

    /**
     * Update storage
     *
     * @param TableInterface $table
     * @param string $hash
     * @param string $name
     * @param string $userId
     * @return bool|\Cake\Database\StatementInterface
     */
    public function updateStorage(TableInterface $table, string $hash, string $name, string $userId)
    {
        return $table->modify(['name' => (string)$name], ['hash' => $hash], $userId);
    }

    /**
     * Delete storage.
     *
     * @param TableInterface $table
     * @param string $hash
     * @param string $userId
     * @return bool
     */
    public function deleteStorage(TableInterface $table, string $hash, string $userId)
    {
        return $table->archive($userId, ['hash' => $hash]);
    }
}
