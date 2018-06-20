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
{
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
    {
        parent::__construct($container);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->departmentValidation = $container->get(DepartmentValidation::class);

    }

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
    {
        $params = $this->getLimitationParams($request);

        $departments = $this->departmentRepository->getAll($params['limit'], $params['page']);

        $responseData = [
            'limit' => $params['limit'],
            'page' => $params['page'],
            'departments' => $departments,
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Get single department.
     *
     * @auth none
     *
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getDepartmentAction(Request $request, Response $response, array $args): Response
    {
        $department = $this->departmentRepository->getDepartment($args['department_hash']);
        if (empty($department)) {
            return $this->error($response, 'Not found', 404, ['message' => __('Department does not exist')]);
        }
        $responseData = [
            'department' => $department,
        ];

        return $this->json($response, $responseData);
    }

    /**
     * Update department
     *
     * @auth JWT
     * @put string name
     * @put int|string postcode
     * @put int|string department_group_id
     * @put int|string department_type_id
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function updateDepartmentAction(Request $request, Response $response, array $args): Response
    {
        $json = (string)$request->getBody();
        $data = json_decode($json, true);
        $name = (string)$data['name'];
        $postcode = (string)$data['postcode'];
        $departmentGroupId = (string)$data['department_group_id'];
        $departmentTypeId = (string)$data['department_type_id'];
        $validationContext = $this->departmentValidation->validateUpdate($name, $postcode, $departmentGroupId, $departmentTypeId);
        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
        }

        $success = $this->departmentRepository->updateDepartment($args['department_hash'], $name, $postcode, $departmentGroupId, $departmentTypeId, $this->jwt['user_id']);
        if (!$success) {
            return $this->error($response, 'Unprocessable Entity', 404, ['message' => __('Update failed')]);
        }

        return $this->json($response, ['message' => __('Updated department successfully')]);
    }

    /**
     * Delete user.
     *
     * @auth JWT
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function deleteDepartmentAction(Request $request, Response $response, array $args)
    {
        $deleted = $this->departmentRepository->deleteDepartment($args['department_hash'], $this->jwt['user_id']);
        if (!$deleted) {
            return $this->error($response, 'Internal Server Error', 500, ['message' => __('Deleting user failed')]);
        }

        return $this->json($response, ['message' => __('Deleted user successfully')]);
    }

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
    {
        $json = (string)$request->getBody();
        $data = json_decode($json, true);
        $name = (string)$data['name'];
        $postcode = (string)$data['postcode'];
        $departmentGroupId = (string)$data['department_group_id'];
        $departmentTypeId = (string)$data['department_type_id'];

        $validationContext = $this->departmentValidation->validateCreate($name, $postcode, $departmentGroupId, $departmentTypeId);

        if ($validationContext->fails()) {
            return $this->error($response, $validationContext->getMessage(), 422, $validationContext->toArray());
        }

        $lastInsertedId = $this->departmentRepository->insertDepartment($name, $postcode, $departmentGroupId, $departmentTypeId, $this->jwt['userid']);
        $url = baseurl('/v2/departments/' . $lastInsertedId);
        $responseData = [
            'department_hash' => $lastInsertedId,
            'url' => $url,
        ];

        return $this->json($response, $responseData);
    }
}
