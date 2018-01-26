<?php


namespace App\Service\Storage;


use App\Repository\StorageRepository;
use App\Service\AppValidation;
use App\Util\ValidationContext;
use Slim\Container;

class StorageValidation extends AppValidation
***REMOVED***
    /**
     * @var StorageRepository
     */
    private $storageRepository;

    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->storageRepository = $container->get(StorageRepository::class);
***REMOVED***

    /**
     * Validate storage
     *
     * Required params:
     *
     * int location_id
     * int room_id
     * int corridor_id
     * int shelf_id
     * int tray_id
     * int chest_id
     *
     * @param array $storage
     * @return ValidationContext
     */
    public function validateStorage(array $storage)
    ***REMOVED***
        $validationContext = new ValidationContext();
        $this->existsStorage($storage, $validationContext);
        if ($validationContext->fails()) ***REMOVED***
            return $validationContext;
    ***REMOVED***

        $this->validateStorageFields($storage, $validationContext);

        return $validationContext;
***REMOVED***

    /**
     * @param array $storage
     * @param $validationContext
     */
    private function existsStorage(array $storage, ValidationContext $validationContext): void
    ***REMOVED***
        if ($this->storageRepository->existsStorage(
            (string)$storage['location_id'],
            (string)$storage['room_id'],
            (string)$storage['corridor_id'],
            (string)$storage['shelf_id'],
            (string)$storage['tray_id'],
            (string)$storage['chest_id']
        )) ***REMOVED***
            $validationContext->setError('storage_place', __('Storage place already exists'));
    ***REMOVED***
***REMOVED***

    /**
     * @param array $storage
     * @param $validationContext
     */
    private function validateStorageFields(array $storage, ValidationContext $validationContext): void
    ***REMOVED***
        if ((
                empty($storage['location_id'])
                && empty($storage['room_id'])
                && empty($storage['corridor_id'])
                && empty($storage['shelf_id'])
                && empty($storage['tray_id'])
                && empty($storage['chest_id']))
            || empty($storage['name'])
        ) ***REMOVED***
            $validationContext->setError('storage_place', __('Nothing defined'));
            return;
    ***REMOVED***

        if (!empty($storage['location_id']) && !$this->storageRepository->existsLocation($storage['location_id'])) ***REMOVED***
            $validationContext->setError('location_id', __('Location does not exist'));
    ***REMOVED***

        if (!empty($storage['room_id']) && !$this->storageRepository->existsRoom($storage['room_id'])) ***REMOVED***
            $validationContext->setError('room_id', __('Room does not exist'));
    ***REMOVED***

        if (!empty($storage['corridor_id']) && !$this->storageRepository->existsCorridor($storage['corridor_id'])) ***REMOVED***
            $validationContext->setError('corridor_id', __('Corridor does not exist'));
    ***REMOVED***

        if (!empty($storage['shelf_id']) && !$this->storageRepository->existsShelf($storage['shelf_id'])) ***REMOVED***
            $validationContext->setError('shelf_id', __('Shelf does not exist'));
    ***REMOVED***

        if (!empty($storage['tray_id']) && !$this->storageRepository->existsTray($storage['tray_id'])) ***REMOVED***
            $validationContext->setError('tray_id', __('Tray does not exist'));
    ***REMOVED***

        if (!empty($storage['chest_id']) && !$this->storageRepository->existsChest($storage['chest_id'])) ***REMOVED***
            $validationContext->setError('chest_id', __('Chest does not exist'));
    ***REMOVED***
***REMOVED***
***REMOVED***
