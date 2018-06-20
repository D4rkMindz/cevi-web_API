<?php


namespace App\Controller;

use App\Repository\DepartmentRepository;
use App\Repository\LocationRepository;
use App\Repository\StorageRepository;
use App\Service\Storage\StorageValidation;
use App\Table\SlShelfTable;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class ShelfController
 */
class ShelfController extends AppController
{
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * @var SlShelfTable
     */
    private $slShelfTable;

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
     * ShelfController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->locationRepository = $container->get(LocationRepository::class);
        $this->slShelfTable = $container->get(SlShelfTable::class);
        $this->storageRepository = $container->get(StorageRepository::class);
        $this->storageValidation = $container->get(StorageValidation::class);
    }

    /**
     * Get all shelfs.
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
    {
        if (!$this->departmentRepository->existsDepartment($args['department_hash'])) {
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
        }

        $params = $this->getLimitationParams($request);
        $shelfs = $this->locationRepository->getAllStorages($this->slShelfTable, $args['department_hash'], $params['limit'], $params['page']);

        if (empty($shelfs)) {
            return $this->error($response, __('Not found'), 404, ['message' => __('No shelfs found')]);
        }

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'shelfs' => $shelfs
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Create sl_shelf
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function createLocation(Request $request, Response $response, array $args): Response
    {
        if (!$this->departmentRepository->existsDepartment($args['department_hash'])) {
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
        }

        $json = (string)$request->getBody();
        $params = json_decode($json, true);

        $validationContext = $this->storageValidation->validateLocation($params, false);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
        }

        $created = $this->locationRepository->createStorage($this->slShelfTable, $params['name'], $this->jwt['user_id']);
        if (!$created) {
            return $this->error($response, __('Creating shelf failed'), 422, ['message' => __('Creating shelf failed')]);
        }

        return $this->json($response, ['message' => __('Created shelf successfully')]);
    }

    /**
     * Create sl_shelf
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function updateLocation(Request $request, Response $response, array $args): Response
    {
        if (!$this->departmentRepository->existsDepartment($args['department_hash'])) {
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
        }

        $json = (string)$request->getBody();
        $params = json_decode($json, true);
        $params['storage_id'] = $args['storage_id'];

        $validationContext = $this->storageValidation->validateLocation($params);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
        }

        $created = $this->locationRepository->updateStorage($this->slShelfTable, $args['storage_id'], $params['name'], $this->jwt['user_id']);
        if (!$created) {
            return $this->error($response, __('Updating shelf failed'), 422, ['message' => __('Updating shelf failed')]);
        }

        return $this->json($response, ['message' => __('Updated shelf successfully')]);
    }

    /**
     * Update sl_shelf.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteLocation(Request $request, Response $response, array $args): Response
    {
        if (!$this->departmentRepository->existsDepartment($args['department_hash'])) {
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
        }

        $json = (string)$request->getBody();
        $params = json_decode($json, true);
        $params['storage_id'] = $args['storage_id'];

        $validationContext = $this->storageValidation->validateDelete($params);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
        }

        $updated = $this->locationRepository->deleteStorage($this->slShelfTable, $args['storage_id'], $this->jwt['user_id']);
        if (!$updated) {
            return $this->error($response, __('Deleting shelf failed'), 422, ['message' => __('Deleting shelf failed')]);
        }

        return $this->json($response, ['message' => __('Deleted shelf successfully')]);
    }
}
