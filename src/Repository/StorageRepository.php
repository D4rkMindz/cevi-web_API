<?php


namespace App\Repository;

use App\Util\Formatter;
use App\Table\SlChestTable;
use App\Table\SlCorridorTable;
use App\Table\SlLocationTable;
use App\Table\SlRoomTable;
use App\Table\SlShelfTable;
use App\Table\SlTrayTable;
use App\Table\StoragePlaceTable;
use Exception;
use Slim\Container;

/**
 * Class StorageRepository
 */
class StorageRepository extends AppRepository
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
     * @var SlLocationTable
     */
    private $slLocationTable;

    /**
     * @var SlRoomTable
     */
    private $slRoomTable;

    /**
     * @var SlCorridorTable
     */
    private $slCorridorTable;

    /**
     * @var SlShelfTable
     */
    private $slShelfTable;

    /**
     * @var SlTrayTable
     */
    private $slTrayTable;

    /**
     * @var SlChestTable
     */
    private $slChestTable;

    /**
     * StorageRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->formatter = new Formatter();
        $this->storagePlaceTable = $container->get(StoragePlaceTable::class);
        $this->slLocationTable = $container->get(SlLocationTable::class);
        $this->slRoomTable = $container->get(SlRoomTable::class);
        $this->slCorridorTable = $container->get(SlCorridorTable::class);
        $this->slShelfTable = $container->get(SlShelfTable::class);
        $this->slTrayTable = $container->get(SlTrayTable::class);
        $this->slChestTable = $container->get(SlChestTable::class);
***REMOVED***

    /**
     * Get all storages.
     *
     * @param string $departmentId
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function getAllStorages(string $departmentId, int $limit, int $page): array
    ***REMOVED***
        $query = $this->getStoragePlaceQuery($departmentId);
        $query->limit($limit)
            ->page($page);
        $rows = $query->execute()->fetchAll('assoc');
        foreach ($rows as $key => $row) ***REMOVED***
            $rows[$key] = $this->formatter->formatStoragePlace($row, $departmentId);
    ***REMOVED***
        if (empty($rows)) ***REMOVED***
            return [];
    ***REMOVED***
        $rows['limit'] = $limit;
        $rows['page'] = $page;

        return $rows;
***REMOVED***

    /**
     * Get single storage.
     *
     * @param string $departmentId
     * @param string $storageId
     * @return array
     */
    public function getStorage(string $departmentId, string $storageId): array
    ***REMOVED***
        $query = $this->getStoragePlaceQuery($departmentId);
        $query->where([$this->storagePlaceTable->getTablename() . '.id' => $storageId]);
        $storage = $query->execute()->fetch('assoc');
        if (empty($storage)) ***REMOVED***
            return [];
    ***REMOVED***

        return $this->formatter->formatStoragePlace($storage, $departmentId);
***REMOVED***

    /**
     * Create storage.
     *
     * @param string $departmentId
     * @param array $params
     * @param string $userId
     * @return string Last inserted ID
     */
    public function createStorage(string $departmentId, array $params, string $userId): string
    ***REMOVED***
        $row = [
            'department_hash' => $departmentId,
            'sl_location_hash' => $params['location_hash'],
            'sl_room_hash' => $params['room_hash'],
            'sl_corridor_hash' => $params['corridor_hash'],
            'sl_shelf_hash' => $params['shelf_hash'],
            'sl_tray_hash' => $params['tray_hash'],
            'sl_chest_hash' => $params['chest_hash'],
            'name' => $params['name']
        ];
        return $this->storagePlaceTable->insert($row, $userId);
***REMOVED***

    /**
     * @param string $departmentId
     * @param string $storageId
     * @param array $params
     * @param string $userId
     * @return bool
     */
    public function updateStorage(string $departmentId, string $storageId, array $params, string $userId): bool
    ***REMOVED***
        $row = [];

        if (array_key_exists('location_hash', $params)) ***REMOVED***
            $row['sl_location_hash'] = $params['location_hash'];
    ***REMOVED***

        if (array_key_exists('room_hash', $params)) ***REMOVED***
            $row['sl_room_hash'] = $params['room_hash'];
    ***REMOVED***

        if (array_key_exists('corridor_hash', $params)) ***REMOVED***
            $row['sl_corridor_hash'] = $params['corridor_hash'];
    ***REMOVED***

        if (array_key_exists('shelf_hash', $params)) ***REMOVED***
            $row['sl_shelf_hash'] = $params['shelf_hash'];
    ***REMOVED***

        if (array_key_exists('tray_hash', $params)) ***REMOVED***
            $row['sl_tray_hash'] = $params['tray_hash'];
    ***REMOVED***

        if (array_key_exists('chest_hash', $params)) ***REMOVED***
            $row['sl_chest_hash'] = $params['chest_hash'];
    ***REMOVED***

        if (array_key_exists('name', $params)) ***REMOVED***
            $row['name'] = $params['name'];
    ***REMOVED***

        try ***REMOVED***
            $this->storagePlaceTable->modify($row, ['department_hash' => $departmentId, 'hash' => $storageId], $userId);
    ***REMOVED*** catch (Exception $exception) ***REMOVED***
            return false;
    ***REMOVED***

        return true;
***REMOVED***

    /**
     * Delete storage.
     *
     * @param string $departmentId
     * @param string $storageId
     * @param string $userId
     * @return bool
     */
    public function deleteStorage(string $departmentId, string $storageId, string $userId): bool
    ***REMOVED***
        return (bool)$this->storagePlaceTable->archive($userId, ['id' => $storageId, 'department_hash' => $departmentId]);
***REMOVED***

    /**
     * Check if storage exists.
     *
     * @param string $locationId
     * @param string $roomId
     * @param string $corridorId
     * @param string $shelfId
     * @param string $trayId
     * @param string $chestId
     * @return bool
     */
    public function existsStorage(string $locationId, string $roomId, string $corridorId, string $shelfId, string $trayId, string $chestId)
    ***REMOVED***
        $query = $this->storagePlaceTable->newSelect();
        $query->select(1)->where([
            'sl_location_hash' => $locationId ?: null,
            'sl_room_hash' => $roomId ?: null,
            'sl_corridor_hash' => $corridorId ?: null,
            'sl_shelf_hash' => $shelfId ?: null,
            'sl_tray_hash' => $trayId ?: null,
            'sl_chest_hash' => $chestId ?: null,
        ]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***

    /**
     * Check if storage exists.
     *
     * @param string $storageId
     * @return bool
     */
    public function existsStorageById(string $storageId): bool
    ***REMOVED***
        return $this->exists($this->storagePlaceTable, ['id' => $storageId]);
***REMOVED***

    /**
     * Check if location exists.
     *
     * @param string $locationId
     * @return bool
     */
    public function existsLocation(string $locationId): bool
    ***REMOVED***
        return $this->exists($this->slLocationTable, ['hash' => $locationId]);
***REMOVED***

    /**
     * Check if room exists
     *
     * @param string $roomId
     * @return bool
     */
    public function existsRoom(string $roomId): bool
    ***REMOVED***
        return $this->exists($this->slRoomTable, ['hash' => $roomId]);
***REMOVED***

    /**
     * Check if corridor exists
     *
     * @param string $corridorId
     * @return bool
     */
    public function existsCorridor(string $corridorId): bool
    ***REMOVED***
        return $this->exists($this->slCorridorTable, ['hash' => $corridorId]);
***REMOVED***

    /**
     * Check if shelf exists
     *
     * @param string $shelfId
     * @return bool
     */
    public function existsShelf(string $shelfId): bool
    ***REMOVED***
        return $this->exists($this->slShelfTable, ['hash' => $shelfId]);
***REMOVED***

    /**
     * Check if tray exists
     *
     * @param string $trayId
     * @return bool
     */
    public function existsTray(string $trayId): bool
    ***REMOVED***
        return $this->exists($this->slTrayTable, ['hash' => $trayId]);
***REMOVED***

    /**
     * Check if chest exists.
     *
     * @param string $chestId
     * @return bool
     */
    public function existsChest(string $chestId): bool
    ***REMOVED***
        return $this->exists($this->slChestTable, ['hash' => $chestId]);
***REMOVED***

    /**
     * @param string $departmentId
     * @return \Cake\Database\Query
     */
    private function getStoragePlaceQuery(string $departmentId): \Cake\Database\Query
    ***REMOVED***
        $storagePlaceTablename = $this->storagePlaceTable->getTablename();
        $locationTablename = $this->slLocationTable->getTablename();
        $roomTablename = $this->slRoomTable->getTablename();
        $corridorTablename = $this->slCorridorTable->getTablename();
        $shelfTablename = $this->slShelfTable->getTablename();
        $trayTablename = $this->slTrayTable->getTablename();
        $chestTablename = $this->slChestTable->getTablename();


        $fields = [
            'id' => $storagePlaceTablename . '.id',
            'name' => $storagePlaceTablename . '.name',
            'location_id' => $locationTablename . '.id',
            'location_name' => $locationTablename . '.name',
            'room_id' => $roomTablename . '.id',
            'room_name' => $roomTablename . '.name',
            'corridor_id' => $corridorTablename . '.id',
            'corridor_name' => $corridorTablename . '.name',
            'shelf_id' => $shelfTablename . '.id',
            'shelf_name' => $shelfTablename . '.name',
            'tray_id' => $trayTablename . '.id',
            'tray_name' => $trayTablename . '.name',
            'chest_id' => $chestTablename . '.id',
            'chest_name' => $chestTablename . '.name',
        ];
        $query = $this->storagePlaceTable->newSelect();
        $query->select($fields)
            ->join([
                [
                    'table' => $locationTablename,
                    'type' => 'RIGHT',
                    'conditions' => $storagePlaceTablename . '.sl_location_hash = ' . $locationTablename . '.hash',
                ],
                [
                    'table' => $roomTablename,
                    'type' => 'RIGHT',
                    'conditions' => $storagePlaceTablename . '.sl_room_hash = ' . $roomTablename . '.hash',
                ],
                [
                    'table' => $corridorTablename,
                    'type' => 'RIGHT',
                    'conditions' => $storagePlaceTablename . '.sl_corridor_hash = ' . $corridorTablename . '.hash',
                ],
                [
                    'table' => $shelfTablename,
                    'type' => 'RIGHT',
                    'conditions' => $storagePlaceTablename . '.sl_shelf_hash = ' . $shelfTablename . '.hash',
                ],
                [
                    'table' => $trayTablename,
                    'type' => 'RIGHT',
                    'conditions' => $storagePlaceTablename . '.sl_tray_id = ' . $trayTablename . '.hash',
                ],
                [
                    'table' => $chestTablename,
                    'type' => 'RIGHT',
                    'conditions' => $storagePlaceTablename . '.sl_chest_hash = ' . $chestTablename . '.hash',
                ],
            ])
            ->where([
                $storagePlaceTablename . '.department_hash' => $departmentId,
            ]);
        return $query;
***REMOVED***
***REMOVED***
