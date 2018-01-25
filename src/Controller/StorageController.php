<?php


namespace App\Controller;


use App\Repository\ArticleRepository;
use App\Repository\DepartmentRepository;
use App\Repository\StorageRepository;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class StorageController extends AppController
***REMOVED***
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
     * StorageController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->storageRepository = $container->get(StorageRepository::class);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->articleRepository = $container->get(ArticleRepository::class);
***REMOVED***

    /**
     * Get all storage places.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getAllStoragePlacesAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        if (!$this->departmentRepository->existsDepartment($args['department_id'])) ***REMOVED***
            return $this->error($response, __('Department does not exist'), 404, ['message' => __('Department does not exist')]);
    ***REMOVED***

        $reqArgs = $this->getLimitationParams($request);
        $storagePlaces = $this->storageRepository->getAllStorages($args['department_id'], $reqArgs['limit'], $reqArgs['page']);

        if (empty($storagePlaces)) ***REMOVED***
            return $this->error($response, __('No storage places found'), 404, ['message' => __('No storage places found')]);
    ***REMOVED***

        return $this->json($response, $storagePlaces);
***REMOVED***

    /**
     * Get single storage place.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getStoragPlaceAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        if (!$this->departmentRepository->existsDepartment($args['department_id'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department does not exist')]);
    ***REMOVED***

        if (!$this->storageRepository->existsStorageById($args['storage_id'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Storage place does not exist')]);
    ***REMOVED***

        $descriptionFormat = $request->getParam('description_format') ?: 'both';

        $storagePlace = $this->storageRepository->getStorage((string)$args['department_id'], (string)$args['storage_id']);
        $articles = $this->articleRepository->getArticleForStorageplace($args['storage_id'], $descriptionFormat);

        if (empty($storagePlace)) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Storage place does not exits')]);
    ***REMOVED***

        $responseData = [
            'storage_place' => $storagePlace,
            'articles' => $articles,
        ];

        return $this->json($response, $responseData, 200);
***REMOVED***
***REMOVED***
