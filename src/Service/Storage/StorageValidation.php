<?php


namespace App\Service\Storage;


use App\Service\AppValidation;
use App\Util\ValidationContext;
use Slim\Container;

class StorageValidation extends AppValidation
***REMOVED***
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
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
     */
    public function validateStorage(array $storage)
    ***REMOVED***

***REMOVED***

    /**
     * Validate Location.
     *
     * @param string $locationId
     * @param ValidationContext $validationContext
     */
    public function validateLocation(string $locationId, ValidationContext $validationContext)
    ***REMOVED***

***REMOVED***
***REMOVED***
