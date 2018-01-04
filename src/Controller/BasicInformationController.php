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
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function eventAction(Request $request, Response $response): Response
    ***REMOVED***
        $params = $this->getLimitationParams($request);

        $until = $request->getParam('until');
        $params['until'] = (int)!empty($until) ? $until : time() + (60 * 60 * 24 * 365 * 2);

        $departmentGroup = (string)$request->getParam('department_group');
        $department = (string)$request->getParam('department');
        $inclPassed = (bool)$request->getParam('incl_passed');
        $descriptionFormat = (string)$request->getParam('description_format');
//        $lang = (string)$request->getParam('lang'); // TODO implement language selection for events.

        $events = $this->eventRepository->getEvents($params['limit'], $params['page'], $params['until'], $departmentGroup, $department, $inclPassed, $descriptionFormat);

        if (empty($events))***REMOVED***
            return $this->error($response, 'Not found', 404, ['info'=> __('No events found')]);
    ***REMOVED***

        $department = $department ?: 'all';
        $departmentGroup = $departmentGroup ?: 'all';
        $descriptionFormat = $descriptionFormat ?: 'both';

        $responseData = [
            'until'=> $until,
            'description_format'=> $descriptionFormat,
            'department_group' => $departmentGroup,
            'department' => $department,
            'incl_passed' => $inclPassed,
            'events' => $events,
        ];

        return $this->json($response, $responseData);
***REMOVED***
***REMOVED***
