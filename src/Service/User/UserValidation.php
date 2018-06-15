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
     * @var UserRepository
     */
    private $userRepository;

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
        parent::__construct($container);
        $this->userRepository = $container->get(UserRepository::class);
        $this->languageRepository = $container->get(LanguageRepository::class);
        $this->positionRepository = $container->get(PositionRepository::class);
        $this->genderRepository = $container->get(GenderRepository::class);
***REMOVED***

    /**
     * Validate modify data.
     *
     * @param array $data
     * @param string $modifier
     * @return ValidationContext
     */
    public function validateUpdate(array $data, string $modifier): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext(__('Please check your data'));

        $this->validateModifier($modifier, $validationContext);

        if (array_key_exists('postcode', $data)) ***REMOVED***
            $this->validatePostcode((string)$data['postcode'], $validationContext);
    ***REMOVED***

        if (array_key_exists('language_hash', $data)) ***REMOVED***
            $this-> validateLanguage((string)$data['language_hash'], $validationContext);
    ***REMOVED***

        if (array_key_exists('department_hash', $data)) ***REMOVED***
            $this->validateDepartment($data['department_hash'], $validationContext);
    ***REMOVED***

        if (array_key_exists('posititon_hash', $data)) ***REMOVED***
            $this->validatePosition($data['posititon_hash'], $validationContext);
    ***REMOVED***

        if (array_key_exists('gender_hash', $data)) ***REMOVED***
            $this->validateGender($data['gender_hash'], $validationContext);
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
    private function validateModifier(string $modifier, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->userRepository->existsUserById($modifier)) ***REMOVED***
            $validationContext->setError('modifier', __('Modifier does not exist'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate city ID.
     *
     * @param string $postcode
     * @param ValidationContext $validationContext
     */
    private function validateCity(string $postcode, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->cityRepository->existsPostcode($postcode)) ***REMOVED***
            $validationContext->setError('postcode', __('Not found'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate language ID.
     *
     * @param string $languageHash
     * @param ValidationContext $validationContext
     */
    private function validateLanguage(string $languageHash, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->languageRepository->existsLanguage($languageHash)) ***REMOVED***
            $validationContext->setError('language', __('Not found'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate department ID.
     *
     * @param string $departmentHash
     * @param $validationContext
     */
    private function validateDepartment(string $departmentHash, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->departmentRepository->existsDepartment($departmentHash)) ***REMOVED***
            $validationContext->setError('department_hash', __('Not found'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate position ID.
     *
     * @param string $positionHash
     * @param ValidationContext $validationContext
     */
    private function validatePosition(string $positionHash, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->positionRepository->existsPosition($positionHash)) ***REMOVED***
            $validationContext->setError('position', __('Not found'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate gender ID.
     *
     * @param string $genderHash
     * @param ValidationContext $validationContext
     */
    private function validateGender(string $genderHash, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->genderRepository->existsGender($genderHash)) ***REMOVED***
            $validationContext->setError('gender_hash', __('Not found'));
    ***REMOVED***
***REMOVED***

    /**
     * @param string $name
     * @param ValidationContext $validationContext
     * @param string $elementName
     */
    private function validateName(string $name, ValidationContext $validationContext, string $elementName = 'last_name')
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
                if ((int)$data['js_certificate_until'] <= (time() - (60 * 60 * 24 * 365 * 2))) ***REMOVED***
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
        $this->validateDate((int)$birthdate, 'birthday', $validationContext, true);

        // minimum age of 4 years
        if ($birthdate >= (time() - (60 * 60 * 24 * 365 * 4))) ***REMOVED***
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
     * @param string $lastName
     * @param string $postcode
     * @param string $username
     * @param string $password
     * @param string $ceviName
     * @param string $languageHash
     * @param string $departmentHash
     * @return ValidationContext
     */
    public function validateSignup(string $email, string $firstName, $lastName, string $postcode, string $username, string $password, $ceviName, string $languageHash, string $departmentHash): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext(__('Please check your data'));

        $this->validateEmail($email, $validationContext);
        $this->validateName($firstName, $validationContext, 'first_name');
        if (!empty($lastName)) ***REMOVED***
            $this->validateName($lastName, $validationContext, 'last_name');
    ***REMOVED***
        $this->validateUsername($username, $validationContext);
        $this->validatePostcode($postcode, $validationContext);
        $this->validatePassword($password, $validationContext);
        if (!empty($ceviName)) ***REMOVED***
            $this->validateName($ceviName, $validationContext, 'cevi_name');
    ***REMOVED***
        $this->validateLanguage($languageHash, $validationContext);
        $this->validateDepartment($departmentHash, $validationContext);

        return $validationContext;
***REMOVED***
***REMOVED***
