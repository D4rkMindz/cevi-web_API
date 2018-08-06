<?php


namespace App\Service\Storage;


use App\Repository\StorageRepository;
use App\Service\AppValidation;
use App\Util\ValidationContext;
use Slim\Container;

class StorageValidation extends AppValidation
{
    /**
     * @var StorageRepository
     */
    private $storageRepository;

    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->storageRepository = $container->get(StorageRepository::class);
    }

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
    {
        $validationContext = new ValidationContext();
        $this->existsStorage($storage, $validationContext);
        if ($validationContext->fails()) {
            return $validationContext;
        }

        $this->validateStorageFields($storage, $validationContext);

        return $validationContext;
    }

    /**
     * Validate modify storage
     *
     * @param array $storage
     * @return ValidationContext
     */
    public function validateUpdateStorage(array $storage)
    {
        $validationContext = new ValidationContext();
        $this->existsStorageNot($storage, $validationContext);
        if ($validationContext->fails()) {
            return $validationContext;
        }

        $this->validateStorageFields($storage, $validationContext);

        return $validationContext;
    }

    /**
     * Validate location
     *
     * @param array $location
     * @param bool $isUpdate
     * @return ValidationContext
     */
    public function validateLocation(array $location, bool $isUpdate = true): ValidationContext
    {
        $validationContext = new ValidationContext();
        if ($isUpdate && !$this->storageRepository->existsLocation($location['storage_hash'])) {
            $validationContext->setError('storage_hash', __('Storage place not found'));
        }

        if (array_key_exists('name', $location)) {
            $this->validateLength($location['name'], 'name', $validationContext);
        } else {
            $validationContext->setError('name', __('Name must be defined'));
        }
        return $validationContext;
    }

    /**
     * Validate delete.
     *
     * @param array $location
     * @return ValidationContext
     */
    public function validateDelete(array $location)
    {
        $validationContext = new ValidationContext();
        if (!$this->storageRepository->existsLocation($location['storage_id'])) {
            $validationContext->setError('storage_id', __('Storage place not found'));
        }

        return $validationContext;
    }

    /**
     * @param array $storage
     * @param $validationContext
     */
    private function existsStorage(array $storage, ValidationContext $validationContext)
    {
        if ($this->storageRepository->existsStorage(
            (string)$storage['location_hash'],
            (string)$storage['room_hash'],
            (string)$storage['corridor_hash'],
            (string)$storage['shelf_hash'],
            (string)$storage['tray_hash'],
            (string)$storage['chest_hash']
        )) {
            $validationContext->setError('storage_place', __('Storage place already exists'));
        }
    }

    /**
     * Fail if storage does not exist.
     *
     * @param array $storage
     * @param ValidationContext $validationContext
     */
    private function existsStorageNot(array $storage, ValidationContext $validationContext)
    {
        if (!$this->storageRepository->existsStorage(
            (string)$storage['location_id'],
            (string)$storage['room_id'],
            (string)$storage['corridor_id'],
            (string)$storage['shelf_id'],
            (string)$storage['tray_id'],
            (string)$storage['chest_id']
        )) {
            $validationContext->setError('storage_place', __('Storage place already exists'));
        }
    }

    /**
     * @param array $storage
     * @param $validationContext
     */
    private function validateStorageFields(array $storage, ValidationContext $validationContext)
    {
        // TODO validate if storage is accessible for specific department (add database field and adjust exists location)
        if (
            (
                empty($storage['location_hash'])
                && empty($storage['room_hash'])
                && empty($storage['corridor_hash'])
                && empty($storage['shelf_hash'])
                && empty($storage['tray_hash'])
                && empty($storage['chest_hash'])
            )
            || empty($storage['name'])
        ) {
            $validationContext->setError('storage_place', __('Nothing defined'));
            return;
        }

        if (empty($storage['location_hash'])) {
            $validationContext->setError('location_hash', __('A location is required for a storage place'));
        }

        if (!empty($storage['location_hash']) && !$this->storageRepository->existsLocation($storage['location_hash'])) {
            $validationContext->setError('location_hash', __('Location does not exist'));
        }

        if (!empty($storage['room_hash']) && !$this->storageRepository->existsRoom($storage['room_hash'])) {
            $validationContext->setError('room_hash', __('Room does not exist'));
        }

        if (!empty($storage['corridor_hash']) && !$this->storageRepository->existsCorridor($storage['corridor_hash'])) {
            $validationContext->setError('corridor_hash', __('Corridor does not exist'));
        }

        if (!empty($storage['shelf_hash']) && !$this->storageRepository->existsShelf($storage['shelf_hash'])) {
            $validationContext->setError('shelf_hash', __('Shelf does not exist'));
        }

        if (!empty($storage['tray_hash']) && !$this->storageRepository->existsTray($storage['tray_hash'])) {
            $validationContext->setError('tray_hash', __('Tray does not exist'));
        }

        if (!empty($storage['chest_hash']) && !$this->storageRepository->existsChest($storage['chest_hash'])) {
            $validationContext->setError('chest_hash', __('Chest does not exist'));
        }
    }
}
