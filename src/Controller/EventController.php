<?php


namespace App\Controller;


use App\Repository\DepartmentRepository;
use App\Repository\EventRepository;
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
     * EventController constructor.
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->eventRepository = $container->get(EventRepository::class);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
***REMOVED***

    /**
     * Get all events of a department including private and passed events.
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
***REMOVED***
