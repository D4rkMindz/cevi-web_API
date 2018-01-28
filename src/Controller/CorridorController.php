<?php


namespace App\Controller;

use App\Repository\DepartmentRepository;
use App\Repository\LocationRepository;
use App\Repository\StorageRepository;
use App\Service\Storage\StorageValidation;
use App\Table\SlCorridorTable;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class CorridorController
 */
class CorridorController extends AppController
***REMOVED***
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * @var SlCorridorTable
     */
    private $slCorridorTable;

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
     * CorridorController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->locationRepository = $container->get(LocationRepository::class);
        $this->slCorridorTable = $container->get(SlCorridorTable::class);
        $this->storageRepository = $container->get(StorageRepository::class);
        $this->storageValidation = $container->get(StorageValidation::class);
***REMOVED***

    /**
     * Get all corridors.
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
        if (!$this->departmentRepository->existsDepartment($args['department_id'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***

        $params = $this->getLimitationParams($request);
        $corridors = $this->locationRepository->getAllStorages($this->slCorridorTable, $args['department_id'], $params['limit'], $params['page']);

        if (empty($corridors)) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('No corridors found')]);
    ***REMOVED***

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'corridors' => $corridors
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Create sl_corridor
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function createLocation(Request $request, Response $response, array $args): Response
    ***REMOVED***
        if (!$this->departmentRepository->existsDepartment($args['department_id'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***

        $params = $request->getParams();

        $validationContext = $this->storageValidation->validateLocation($params, false);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $created = $this->locationRepository->createStorage($this->slCorridorTable, $params['name'], $this->jwt['user_id']);
        if (!$created) ***REMOVED***
            return $this->error($response, __('Creating corridor failed'), 422, ['message' => __('Creating corridor failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Created corridor successfully')]);
***REMOVED***

    /**
     * Create sl_corridor
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function updateLocation(Request $request, Response $response, array $args): Response
    ***REMOVED***
        if (!$this->departmentRepository->existsDepartment($args['department_id'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***


        $params = $request->getParams();
        $params['storage_id'] = $args['storage_id'];

        $validationContext = $this->storageValidation->validateDelete($params);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $created = $this->locationRepository->updateStorage($this->slCorridorTable, $args['storage_id'], $params['name'], $this->jwt['user_id']);
        if (!$created) ***REMOVED***
            return $this->error($response, __('Updating corridor failed'), 422, ['message' => __('Updating corridor failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Updated corridor successfully')]);
***REMOVED***

    /**
     * Update sl_corridor.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteLocation(Request $request, Response $response, array $args): Response
    ***REMOVED***
        if (!$this->departmentRepository->existsDepartment($args['department_id'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***


        $params = $request->getParams();
        $params['storage_id'] = $args['storage_id'];

        $validationContext = $this->storageValidation->validateLocation($params);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $updated = $this->locationRepository->deleteStorage($this->slCorridorTable, $args['storage_id'], $this->jwt['user_id']);
        if (!$updated) ***REMOVED***
            return $this->error($response, __('Deleting corridor failed'), 422, ['message' => __('Deleting corridor failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Deleted corridor successfully')]);
***REMOVED***
***REMOVED***
