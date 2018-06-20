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
{
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
    {
        parent::__construct($container);
        $this->eventArticleRepository = $container->get(EventArticleRepository::class);
        $this->eventArticleValidation = $container->get(EventArticleValidation::class);
    }

    /**
     * Get all articles.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getAllAction(Request $request, Response $response, array $args): Response
    {
        $departmentId = (string)$args['department_hash'];
        $eventId = (string)$args['event_id'];
        $descriptionFormat = $request->getParam('description_format');
        $articleDescriptionFormat = $request->getParam('article_description_format');

        if (!$this->eventArticleValidation->isPossibleForEvent($departmentId, $eventId)) {
            return $this->error($response, __('Not Found'));
        }

        $event = $this->eventArticleRepository->getAllArticles($eventId, $departmentId, $descriptionFormat, $articleDescriptionFormat);

        if (empty($event)) {
            return $this->error($response, __('Not found'), 404, ['message' => __('No articles for event found')]);
        }

        return $event;
    }

    /**
     * Link article.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function linkArticleAction(Request $request, Response $response, array $args): Response
    {
        $departmentId = (string)$args['department_hash'];
        $eventId = (string)$args['event_id'];
        $articleId = (string)$request->getParam('article_id');
        $accountableUser = (string)$request->getParam('accountable_user_id');
        $quantity = (int)$request->getParam('quantity');

        $validationContext = $this->eventArticleValidation->isPossible($departmentId, $eventId, $articleId, $quantity, $accountableUser);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->getErrors());
        }

        $linked = $this->eventArticleRepository->linkArticle($eventId, $articleId, $accountableUser, $quantity, $this->jwt['user_id']);

        if (empty($linked)) {
            return $this->error($response, __('Server Error'), 500, __('Linking article failed'));
        }

        $responseData = [
            'code' => 200,
            'message' => __('Linked article successfully')
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Unlink article from event.
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function unlinkArticleAction(Request $request, Response $response, array $args): Response
    {
        $eventId = (string)$args['event_id'];
        $articleId = (string)$args['article_id'];
        if ($this->eventArticleValidation->existsLink($eventId, $articleId)) {
            return $this->error($response, __('Not found'));
        }

        $unlinked = $this->eventArticleRepository->removeLinkedArticle($eventId, $articleId, $this->jwt['user_id']);
        if (!$unlinked) {
            return $this->error($response, __('Server Error'), 500, ['message' => __('Unlinking article and event failed')]);
        }

        return $this->json($response, ['code' => 200, 'message' => __('Unlinked article and event successfully')]);
    }
}