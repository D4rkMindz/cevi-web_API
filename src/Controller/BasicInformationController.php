<?php

namespace App\Controller;


use App\Repository\CityRepository;
use App\Repository\DepartmentGroupRepository;
use App\Repository\EventRepository;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class BasicInformationController
 */
class BasicInformationController extends AppController
***REMOVED***
    /**
     * @var DepartmentGroupRepository
     */
    private $departmentGroupRepository;

    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * @var EventRepository
     */
    private $eventRepository;

    /**
     * BasicInformationController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->departmentGroupRepository = $container->get(DepartmentGroupRepository::class);
        $this->cityRepository = $container->get(CityRepository::class);
        $this->eventRepository = $container->get(EventRepository::class);
***REMOVED***

    /**
     * Get all department groups.
     *
     * @auth none
     * @get int|string limit
     * @get int|string page
     * @get int|string offset
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function departmentGroupAction(Request $request, Response $response): Response
    ***REMOVED***
        $params = $this->getLimitationParams($request);

        $data = ['department_groups' => $this->departmentGroupRepository->getAll($params['limit'], $params['page'])];
        return $this->json($response, $data);
***REMOVED***

    /**
     * Get all cities.
     *
     * @auth none
     * @get int|string limit
     * @get int|string page
     * @get int|string offset
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function cityAction(Request $request, Response $response): Response
    ***REMOVED***
        $params = $this->getLimitationParams($request);

        $responseData = ['cities' => $this->cityRepository->getAll($params['limit'], $params['page'])];
        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Get all events.
     *
     * @auth none
     * @get int|string limit
     * @get int|string page
     * @get int|string offset
     * @get int|string department_group_id
     * @get int|string department_id (is ignored if department_group_id is set.)
     * @get int|string until (as time())
     * @get int|string since (as time())
     * @get nulll|string description_format (null, 'plain' or 'parsed' Markdown description)
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     *
     * @todo implement language selection for events. (@get lang)
     */
    public function eventAction(Request $request, Response $response): Response
    ***REMOVED***
        $params = $this->getLimitationParams($request);
        $data = $request->getParams();

        $until = (int)$data['until'];
        $until = !empty($until) ? $until : time() + (60 * 60 * 24 * 365 * 2);

        $since = (int)$data['since'];
        $since = !empty($since) ? $since : time();

        $departmentGroup = (string)$data['department_group_id'];
        if (empty($departmentGroup)) ***REMOVED***
            $department = (string)$data['department_id'];
    ***REMOVED*** else ***REMOVED***
            $department = '';
    ***REMOVED***
        $descriptionFormat = (string)$data['description_format'];
//        $lang = (string)$data['lang']; // TODO implement language selection for events.

        $events = $this->eventRepository->getEvents($params['limit'], $params['page'], $until, $departmentGroup, $department, $since, $descriptionFormat);

        if (empty($events)) ***REMOVED***
            return $this->error($response, 'Not found', 404, ['message' => __('No events found')]);
    ***REMOVED***

        $department = $department ?: 'all';
        $departmentGroup = $departmentGroup ?: 'all';
        $descriptionFormat = $descriptionFormat ?: 'both';

        $responseData = [
            'limit'=> $params['limit'],
            'page'=> $params['page'],
            'until' => $until,
            'description_format' => $descriptionFormat,
            'department_group' => $departmentGroup,
            'department' => $department,
            'since' => $since,
            'events' => $events,
        ];

        return $this->json($response, $responseData);
***REMOVED***
***REMOVED***
