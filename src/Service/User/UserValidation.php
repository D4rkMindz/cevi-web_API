<?php


namespace App\Service\User;


use App\Repository\CityRepository;
use App\Repository\DepartmentRepository;
use App\Repository\GenderRepository;
use App\Repository\LanguageRepository;
use App\Repository\PositionRepository;
use App\Repository\UserRepository;
use App\Service\AppValidation;
use App\Util\ValidationContext;
use Slim\Container;

/**
 * Class UserValidation
 */
class UserValidation extends AppValidation
***REMOVED***
    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var DepartmentRepository
     */
    private $departmentRepository;

    /**
     * @var LanguageRepository
     */
    private $languageRepository;

    /**
     * @var PositionRepository
     */
    private $positionRepository;

    /**
     * @var GenderRepository
     */
    private $genderRepository;

    /**
     * UserValidation constructor.
     *
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->cityRepository = $container->get(CityRepository::class);
        $this->userRepository = $container->get(UserRepository::class);
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->languageRepository = $container->get(LanguageRepository::class);
        $this->positionRepository = $container->get(PositionRepository::class);
        $this->genderRepository = $container->get(GenderRepository::class);
***REMOVED***

    /**
     * Validate update data.
     *
     * @param array $data
     * @param string $modifier
     * @return ValidationContext
     */
    public function validateUpdate(array $data, string $modifier): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext(__('Please check your data'));

        $this->validateModifier($modifier, $validationContext);

        if (array_key_exists('city_id', $data)) ***REMOVED***
            $this->validateCity((string)$data['city_id'], $validationContext);
    ***REMOVED***

        if (array_key_exists('language_id', $data)) ***REMOVED***
            $this->validateLanguage((string)$data['language_id'], $validationContext);
    ***REMOVED***

        if (array_key_exists('department_id', $data)) ***REMOVED***
            $this->validateDepartment($data['department_id'], $validationContext);
    ***REMOVED***

        if (array_key_exists('posititon_id', $data)) ***REMOVED***
            $this->validatePosition($data['posititon_id'], $validationContext);
    ***REMOVED***

        if (array_key_exists('gender_id', $data)) ***REMOVED***
            $this->validateGender($data['gender_id'], $validationContext);
    ***REMOVED***

        if (array_key_exists('first_name', $data)) ***REMOVED***
            $this->validateName($data['first_name'], $validationContext, 'first_name');
    ***REMOVED***

        if (array_key_exists('email', $data)) ***REMOVED***
            $this->validateEmail($data['email'], $validationContext);
    ***REMOVED***

        if (array_key_exists('username', $data)) ***REMOVED***
            $this->validateUsername($data['username'], $validationContext);
    ***REMOVED***

        if (array_key_exists('password', $data)) ***REMOVED***
            $this->validatePassword($data['password'], $validationContext);
    ***REMOVED***

        // signup_completed must be generated, can not be set by the user.

        if (array_key_exists('js_certificate', $data)) ***REMOVED***
            $this->validateJsCertificate($data, $validationContext);
    ***REMOVED***

        if (array_key_exists('last_name', $data)) ***REMOVED***
            $this->validateName($data['last_name'], $validationContext);
    ***REMOVED***

        if (array_key_exists('address', $data)) ***REMOVED***
            $this->validateAddress($data['address'], $validationContext);
    ***REMOVED***

        if (array_key_exists('cevi_name', $data)) ***REMOVED***
            $this->validateName($data['cevi_name'], $validationContext, 'cevi_name');
    ***REMOVED***

        if (array_key_exists('birthdate', $data)) ***REMOVED***
            $this->validateBirthdate($data['birthdate'], $validationContext);
    ***REMOVED***

        if (array_key_exists('phone', $data)) ***REMOVED***
            $this->validatePhonenumber($data['phone'], $validationContext);
    ***REMOVED***

        if (array_key_exists('mobile', $data)) ***REMOVED***
            $this->validatePhonenumber($data['mobile'], $validationContext, 'mobile');
    ***REMOVED***

        return $validationContext;
***REMOVED***

    /**
     * Validate modifier.
     *
     * @param string $modifier
     * @param ValidationContext $validationContext
     */
    private function validateModifier(string $modifier, ValidationContext $validationContext): void
    ***REMOVED***
        if (!$this->userRepository->existsUser($modifier)) ***REMOVED***
            $validationContext->setError('modifier', __('Modifier does not exist'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate city ID.
     *
     * @param string $cityId
     * @param ValidationContext $validationContext
     */
    private function validateCity(string $cityId, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->cityRepository->existsCity($cityId)) ***REMOVED***
            $validationContext->setError('city_id', __('Not found'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate language ID.
     *
     * @param string $languageId
     * @param ValidationContext $validationContext
     */
    private function validateLanguage(string $languageId, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->languageRepository->existsLanguage($languageId)) ***REMOVED***
            $validationContext->setError('language_id', __('Not found'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate department ID.
     *
     * @param string $departmentId
     * @param $validationContext
     */
    private function validateDepartment(string $departmentId, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->departmentRepository->existsDepartment($departmentId)) ***REMOVED***
            $validationContext->setError('department_id', __('Not found'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate position ID.
     *
     * @param string $positionId
     * @param ValidationContext $validationContext
     */
    private function validatePosition(string $positionId, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->positionRepository->existsPosition($positionId)) ***REMOVED***
            $validationContext->setError('position_id', __('Not found'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate gender ID.
     *
     * @param string $genderId
     * @param ValidationContext $validationContext
     */
    private function validateGender(string $genderId, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->genderRepository->existsGender($genderId)) ***REMOVED***
            $validationContext->setError('gender_id', __('Not found'));
    ***REMOVED***
***REMOVED***

    /**
     * @param string $name
     * @param ValidationContext $validationContext
     * @param string $elementName
     */
    private function validateName(string $name, ValidationContext $validationContext, string $elementName = 'last_name'): void
    ***REMOVED***
        $this->validateLength($name, $elementName, $validationContext, 2);
***REMOVED***

    /**
     * Validate username
     *
     * @param string $username
     * @param ValidationContext $validationContext
     */
    private function validateUsername(string $username, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateLength($username, 'username', $validationContext, 4, 40);

        if (!$this->userRepository->existsUsername($username)) ***REMOVED***
            $validationContext->setError('username', __('Already in use'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate password.
     *
     * @param string $password
     * @param ValidationContext $validationContext
     */
    private function validatePassword(string $password, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateLength($password, 'password', $validationContext, 6);

        if (!preg_match('/(?=.*\d)/', $password)) ***REMOVED***
            $validationContext->setError('password', __('Password must contain a number'));
    ***REMOVED***

        if (!preg_match('/(?=.*[a-z])/', $password)) ***REMOVED***
            $validationContext->setError('password', __('Password must contain a lowercase character'));
    ***REMOVED***

        if (!preg_match('/(?=.*[A-Z])/', $password)) ***REMOVED***
            $validationContext->setError('password', __('Password must contain a uppercase character'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate J + S certificate requirements
     *
     * @param array $data
     * @param ValidationContext $validationContext
     */
    private function validateJsCertificate(array $data, ValidationContext $validationContext)
    ***REMOVED***
        if ((bool)$data['js_certificate']) ***REMOVED***
            if (!array_key_exists('js_certificate_until', $data)) ***REMOVED***
                $validationContext->setError('js_certificate', __('Date required'));
        ***REMOVED*** else ***REMOVED***
                // allow dates
                if (strtotime($data['js_certificate_until']) <= strtotime(time() - (60 * 60 * 24 * 365 * 2))) ***REMOVED***
                    $validationContext->setError('js_certificate_until', __('JS Certificate is outdated'));
            ***REMOVED***
        ***REMOVED***
    ***REMOVED***
***REMOVED***

    /**
     * Validate address.
     *
     * @param string $address
     * @param ValidationContext $validationContext
     */
    private function validateAddress(string $address, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateLength($address, 'address', $validationContext);
***REMOVED***

    /**
     * Validate birthdate.
     *
     * @param string $birthdate
     * @param ValidationContext $validationContext
     */
    private function validateBirthdate(string $birthdate, ValidationContext $validationContext)
    ***REMOVED***
        // minimum age of 4 years
        if (strtotime($birthdate) >= strtotime(time() - (60 * 60 * 24 * 365 * 4))) ***REMOVED***
            $validationContext->setError('birthday', sprintf(__('Birthday not valid (minimum age: %s years'), 4));
    ***REMOVED***
***REMOVED***

    /**
     * Validate phonenumber.
     *
     * @param string $phonenumber
     * @param ValidationContext $validationContext
     * @param string $elementName
     */
    private function validatePhonenumber(string $phonenumber, ValidationContext $validationContext, string $elementName = 'phone')
    ***REMOVED***
        $this->validateLength($phonenumber, $elementName, $validationContext, 4, 18);
***REMOVED***

    /**
     * Validate signup data.
     *
     * @param string $email
     * @param string $firstName
     * @param string $postcode
     * @param string $username
     * @param string $password
     * @param string $languageId
     * @return ValidationContext
     */
    public function validateSignup(string $email, string $firstName, string $postcode, string $username, string $password, string $languageId): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext(__('Please check your data'));

        $this->validateEmail($email, $validationContext);
        $this->validateName($firstName, $validationContext, 'first_name');
        $this->validateUsername($username, $validationContext);
        $this->validatePostcode($postcode, $validationContext);
        $this->validatePassword($password, $validationContext);
        $this->validateLanguage($languageId, $validationContext);

        return $validationContext;
***REMOVED***

    /**
     * Validate postcode.
     *
     * @param string $postcode
     * @param ValidationContext $validationContext
     */
    private function validatePostcode(string $postcode, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->cityRepository->existsPostcode($postcode)) ***REMOVED***
            $validationContext->setError('postcode', _('Does not exist'));
    ***REMOVED***
***REMOVED***
***REMOVED***
