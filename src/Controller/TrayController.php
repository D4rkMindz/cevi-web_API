<?php


namespace App\Controller;

use App\Repository\DepartmentRepository;
use App\Repository\LocationRepository;
use App\Repository\StorageRepository;
use App\Service\Storage\StorageValidation;
use App\Table\SlTrayTable;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class TrayController
 */
class TrayController extends AppController
***REMOVED***
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * @var SlTrayTable
     */
    private $slTrayTable;

    /**
     * @var LocationRepository
     */
    private $locationRepository;

    /**
     * @var StorageRepository
     */
    private $storageRepository;

    /**
     * @var StorageValidation
     */
    private $storageValidation;

    /**
     * TrayController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->locationRepository = $container->get(LocationRepository::class);
        $this->slTrayTable = $container->get(SlTrayTable::class);
        $this->storageRepository = $container->get(StorageRepository::class);
        $this->storageValidation = $container->get(StorageValidation::class);
***REMOVED***

    /**
     * Get all trays.
     *
     * @auth JWT
     * @get string|int|null limit
     * @get string|int|null page
     * @get string|int|null offset
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getAllLocationsAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        if (!$this->departmentRepository->existsDepartment($args['department_hash'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***

        $params = $this->getLimitationParams($request);
        $trays = $this->locationRepository->getAllStorages($this->slTrayTable, $args['department_hash'], $params['limit'], $params['page']);

        if (empty($trays)) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('No trays found')]);
    ***REMOVED***

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'trays' => $trays
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Create sl_tray
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function createLocation(Request $request, Response $response, array $args): Response
    ***REMOVED***
        if (!$this->departmentRepository->existsDepartment($args['department_hash'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***

        $json = (string)$request->getBody();
        $params = json_decode($json, true);

        $validationContext = $this->storageValidation->validateLocation($params, false);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $created = $this->locationRepository->createStorage($this->slTrayTable, $params['name'], $this->jwt['user_id']);
        if (!$created) ***REMOVED***
            return $this->error($response, __('Creating tray failed'), 422, ['message' => __('Creating tray failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Created tray successfully')]);
***REMOVED***

    /**
     * Create sl_tray
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function updateLocation(Request $request, Response $response, array $args): Response
    ***REMOVED***
        if (!$this->departmentRepository->existsDepartment($args['department_hash'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***

        $json = (string)$request->getBody();
        $params = json_decode($json, true);        $params['storage_id'] = $args['storage_id'];

        $validationContext = $this->storageValidation->validateLocation($params);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $created = $this->locationRepository->updateStorage($this->slTrayTable, $args['storage_id'], $params['name'], $this->jwt['user_id']);
        if (!$created) ***REMOVED***
            return $this->error($response, __('Updating tray failed'), 422, ['message' => __('Updating tray failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Updated tray successfully')]);
***REMOVED***

    /**
     * Update sl_tray.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteLocation(Request $request, Response $response, array $args): Response
    ***REMOVED***
        if (!$this->departmentRepository->existsDepartment($args['department_hash'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***

        $json = (string)$request->getBody();
        $params = json_decode($json, true);
        $params['storage_id'] = $args['storage_id'];

        $validationContext = $this->storageValidation->validateDelete($params);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $updated = $this->locationRepository->deleteStorage($this->slTrayTable, $args['storage_id'], $this->jwt['user_id']);
        if (!$updated) ***REMOVED***
            return $this->error($response, __('Deleting tray failed'), 422, ['message' => __('Deleting tray failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Deleted tray successfully')]);
***REMOVED***
***REMOVED***
