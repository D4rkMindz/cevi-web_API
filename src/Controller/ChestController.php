<?php


namespace App\Controller;

use App\Repository\DepartmentRepository;
use App\Repository\LocationRepository;
use App\Repository\StorageRepository;
use App\Service\Storage\StorageValidation;
use App\Table\SlChestTable;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class ChestController
 */
class ChestController extends AppController
***REMOVED***
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * @var SlChestTable
     */
    private $slChestTable;

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
     * ChestController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->locationRepository = $container->get(LocationRepository::class);
        $this->slChestTable = $container->get(SlChestTable::class);
        $this->storageRepository = $container->get(StorageRepository::class);
        $this->storageValidation = $container->get(StorageValidation::class);
***REMOVED***

    /**
     * Get all chests.
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
        $chests = $this->locationRepository->getAllStorages($this->slChestTable, $args['department_id'], $params['limit'], $params['page']);

        if (empty($chests)) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('No chests found')]);
    ***REMOVED***

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'chests' => $chests
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Create sl_chest
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

        $json = (string)$request->getBody();
        $data = json_decode($json, true);

        $validationContext = $this->storageValidation->validateLocation($data, false);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $created = $this->locationRepository->createStorage($this->slChestTable, $data['name'], $this->jwt['user_id']);
        if (!$created) ***REMOVED***
            return $this->error($response, __('Creating chest failed'), 422, ['message' => __('Creating chest failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Created chest successfully')]);
***REMOVED***

    /**
     * Create sl_chest
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

        $json = (string)$request->getBody();
        $params = json_decode($json, true);
        $params['storage_id'] = $args['storage_id'];

        $validationContext = $this->storageValidation->validateUpdateStorage($params);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $created = $this->locationRepository->updateStorage($this->slChestTable, $args['storage_id'], $params['name'], $this->jwt['user_id']);
        if (!$created) ***REMOVED***
            return $this->error($response, __('Updating chest failed'), 422, ['message' => __('Updating chest failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Updated chest successfully')]);
***REMOVED***

    /**
     * Update sl_chest.
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


        $json = (string)$request->getBody();
        $data = json_decode($json, true);
        $data['storage_id'] = $args['storage_id'];

        $validationContext = $this->storageValidation->validateDelete($data);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $updated = $this->locationRepository->deleteStorage($this->slChestTable, $args['storage_id'], $this->jwt['user_id']);
        if (!$updated) ***REMOVED***
            return $this->error($response, __('Deleting chest failed'), 422, ['message' => __('Deleting chest failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Deleted chest successfully')]);
***REMOVED***
***REMOVED***
