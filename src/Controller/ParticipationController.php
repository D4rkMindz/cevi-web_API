<?php


namespace App\Controller;

use App\Repository\ParticipationRepository;
use App\Service\Participation\ParticipationValidation;
use Interop\Container\Exception\ContainerException;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class ParticipationController
 */
class ParticipationController extends AppController
{
    /**
     * @var ParticipationRepository
     */
    private $participationRepository;

    /**
     * @var ParticipationValidation
     */
    private $participationValidation;

    /**
     * ParticipationController constructor.
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->participationRepository = $container->get(ParticipationRepository::class);
        $this->participationValidation = $container->get(ParticipationValidation::class);
    }

    /**
     * Get all participations action.
     *
     * @auth JWT
     * @get int|string|null limit
     * @get int|string|null offset
     * @get int|string|null page
     * @get string|null description_format "plain"|"parsed"|"both"(default)
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getAllParticipationsAction(Request $request, Response $response, array $args): Response
    {
        $params = $this->getLimitationParams($request);
        $params['description_format'] = (string)$request->getParam('description_format') ?: 'both';
        $departmentId = (string)$args['department_hash'];
        $eventId = (string)$args['event_id'];

        $validationContext = $this->participationValidation->validateGetAll($eventId, $departmentId);

        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
        }

        $participations = $this->participationRepository->getParticipations($eventId, $params['limit'], $params['page'], $departmentId, $params['description_format']);

        if (empty($participations)) {
            return $this->error($response, __('Not Found'), 404, ['message' => __('No participations found')]);
        }

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'participations' => $participations,
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Get single participation.
     *
     * @auth JWT
     * @get string|null description_format "plain"|"parsed"|"both"(default)
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getParticipationAction(Request $request, Response $response, array $args): Response
    {
        $descriptionFormat = (string)$request->getParam('description_format') ?: 'both';
        $userId = (string)$args['user_id'];
        $eventId = (string)$args['event_id'];
        $departmentId = (string)$args['department_hash'];

        $validationContext = $this->participationValidation->validateEventAndUser($eventId, $departmentId, $userId);

        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
        }

        $participation = $this->participationRepository->getParticipation($eventId, $userId, $departmentId, $descriptionFormat);
        if (empty($participation)) {
            return $this->error($response, __('Not Found'), 404, ['message' => __('No participation found')]);
        }

        return $this->json($response, ['participation' => $participation]);
    }

    /**
     * Create participation.
     *
     * @auth JWT
     * @post int|string status_id
     * @post int|string user_id
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function createParticipationAction(Request $request, Response $response, array $args): Response
    {
        $statusId = $request->getParam('status_id');
        $userId = $request->getParam('user_id');
        $eventId = $args['event_id'];
        $departmentId = $args['department_hash'];

        $validationContext = $this->participationValidation->validateAll($eventId, $departmentId, $userId, $statusId);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 404, $validationContext->getErrors());
        }

        $id = $this->participationRepository->createParticipation($eventId, $userId, $statusId, $this->jwt['user_id']);

        if (empty($id)) {
            return $this->error($response, __('Server Error'), 500, ['message' => __('Creating participation failed')]);
        }

        return $this->json($response, ['message' => __('Created participation successfully')]);
    }

    /**
     * Update participation
     *
     * @auth JWT
     * @put int|string status_id
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function updateParticipationAction(Request $request, Response $response, array $args): Response
    {
        $statusId = $request->getParam('status_id');
        $userId = $args['user_id'];
        $eventId = $args['event_id'];
        $departmentId = $args['department_hash'];

        $validationContext = $this->participationValidation->validateAll($eventId, $departmentId, $userId, $statusId);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 404, $validationContext->getErrors());
        }

        $updated = $this->participationRepository->updateParticipation($eventId, $userId, $statusId, $this->jwt['user_id']);

        if (!$updated) {
            return $this->error($response, __('Server Error'), 500, ['message' => __('Updating participation failed')]);
        }

        return $this->json($response, ['message' => __('Updated participation successfully')]);
    }

    /**
     * Delete participation.
     *
     * @auth JWT
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteParticipationAction(Request $request, Response $response, array $args): Response
    {
        $userId = $args['user_id'];
        $eventId = $args['event_id'];
        $departmentId = $args['department_hash'];

        $validationContext = $this->participationValidation->validateEventAndUser($eventId, $departmentId, $userId);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->getErrors());
        }

        $deleted = $this->participationRepository->deleteParticipation($eventId, $userId, $this->jwt['user_id']);

        if (!$deleted) {
            return $this->error($response, __('Server Error'), 500, ['message' => __('Deleting participation failed')]);
        }

        return $this->json($response, ['message' => __('Deleted participation successfully')]);
    }

    /**
     * Get all participating users.
     *
     * @auth JWT
     * @get
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getParticipatingUsersAction(Request $request, Response $response, array $args): Response
    {
        $eventId = $args['event_id'];
        $departmentId = $args['department_hash'];
        $params = $this->getLimitationParams($request);

        $validationContext = $this->participationValidation->validateGetAll($eventId, $departmentId);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 404, $validationContext->getErrors());
        }

        $users = $this->participationRepository->getAllParticipatingUsers($eventId, $params['limit'], $params['page']);

        if (empty($users)) {
            return $this->error($response, __('Server Error'), 500, ['message' => __('Creating participation failed')]);
        }

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'users' => $users,
        ];
        return $this->json($response, $responseData);
    }

    /**
     * Delete all participations and give a message (reason)
     *
     * @auth JWT
     * @delete string message
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteAllParticipationsAction(Request $request, Response $response, array $args): Response
    {
        $message = $request->getParam('message');
        $eventId = $args['event_id'];
        $departmentId = $args['department_hash'];

        $validationContext = $this->participationValidation->validateGetAll($eventId, $departmentId);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 404, $validationContext->getErrors());
        }

        $deleted = $this->participationRepository->cancelEvent($eventId, $message, $this->jwt['user_id']);

        if (!$deleted) {
            return $this->error($response, __('Server Error'), 500, ['message' => __('Cancelling event failed')]);
        }

        $responseData = [
            'message' => $message,
        ];
        return $this->json($response, $responseData);
    }
}
