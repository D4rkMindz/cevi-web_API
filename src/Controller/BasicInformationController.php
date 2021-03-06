<?php

namespace App\Controller;


use App\Repository\CityRepository;
use App\Repository\DepartmentGroupRepository;
use App\Repository\EventRepository;
use App\Repository\GenderRepository;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class BasicInformationController
 */
class BasicInformationController extends AppController
{
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
     * @var GenderRepository
     */
    private $genderRepository;

    /**
     * BasicInformationController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    {
        parent::__construct($container);
        $this->departmentGroupRepository = $container->get(DepartmentGroupRepository::class);
        $this->cityRepository = $container->get(CityRepository::class);
        $this->eventRepository = $container->get(EventRepository::class);
        $this->genderRepository = $container->get(GenderRepository::class);
    }

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
    {
        $params = $this->getLimitationParams($request);

        $data = ['department_groups' => $this->departmentGroupRepository->getAll($params['limit'], $params['page'])];
        return $this->json($response, $data);
    }

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
    {
        $params = $this->getLimitationParams($request);
        $reduced = $request->getParam('reduced');
        $lang = $request->getParam('lang');
        $allowedLangs = [
            'de' => 1,
            'en' => 1,
            'fr' => 1,
            'it' => 1,
        ];

        if (!empty($reduced) && (bool)$reduced && array_key_exists($lang, $allowedLangs)) {
            $cities = $this->cityRepository->getReduced($lang, $params['limit'], $params['page']);
        } else {
            $cities = $this->cityRepository->getAll($params['limit'], $params['page']);
        }

        $responseData = ['cities' => $cities];
        return $this->json($response, $responseData);
    }

    /**
     * Get all events.
     *
     * @auth none
     * @get int|string limit
     * @get int|string page
     * @get int|string offset
     * @get int|string department_group_hash
     * @get int|string department_hash Required if department_group_hash is NOT set
     * @get int|string until (as time())
     * @get int|string since (as time())
     * @get null|string description_format (null, 'plain' or 'parsed' Markdown description)
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     *
     * @todo implement language selection for events. (@get lang)
     */
    public function eventAction(Request $request, Response $response): Response
    {
        $params = $this->getLimitationParams($request);
        $data = $request->getParams();

        $until = ((int)array_value('until', $data)) ?: time() + (60 * 60 * 24 * 365 * 2);

        $since = ((int)array_value('since', $data)) ?: time();

        $departmentGroup = (string)array_value('department_group_hash', $data);
        if (empty($departmentGroup)) {
            $department = (string)array_value('department_hash', $data);
            if (empty($department)) {
                return $this->error($response, __('Not found'), 404, ['info' => ['message' => __('Please select a department or a department group')]]);
            }
        } else {
            $department = '';
        }
        $descriptionFormat = ((string)array_value('description_format', $data)) ?: 'both';
//        $lang = (string)$data['lang']; // TODO implement language selection for events.
        $events = $this->eventRepository->getEvents($params['limit'], $params['page'], $until, $departmentGroup, $department, $since, $descriptionFormat);

        if (empty($events)) {
            return $this->error($response, 'Not found', 404, ['message' => __('No events found')]);
        }

        $department = $department ?: 'all';
        if (!empty($department) && empty($departmentGroup)) {
            $departmentGroup = 'none'; // TODO maybe get the departmentgroup hash by department id?
        }
        $descriptionFormat = $descriptionFormat ?: 'both';

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'until' => $until,
            'description_format' => $descriptionFormat,
            'department_group' => $departmentGroup,
            'department' => $department,
            'since' => $since,
            'events' => $events,
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Get all genders
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
    public function genderAction(Request $request, Response $response): Response
    {
        $params = $this->getLimitationParams($request);
        $genders = $this->genderRepository->getAllGenders($params['limit'], $params['page']);
        return $this->json($response, ['genders' => $genders]);
    }

    /**
     * Get swagger
     * Not Tested!
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function swagger(Request $request, Response $response): Response
    {
        $swagger = \Swagger\scan(__DIR__ . '/../../docs/swagger/');
        $data = json_decode($swagger, true);
        return $this->json($response, $data);
    }
}
