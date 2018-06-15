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
***REMOVED***
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
    ***REMOVED***
        parent::__construct($container);
        $this->participationRepository = $container->get(ParticipationRepository::class);
        $this->participationValidation = $container->get(ParticipationValidation::class);
***REMOVED***

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
    ***REMOVED***
        $params = $this->getLimitationParams($request);
        $params['description_format'] = (string)$request->getParam('description_format') ?: 'both';
        $departmentId = (string)$args['department_hash'];
        $eventId = (string)$args['event_id'];

        $validationContext = $this->participationValidation->validateGetAll($eventId, $departmentId);

        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $participations = $this->participationRepository->getParticipations($eventId, $params['limit'], $params['page'], $departmentId, $params['description_format']);

        if (empty($participations)) ***REMOVED***
            return $this->error($response, __('Not Found'), 404, ['message' => __('No participations found')]);
    ***REMOVED***

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'participations' => $participations,
        ];

        return $this->json($response, $responseData);
***REMOVED***

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
    ***REMOVED***
        $descriptionFormat = (string)$request->getParam('description_format') ?: 'both';
        $userId = (string)$args['user_id'];
        $eventId = (string)$args['event_id'];
        $departmentId = (string)$args['department_hash'];

        $validationContext = $this->participationValidation->validateEventAndUser($eventId, $departmentId, $userId);

        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $participation = $this->participationRepository->getParticipation($eventId, $userId, $departmentId, $descriptionFormat);
        if (empty($participation)) ***REMOVED***
            return $this->error($response, __('Not Found'), 404, ['message' => __('No participation found')]);
    ***REMOVED***

        return $this->json($response, ['participation' => $participation]);
***REMOVED***

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
    ***REMOVED***
        $statusId = $request->getParam('status_id');
        $userId = $request->getParam('user_id');
        $eventId = $args['event_id'];
        $departmentId = $args['department_hash'];

        $validationContext = $this->participationValidation->validateAll($eventId, $departmentId, $userId, $statusId);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 404, $validationContext->getErrors());
    ***REMOVED***

        $id = $this->participationRepository->createParticipation($eventId, $userId, $statusId, $this->jwt['user_id']);

        if (empty($id)) ***REMOVED***
            return $this->error($response, __('Server Error'), 500, ['message' => __('Creating participation failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Created participation successfully')]);
***REMOVED***

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
    ***REMOVED***
        $statusId = $request->getParam('status_id');
        $userId = $args['user_id'];
        $eventId = $args['event_id'];
        $departmentId = $args['department_hash'];

        $validationContext = $this->participationValidation->validateAll($eventId, $departmentId, $userId, $statusId);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 404, $validationContext->getErrors());
    ***REMOVED***

        $updated = $this->participationRepository->updateParticipation($eventId, $userId, $statusId, $this->jwt['user_id']);

        if (!$updated) ***REMOVED***
            return $this->error($response, __('Server Error'), 500, ['message' => __('Updating participation failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Updated participation successfully')]);
***REMOVED***

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
    ***REMOVED***
        $userId = $args['user_id'];
        $eventId = $args['event_id'];
        $departmentId = $args['department_hash'];

        $validationContext = $this->participationValidation->validateEventAndUser($eventId, $departmentId, $userId);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->getErrors());
    ***REMOVED***

        $deleted = $this->participationRepository->deleteParticipation($eventId, $userId, $this->jwt['user_id']);

        if (!$deleted) ***REMOVED***
            return $this->error($response, __('Server Error'), 500, ['message' => __('Deleting participation failed')]);
    ***REMOVED***

        return $this->json($response, ['message' => __('Deleted participation successfully')]);
***REMOVED***

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
    ***REMOVED***
        $eventId = $args['event_id'];
        $departmentId = $args['department_hash'];
        $params = $this->getLimitationParams($request);

        $validationContext = $this->participationValidation->validateGetAll($eventId, $departmentId);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 404, $validationContext->getErrors());
    ***REMOVED***

        $users = $this->participationRepository->getAllParticipatingUsers($eventId, $params['limit'], $params['page']);

        if (empty($users)) ***REMOVED***
            return $this->error($response, __('Server Error'), 500, ['message' => __('Creating participation failed')]);
    ***REMOVED***

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'users' => $users,
        ];
        return $this->json($response, $responseData);
***REMOVED***

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
    ***REMOVED***
        $message = $request->getParam('message');
        $eventId = $args['event_id'];
        $departmentId = $args['department_hash'];

        $validationContext = $this->participationValidation->validateGetAll($eventId, $departmentId);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 404, $validationContext->getErrors());
    ***REMOVED***

        $deleted = $this->participationRepository->cancelEvent($eventId, $message, $this->jwt['user_id']);

        if (!$deleted) ***REMOVED***
            return $this->error($response, __('Server Error'), 500, ['message' => __('Cancelling event failed')]);
    ***REMOVED***

        $responseData = [
            'message' => $message,
        ];
        return $this->json($response, $responseData);
***REMOVED***
***REMOVED***
