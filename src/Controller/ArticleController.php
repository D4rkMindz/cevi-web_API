<?php


namespace App\Controller;


use App\Repository\ArticleRepository;
use App\Service\Article\ArticleValidation;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class ArticleController extends AppController
***REMOVED***
    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * @var ArticleValidation
     */
    private $articleValidation;

    /**
     * ArticleController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->articleRepository = $container->get(ArticleRepository::class);
        $this->articleValidation = $container->get(ArticleValidation::class);
***REMOVED***

    /**
     * Get article.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getArticleAction(Request $request, Response $response, array $args)
    ***REMOVED***
        $article = $this->articleRepository->getArticle($args['department_id'], $args['article_id']);

        if (empty($articles)) ***REMOVED***
            return $this->error($response, 'Not found', 404, ['message' => __('No article found')]);
    ***REMOVED***

        return $this->json($response, ['article' => $article]);
***REMOVED***

    /**
     * Get all articles
     *
     * @auth JWT
     * @get int|string limit
     * @get int|string page
     * @get int|string offset
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getAllArticlesAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $params = $this->getLimitationParams($request);
        $params['description_format'] = (string) $request->getParam('description_format');
        $articles = $this->articleRepository->getAllArticles((int)$args['department_id'], $params['limit'], $params['page'], $params['description_format']);

        if (empty($articles)) ***REMOVED***
            return $this->error($response, 'Not found', 404, ['message' => __('No articles found')]);
    ***REMOVED***

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'articles' => $articles,
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Create article.
     *
     * @auth JWT
     * @post string title ***REMOVED***3|255***REMOVED***
     * @post string description ***REMOVED***10|10000***REMOVED***
     * @post int purchase_date Time of the article purchase as time(). Cannot be more than one year in the future
     * @post int quanity ***REMOVED***0|10000***REMOVED***
     * @post int quality_id
     * @post int|string|null storage_place_id (prioritized)
     * @post int|string|null location_id
     * @post int|string|null room_id
     * @post int|string|null corridor_id
     * @post int|string|null shelf_id
     * @post int|string|null tray_id
     * @post int|string|null chest_id
     * @post string|null storage_place_name Name of the storage place (if not exists, it will be created).
     * @post int|string|null replacement_date Date of the required replacement in the future (maybe also in the past) as time()
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function createArticleAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $json = (string)$request->getBody();
        $data = json_decode($json, true);;
        $data['department_id'] = $args['department_id'];
        $validationContext = $this->articleValidation->validateCreateArticle($data);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $articleId = $this->articleRepository->insertArticle($data, $this->jwt['lang'], $this->jwt['user_id']);
        $responseData = [
            'article_id' => $articleId,
            'url' => baseurl('/v2/departments/' . $data['department_id'] . '/articles/' . $articleId),
            'message' => __('Inserted article successfully'),
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Update article
     *
     * @auth JWT
     * @post string|null title ***REMOVED***3|255***REMOVED***
     * @post string|null description ***REMOVED***10|10000***REMOVED***
     * @post int|null purchase_date Time of the article purchase as time(). Cannot be more than one year in the future
     * @post int|null quanity ***REMOVED***0|10000***REMOVED***
     * @post int|null quality_id
     * @post int|string|null storage_place_id (prioritized)
     * @post int|string|null location_id
     * @post int|string|null room_id
     * @post int|string|null corridor_id
     * @post int|string|null shelf_id
     * @post int|string|null tray_id
     * @post int|string|null chest_id
     * @post string|null storage_place_name Name of the storage place (if not exists, it will be created).
     * @post int|string|null replacement_date Date of the required replacement in the future (maybe also in the past) as time()
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function updateArticleAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $json = (string)$request->getBody();
        $data = json_decode($json, true);
        $data['department_id'] = $args['department_id'];
        $data['article_id'] = $args['article_id'];

        $validationContext = $this->articleValidation->validateUpdate($data);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $updated = $this->articleRepository->updateArticle($data, $this->jwt['lang'], $this->jwt['user_id']);

        if (!$updated) ***REMOVED***
            return $this->error($response, __('Updating article failed'), 422, ['message' => __('Updating article failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Updated article successfully')]);
***REMOVED***

    /**
     * Delete article action.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteArticleAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $articleExists = $this->articleRepository->existsArticle((string)$args['article_id'], (string)$args['department_id']);
        if (!$articleExists || !$this->articleRepository->deleteArticle((string)$args['article_id'], $this->jwt['user_id'])) ***REMOVED***
            $this->error($response, 'Not found', 404, ['message' => __('Deleting article failed')]);
    ***REMOVED***
        return $this->json($response, ['message' => __('Deleted article successfully')]);
***REMOVED***

    /**
     * Get all qualities.
     *
     * @auth none
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function getQualitiesAction(Request $request, Response $response): Response
    ***REMOVED***
        $qualities = $this->articleRepository->getQualities();
        return $this->json($response, ['qualities' => $qualities]);
***REMOVED***
***REMOVED***
