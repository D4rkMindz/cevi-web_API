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

    public function createDepartmentAction(Request $request, Response $response): Response
    ***REMOVED***
        $lang = (string)$request->getParam('lang');
        $name = (string)$request->getParam('name');
        $postcode = (string)$request->getParam('postcode');
        $departmentGroupId = (string)$request->getParam('department_group_id');

        $validationContext = $this->departmentValidation->validateCreate($lang, $name, $postcode, $departmentGroupId);
        //todo insertion
***REMOVED***
***REMOVED***
