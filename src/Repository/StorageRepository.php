<?php


namespace App\Repository;

use App\Table\SlChestTable;
use App\Table\SlCorridorTable;
use App\Table\SlLocationTable;
use App\Table\SlRoomTable;
use App\Table\SlShelfTable;
use App\Table\SlTrayTable;
use App\Table\StoragePlaceTable;
use Slim\Container;

/**
 * Class StorageRepository
 */
class StorageRepository extends AppRepository
***REMOVED***

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
        $this->storagePlaceTable = $container->get(StoragePlaceTable::class);
        $this->slLocationTable = $container->get(SlLocationTable::class);
        $this->slRoomTable = $container->get(SlRoomTable::class);
        $this->slCorridorTable = $container->get(SlCorridorTable::class);
        $this->slShelfTable = $container->get(SlShelfTable::class);
        $this->slTrayTable = $container->get(SlTrayTable::class);
        $this->slChestTable = $container->get(SlChestTable::class);
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
            'deleted' => false,
        ]);
        $row = $query->execute()->fetch();
        return !empty($row);
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
***REMOVED***
