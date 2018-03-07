<?php


namespace App\Service\Department;


use App\Repository\DepartmentGroupRepository;
use App\Repository\DepartmentRepository;
use App\Repository\DepartmentTypeRepository;
use App\Service\AppValidation;
use App\Util\ValidationContext;
use Slim\Container;

/**
 * Class DepartmentValidation
 */
class DepartmentValidation extends AppValidation
***REMOVED***
    /**
     * @var DepartmentGroupRepository
     */
    private $departmentGroupRepository;

    /**
     * @var DepartmentTypeRepository
     */
    private $departmentTypeRepository;

    /**
     * DepartmentValidation constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->departmentGroupRepository = $container->get(DepartmentGroupRepository::class);
        $this->departmentTypeRepository = $container->get(DepartmentTypeRepository::class);
***REMOVED***

    /**
     * Validate insert department.
     *
     * @param string $name
     * @param string $postcode
     * @param string $departmentGroupId
     * @param string $departmentTypeId
     * @return ValidationContext
     */
    public function validateCreate(string $name, string $postcode, string $departmentGroupId, string $departmentTypeId): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext();
        $this->validateName($name, $validationContext);
        $this->validatePostcode($postcode, $validationContext);
        $this->validateDepartmentGroup($departmentGroupId, $validationContext);
        $this->validateDepartmentType($departmentTypeId, $validationContext);

        return $validationContext;
***REMOVED***

    /**
     * Validate modify data.
     *
     * @param string $name
     * @param string $postcode
     * @param string $departmentGroupId
     * @param string $departmentTypeId
     * @return ValidationContext
     */
    public function validateUpdate(string $name, string $postcode, string $departmentGroupId, string $departmentTypeId): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext();
        if (!empty($name)) ***REMOVED***
            $this->validateName($name, $validationContext);
    ***REMOVED***

        if (!empty($postcode)) ***REMOVED***
            $this->validatePostcode($postcode, $validationContext);
    ***REMOVED***

        if (!empty($departmentGroupId)) ***REMOVED***
            $this->validateDepartmentGroup($departmentGroupId, $validationContext);
    ***REMOVED***

        if (!empty($departmentTypeId)) ***REMOVED***
            $this->validateDepartmentType($departmentTypeId, $validationContext);
    ***REMOVED***

        return $validationContext;
***REMOVED***

    /**
     * Validate department name.
     *
     * @param string $name
     * @param ValidationContext $validationContext
     */
    private function validateName(string $name, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateLength($name, 'name', $validationContext);

        if ($this->departmentRepository->existsDepartmentByName($name)) ***REMOVED***
            $validationContext->setError('name', __('Department name already exists'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate department group.
     *
     * @param string $departmentGroupId
     * @param ValidationContext $validationContext
     */
    private function validateDepartmentGroup(string $departmentGroupId, ValidationContext $validationContext)
    ***REMOVED***
        if (empty($departmentGroupId) || !$this->departmentGroupRepository->existsDepartment($departmentGroupId)) ***REMOVED***
            $validationContext->setError('department_group_id', __('Department group does not exist'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate department type.
     *
     * @param string $departmentTypeId
     * @param ValidationContext $validationContext
     */
    private function validateDepartmentType(string $departmentTypeId, ValidationContext $validationContext)
    ***REMOVED***
        if (empty($departmentTypeId) || !$this->departmentTypeRepository->existsDepartmentType($departmentTypeId)) ***REMOVED***
            $validationContext->setError('department_type_id', __('Department type does not exist'));
    ***REMOVED***
***REMOVED***
***REMOVED***
