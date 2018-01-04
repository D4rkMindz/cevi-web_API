<?php


namespace App\Service\Department;


use App\Repository\DepartmentGroupRepository;
use App\Repository\DepartmentRepository;
use App\Service\AppValidation;
use App\Util\ValidationContext;
use Slim\Container;

/**
 * Class DepartmentValidation
 */
class DepartmentValidation extends AppValidation
***REMOVED***
    private $languageWhitelist;

    /**
     * @var DepartmentRepository
     */
    private $departmentGroupRepository;

    /**
     * DepartmentValidation constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->languageWhitelist = $container->get('settings')->get('language_whitelist');
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->departmentGroupRepository = $container->get(DepartmentGroupRepository::class);
***REMOVED***

    /**
     * Validate create department.
     *
     * @param string $lang
     * @param string $name
     * @param string $postcode
     * @param string $departmentGroupId
     */
    public function validateCreate(string $lang, string $name, string $postcode, string $departmentGroupId)
    ***REMOVED***
        $validationContext = new ValidationContext();
        $this->validateLang($lang, $validationContext);
        $this->validateName($name, $validationContext);
        $this->validatePostcode($postcode, $validationContext);
        $this->validateDepartmentGroup($departmentGroupId, $validationContext);
***REMOVED***

    /**
     * Validate language.
     *
     * @param string $lang
     * @param ValidationContext $validationContext
     */
    private function validateLang(string $lang, ValidationContext $validationContext)
    ***REMOVED***
        if (!in_array($lang, $this->languageWhitelist)) ***REMOVED***
            $validationContext->setError('lang', __('Language does not exist'));
    ***REMOVED***
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
        if (!$this->departmentGroupRepository->existsDepartment($departmentGroupId))***REMOVED***
            $validationContext->setError('department_group_id', __('Department group does not exist'));
    ***REMOVED***
***REMOVED***
***REMOVED***
