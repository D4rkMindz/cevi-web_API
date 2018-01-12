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
        $articles = $this->articleRepository->getAllArticles((int)$args['department_id'],$params['limit'], $params['page']);

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
     * @post int|string location_id
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
        $params = $request->getParams();
        $params['department_id'] = $args['department_id'];
        $validationContext = $this->articleValidation->validateCreateArticle($params);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $articleId = $this->articleRepository->insertArticle($params, $this->jwt['lang'], $this->jwt['user_id']);
        $responseData = [
            'article_id' => $articleId,
            'url' => baseurl('/v2/departments/' . $params['department_id'] . '/articles/' . $articleId),
            'message' => __('Inserted user successfully'),
        ];

        return $this->json($response, $responseData);
***REMOVED***
***REMOVED***
