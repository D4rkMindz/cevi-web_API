<?php


namespace App\Controller;
use App\Repository\EventArticleRepository;
use App\Service\EventArticle\EventArticleValidation;
use Interop\Container\Exception\ContainerException;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class EventArticleController
 */
class EventArticleController extends AppController
***REMOVED***
    /**
     * @var EventArticleRepository
     */
    private $eventArticleRepository;

    /**
     * @var EventArticleValidation
     */
    private $eventArticleValidation;

    /**
     * EventArticleController constructor.
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->eventArticleRepository = $container->get(EventArticleRepository::class);
        $this->eventArticleValidation = $container->get(EventArticleValidation::class);
***REMOVED***

    /**
     * Get all articles.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getAllAcion(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $departmentId = (string)$args['department_id'];
        $eventId = (string)$args['event_id'];
        $descriptionFormat = $request->getParam('description_format');
        $articleDescriptionFormat = $request->getParam('article_description_format');

        if (!$this->eventArticleValidation->isPossibleForEvent($departmentId, $eventId)) ***REMOVED***
            return $this->error($response, __('Not Found'));
    ***REMOVED***

        $event = $this->eventArticleRepository->getAllArticles($eventId, $descriptionFormat, $articleDescriptionFormat);

        if (empty($event)) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('No articles for event found')]);
    ***REMOVED***

        return $event;
***REMOVED***

    /**
     * Link article.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function linkArticleAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $departmentId = (string)$args['department_id'];
        $eventId = (string)$args['event_id'];
        $articleId = (string)$request->getParam('article_id');
        $accountableUser = (string)$request->getParam('accountable_user_id');
        $quantity = (int)$request->getParam('quantity');

        $validationContext = $this->eventArticleValidation->isPossible($departmentId, $eventId, $articleId, $quantity, $accountableUser);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->getErrors());
    ***REMOVED***

        $linked = $this->eventArticleRepository->linkArticle($eventId, $articleId, $accountableUser, $quantity, $this->jwt['user_id']);

        if (empty($linked)) ***REMOVED***
            return $this->error($response, __('Server Error'), 500, __('Linking article failed'));
    ***REMOVED***

        $responseData = [
            'code' => 200,
            'message' => __('Linked article successfully')
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Unlink article from event.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function unlinkArticleAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $eventId = (string)$args['event_id'];
        $articleId = (string)$args['article_id'];
        if ($this->eventArticleValidation->existsLink($eventId, $articleId)) ***REMOVED***
            return $this->error($response, __('Not found'));
    ***REMOVED***

        $unlinked = $this->eventArticleRepository->removeLinkedArticle($eventId, $articleId, $this->jwt['user_id']);
        if (!$unlinked) ***REMOVED***
            return $this->error($response, __('Server Error'), 500, ['message' => __('Unlinking article and event failed')]);
    ***REMOVED***

        return $this->json($response, ['code' => 200, 'message' => __('Unlinked article and event successfully')]);
***REMOVED***
***REMOVED***