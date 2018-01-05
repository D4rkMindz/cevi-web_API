<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 04.01.2018
 * Time: 19:44
 */

namespace App\Controller;


use App\Repository\DepartmentRepository;
use App\Service\Department\DepartmentValidation;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class DepartmentController extends AppController
***REMOVED***
    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * @var DepartmentValidation
     */
    private $departmentValidation;

    /**
     * DepartmentController constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->departmentValidation = $container->get(DepartmentValidation::class);

***REMOVED***

    /**
     * Get all departments.
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
    public function getAllAction(Request $request, Response $response): Response
    ***REMOVED***
        $params = $this->getLimitationParams($request);

        $departments = $this->departmentRepository->getAll($params['limit'], $params['page']);

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'departments' => $departments,
        ];

        return $this->json($response, $responseData);
***REMOVED***

    /**
     * Create department.
     *
     * @auth JWT
     * @post string name Departmentname
     * @post string postcode Four digit integer submitted as string
     * @post string department_group_id Department group ID
     * @post string department_type_id Department type
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function createDepartmentAction(Request $request, Response $response): Response
    ***REMOVED***
        $data = $request->getParams();
        $name = (string)$data['name'];
        $postcode = (string)$data['postcode'];
        $departmentGroupId = (string)$data['department_group_id'];
        $departmentTypeId = (string)$data['department_type_id'];

        $validationContext = $this->departmentValidation->validateCreate($name, $postcode, $departmentGroupId, $departmentTypeId);

        if ($validationContext->fails()) ***REMOVED***
            return $this->error($response, $validationContext->getMessage(),422, ['info'=> $validationContext->toArray()]);
    ***REMOVED***

        $lastInsertedId = $this->departmentRepository->insertDepartment($name, $postcode, $departmentGroupId, $departmentTypeId, $this->jwt['userid']);
        $url = baseurl('/v2/departments/' . $lastInsertedId);
        $responseData = [
            'department_id' => $lastInsertedId,
            'url' => $url,
        ];

        return $this->json($response, $responseData);
***REMOVED***
***REMOVED***
