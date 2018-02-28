<?php


namespace App\Controller;


use App\Repository\DepartmentRepository;
use App\Repository\EventRepository;
use App\Service\Event\EventValidation;
use Interop\Container\Exception\ContainerException;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class EventController extends AppController
***REMOVED***
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * @var EventRepository
     */
    private $eventRepository;

    /**
     * @var EventValidation
     */
    private $eventValidation;

    /**
     * EventController constructor.
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->eventRepository = $container->get(EventRepository::class);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->eventValidation = $container->get(EventValidation::class);
***REMOVED***

    /**
     * Get all events of a department including private and passed events.
     *
     * @auth none
     * @get int|string|null limit
     * @get int|string|null offset
     * @get int|string|null page
     * @get int|string|null since as time in seconds
     * @get int|string|null until as time in seconds
     * @get string|null description_format "plain"|"parsed"|"both"(default)
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getAllEventsAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $params = $this->getLimitationParams($request);
        $data = $request->getParams();

        $until = isset($data['until']) ? $data['until'] : time() + (60 * 60 * 24 * 365 * 2);
        $since = isset($data['since']) ? $data['until'] : time();
        $descriptionFormat = isset($data['description_format']) ? $data['description_format'] : 'both';

        $department = $args['department_id'];
        if (!$this->departmentRepository->existsDepartment($department)) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***

        // Set description format to plain or parsed if it is exactly like this. If not set it to both
        $params['description_format'] = $descriptionFormat === 'plain' || $descriptionFormat === 'parsed' ? $descriptionFormat : 'both';

        $events = $this->eventRepository->getEvents($params['limit'], $params['page'], $until, '', $department, $since, $params['description_format'], false);
        if (empty($events)) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('No events found')]);
    ***REMOVED***

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'since' => $since,
            'until' => $until,
            'events' => $events,
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Create event action.
     *
     * @auth JWT
     * @post string title
     * @post string description
     * @post int|string start as time in seconds
     * @post int|string end as time in seconds
     * @post int|string start_leaders as time in seconds
     * @post int|string end_leaders as time in seconds
     * @post float price
     * @post bool public
     * @post int|string|null publicize_at required if public is true
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function createEventAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $data = $request->getParams();

        $departmentId = $args['department_id'];
        if (!$this->departmentRepository->existsDepartment($departmentId))***REMOVED***
            return $this->error($response, __('Not found'), ['message'=> __('Department not found')]);
    ***REMOVED***

        $validationContext = $this->eventValidation->validateCreate($data);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $eventId = $this->eventRepository->createEvent($data, $this->jwt['lang'], $this->jwt['user_id']);

        $responseData = [
            'article_id' => $eventId,
            'url' => baseurl('/v2/departments/' . $departmentId . '/events/' . $eventId),
            'message' => __('Inserted event successfully'),
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Get single event
     *
     * @auth none
     * @get int|string|null limit
     * @get int|string|null offset
     * @get int|string|null page
     * @get int|string|null since as time in seconds
     * @get int|string|null until as time in seconds
     * @get string|null description_format "plain"|"parsed"|"both"(default)
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getEventAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $params = $this->getLimitationParams($request);
        $data = $request->getParams();

        $until = isset($data['until']) ? $data['until'] : time() + (60 * 60 * 24 * 365 * 2);
        $since = isset($data['since']) ? $data['until'] : time();
        $descriptionFormat = isset($data['description_format']) ? $data['description_format'] : 'both';

        $department = (string)$args['department_id'];
        if (!$this->departmentRepository->existsDepartment($department)) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***

        $event = (string)$args['event_id'];
        if (!$this->eventRepository->existsEvent($event, $department)) ***REMOVED***
            return $this->error($response, __('Not Found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***

        // Set description format to plain or parsed if it is exactly like this. If not set it to both
        $params['description_format'] = $descriptionFormat === 'plain' || $descriptionFormat === 'parsed' ? $descriptionFormat : 'both';

        $event = $this->eventRepository->getEvent($params['event_id'],$params['limit'], $params['page'], $until, '', $department, $since, $params['description_format'], false);
        if (empty($event)) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('No events found')]);
    ***REMOVED***

        $responseData = [
            'event' => $event,
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Update event.
     *
     * @auth JWT
     * @post string|null title
     * @post string|null description
     * @post int|string|null start as time in seconds
     * @post int|string|null end as time in seconds
     * @post int|string|null start_leaders as time in seconds
     * @post int|string|null end_leaders as time in seconds
     * @post float|null price
     * @post bool|null public
     * @post int|string|null publicize_at required if public is true
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function updateEventAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $data = $request->getParams();

        $data['event_id'] = (string)$args['event_id'];
        $data['department_id'] = (string)$args['department_id'];

        if (!$this->eventRepository->existsEvent($data['eventId'], $data['department_id'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Event not found')]);
    ***REMOVED***

        if (!$this->departmentRepository->existsDepartment($data['department_id'])) ***REMOVED***
            return $this->error($response, __('Not found'), 404, ['message' => __('Department not found')]);
    ***REMOVED***

        $validationContext = $this->eventValidation->validateUpdate($data);
        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
    ***REMOVED***

        $updated = $this->eventRepository->updateEvent($data, $data['event_id'], $this->jwt['lang'], $this->jwt['user_id']);

        if (!$updated) ***REMOVED***
            return $this->error($response, __('Server Error'), 500, ['message'=>__('Updating event failed')]);
    ***REMOVED***

        return $this->json($response, ['message'=> __('Updated event successfully')]);
***REMOVED***

    /**
     * Delete event.
     *
     * @auth JWT
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function deleteEventAction(Request $request, Response $response, array $args): Response
    ***REMOVED***
        $eventId = (string)$args['event_id'];
        $departmentId =(string)$args['department_id'];
        $eventExists = $this->eventRepository->existsEvent($eventId, $departmentId);
        if (!$eventExists || !$this->eventRepository->deleteEvent($eventId, $this->jwt['user_id'])) ***REMOVED***
            $this->error($response, 'Not Found', 404, ['message' => __('Deleting event failed')]);
    ***REMOVED***
        return $this->json($response, ['message' => __('Deleted event successfully')]);
***REMOVED***
***REMOVED***
