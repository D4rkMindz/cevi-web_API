<?php


namespace App\Controller;


use App\Repository\ArticleRepository;
use App\Repository\DepartmentRepository;
use App\Repository\StorageRepository;
use App\Service\Storage\StorageValidation;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class StorageController extends AppController
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * @var StorageRepository
     */
    private $storageRepository;

    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * @var StorageValidation
     */
    private $storageValidation;

    /**
     * StorageController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->storageRepository = $container->get(StorageRepository::class);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->articleRepository = $container->get(ArticleRepository::class);
        $this->storageValidation = $container->get(StorageValidation::class);
    }

    /**
     * Get all storage places.
     *
     * @auth JWT
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getAllStoragePlacesAction(Request $request, Response $response, array $args): Response
    {
        if (!$this->departmentRepository->existsDepartment($args['department_hash'])) {
            return $this->error($response, __('Department does not exist'), 404, ['message' => __('Department does not exist')]);
        }

        $reqArgs = $this->getLimitationParams($request);
        $storagePlaces = $this->storageRepository->getAllStorages($args['department_hash'], $reqArgs['limit'], $reqArgs['page']);

        if (empty($storagePlaces)) {
            return $this->error($response, __('No storage places found'), 404, ['message' => __('No storage places found')]);
        }

        $responseData = [];
        $responseData['page'] = (int)$storagePlaces['page'];
        $responseData['limit'] = (int)$storagePlaces['limit'];
        unset($storagePlaces['limit']);
        unset($storagePlaces['page']);
        $responseData['storage_places'] = $storagePlaces;


        return $this->json($response, $responseData);
    }

    /**
     * Get single storage place.
     *
     * @auth JWT
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getStoragPlaceAction(Request $request, Response $response, array $args): Response
    {
        if (!$this->departmentRepository->existsDepartment($args['department_hash'])) {
            return $this->error($response, __('Not found'), 404, ['message' => __('Department does not exist')]);
        }

        if (!$this->storageRepository->existsStorageById($args['storage_id'])) {
            return $this->error($response, __('Not found'), 404, ['message' => __('Storage place does not exist')]);
        }

        $descriptionFormat = $request->getParam('description_format') ?: 'both';

        $storagePlace = $this->storageRepository->getStorage((string)$args['department_hash'], (string)$args['storage_id']);
        $articles = $this->articleRepository->getArticleForStorageplace($args['storage_id'], $args['department_hash'], $descriptionFormat);

        if (empty($storagePlace)) {
            return $this->error($response, __('Not found'), 404, ['message' => __('Storage place does not exist')]);
        }

        $responseData = [
            'storage_place' => $storagePlace,
            'articles' => $articles,
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Create storage place.
     *
     *
     * @auth JWT
     * @post string|null name
     * @post string|int|null location_id
     * @post string|int|null room_id
     * @post string|int|null corridor_id
     * @post string|int|null shelf_id
     * @post string|int|null tray_id
     * @post string|int|null chest_id
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function createStoragePlaceAction(Request $request, Response $response, array $args): Response
    {
        if (!$this->departmentRepository->existsDepartment($args['department_hash'])) {
            return $this->error($response, __('Not found'), 404, ['message' => __('Department does not exits')]);
        }

        $json = (string)$request->getBody();
        $params = json_decode($json, true);

        $validationContext = $this->storageValidation->validateStorage($params);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
        }

        $storageId = $this->storageRepository->createStorage($args['department_hash'], $params, $this->jwt['user_id']);
        $responseData = [
            'info' => [
                'url' => baseurl('/v2/departments/' . $args['department_hash'] . '/storages/' . $storageId),
                'message' => __('Created storage place successfully'),
            ],
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Update storage place
     *
     * @auth JWT
     * @put string|null name
     * @put string|int|null location_id
     * @put string|int|null room_id
     * @put string|int|null corridor_id
     * @put string|int|null shelf_id
     * @put string|int|null tray_id
     * @put string|int|null chest_id
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function updateStoragePlaceAction(Request $request, Response $response, array $args): Response
    {
        if (
            !$this->departmentRepository->existsDepartment($args['department_hash'])
            || !$this->storageRepository->existsStorageById($args['storage_id'])
        ) {
            return $this->error($response, __('Not found'), 404, ['message' => __('Storage place does not exits')]);
        }

        $json = (string)$request->getBody();
        $params = json_decode($json, true);
        $validationContext = $this->storageValidation->validateUpdateStorage($params);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
        }

        $updated = $this->storageRepository->updateStorage($args['department_hash'], $args['storage_id'], $params, $this->jwt['user_id']);
        if (!$updated) {
            return $this->error($response, __('Server Error'), 500, ['message' => __('Updating storage place failed')]);
        }
        return $this->json($response, ['message' => __('Updated storage place successfullly')]);
    }

    /**
     * Delete storage
     *
     * @auth JWT
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteStoragePlaceAction(Request $request, Response $response, array $args): Response
    {
        if (
            !$this->departmentRepository->existsDepartment($args['department_hash'])
            || !$this->storageRepository->existsStorageById($args['storage_id'])
        ) {
            return $this->error($response, __('Not found'), 404, ['message' => __('Storage place does not exits')]);
        }

        $deleted = $this->storageRepository->deleteStorage($args['department_hash'], $args['storage_id'], $this->jwt['user_id']);
        if (!$deleted) {
            return $this->error($response, __('Server error'), 500, ['message' => __('Deleting storage place failed')]);
        }

        return $this->json($response, ['message' => __('Deleted storage place successfully')]);
    }
}
