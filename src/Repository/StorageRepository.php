<?php


namespace App\Repository;

use App\Service\Formatter;
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
            'department_id' => $departmentId,
            'sl_location_id' => $params['location_id'],
            'sl_room_id' => $params['room_id'],
            'sl_corridor_id' => $params['corridor_id'],
            'sl_shelf_id' => $params['shelf_id'],
            'sl_tray_id' => $params['tray_id'],
            'sl_chest_id' => $params['chest_id'],
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

        if (array_key_exists('location_id', $params)) ***REMOVED***
            $row['sl_location_id'] = $params['location_id'];
    ***REMOVED***

        if (array_key_exists('room_id', $params)) ***REMOVED***
            $row['sl_room_id'] = $params['room_id'];
    ***REMOVED***

        if (array_key_exists('corridor_id', $params)) ***REMOVED***
            $row['sl_corridor_id'] = $params['corridor_id'];
    ***REMOVED***

        if (array_key_exists('shelf_id', $params)) ***REMOVED***
            $row['sl_shelf_id'] = $params['shelf_id'];
    ***REMOVED***

        if (array_key_exists('tray_id', $params)) ***REMOVED***
            $row['sl_tray_id'] = $params['tray_id'];
    ***REMOVED***

        if (array_key_exists('chest_id', $params)) ***REMOVED***
            $row['sl_chest_id'] = $params['chest_id'];
    ***REMOVED***

        if (array_key_exists('name', $params)) ***REMOVED***
            $row['name'] = $params['name'];
    ***REMOVED***

        try ***REMOVED***
            $this->storagePlaceTable->update($row, ['department_id' => $departmentId, 'id' => $storageId], $userId);
    ***REMOVED*** catch (Exception $exception) ***REMOVED***
            return false;
    ***REMOVED***

        return true;
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
            'sl_location_id' => $locationId ?: null,
            'sl_room_id' => $roomId ?: null,
            'sl_corridor_id' => $corridorId ?: null,
            'sl_shelf_id' => $shelfId ?: null,
            'sl_tray_id' => $trayId ?: null,
            'sl_chest_id' => $chestId ?: null,
            'archived_at' => date('Y-m-d H:i:s'),
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
        return $this->exists($this->slLocationTable, ['id' => $locationId]);
***REMOVED***

    /**
     * Check if room exists
     *
     * @param string $roomId
     * @return bool
     */
    public function existsRoom(string $roomId): bool
    ***REMOVED***
        return $this->exists($this->slRoomTable, ['id' => $roomId]);
***REMOVED***

    /**
     * Check if corridor exists
     *
     * @param string $corridorId
     * @return bool
     */
    public function existsCorridor(string $corridorId): bool
    ***REMOVED***
        return $this->exists($this->slCorridorTable, ['id' => $corridorId]);
***REMOVED***

    /**
     * Check if shelf exists
     *
     * @param string $shelfId
     * @return bool
     */
    public function existsShelf(string $shelfId): bool
    ***REMOVED***
        return $this->exists($this->slShelfTable, ['id' => $shelfId]);
***REMOVED***

    /**
     * Check if tray exists
     *
     * @param string $trayId
     * @return bool
     */
    public function existsTray(string $trayId): bool
    ***REMOVED***
        return $this->exists($this->slTrayTable, ['id' => $trayId]);
***REMOVED***

    /**
     * Check if chest exists.
     *
     * @param string $chestId
     * @return bool
     */
    public function existsChest(string $chestId): bool
    ***REMOVED***
        return $this->exists($this->slChestTable, ['id' => $chestId]);
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
                    'conditions' => $storagePlaceTablename . '.sl_location_id = ' . $locationTablename . '.id',
                ],
                [
                    'table' => $roomTablename,
                    'type' => 'RIGHT',
                    'conditions' => $storagePlaceTablename . '.sl_room_id = ' . $roomTablename . '.id',
                ],
                [
                    'table' => $corridorTablename,
                    'type' => 'RIGHT',
                    'conditions' => $storagePlaceTablename . '.sl_corridor_id = ' . $corridorTablename . '.id',
                ],
                [
                    'table' => $shelfTablename,
                    'type' => 'RIGHT',
                    'conditions' => $storagePlaceTablename . '.sl_shelf_id = ' . $shelfTablename . '.id',
                ],
                [
                    'table' => $trayTablename,
                    'type' => 'RIGHT',
                    'conditions' => $storagePlaceTablename . '.sl_tray_id = ' . $trayTablename . '.id',
                ],
                [
                    'table' => $chestTablename,
                    'type' => 'RIGHT',
                    'conditions' => $storagePlaceTablename . '.sl_chest_id = ' . $chestTablename . '.id',
                ],
            ])
            ->where([
                $storagePlaceTablename . '.department_id' => $departmentId,
                $storagePlaceTablename . '.archived_at' => date('Y-m-d H:i:s'),
            ]);
        return $query;
***REMOVED***
***REMOVED***
