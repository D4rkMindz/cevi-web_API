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
{
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
    {
        parent::__construct($container);
        $this->userRepository = $container->get(UserRepository::class);
        $this->languageRepository = $container->get(LanguageRepository::class);
        $this->positionRepository = $container->get(PositionRepository::class);
        $this->genderRepository = $container->get(GenderRepository::class);
    }

    /**
     * Validate modify data.
     *
     * @param array $data
     * @param string $modifier
     * @return ValidationContext
     */
    public function validateUpdate(array $data, string $modifier): ValidationContext
    {
        $validationContext = new ValidationContext(__('Please check your data'));

        $this->validateModifier($modifier, $validationContext);

        if (array_key_exists('postcode', $data)) {
            $this->validatePostcode((string)$data['postcode'], $validationContext);
        }

        if (array_key_exists('language_hash', $data)) {
            $this-> validateLanguage((string)$data['language_hash'], $validationContext);
        }

        if (array_key_exists('department_hash', $data)) {
            $this->validateDepartment($data['department_hash'], $validationContext);
        }

        if (array_key_exists('posititon_hash', $data)) {
            $this->validatePosition($data['posititon_hash'], $validationContext);
        }

        if (array_key_exists('gender_hash', $data)) {
            $this->validateGender($data['gender_hash'], $validationContext);
        }

        if (array_key_exists('first_name', $data)) {
            $this->validateName($data['first_name'], $validationContext, 'first_name');
        }

        if (array_key_exists('email', $data)) {
            $this->validateEmail($data['email'], $validationContext);
        }

        if (array_key_exists('username', $data)) {
            $this->validateUsername($data['username'], $validationContext);
        }

        if (array_key_exists('password', $data)) {
            $this->validatePassword($data['password'], $validationContext);
        }

        // signup_completed must be generated, can not be set by the user.

        if (array_key_exists('js_certificate', $data)) {
            $this->validateJsCertificate($data, $validationContext);
        }

        if (array_key_exists('last_name', $data)) {
            $this->validateName($data['last_name'], $validationContext);
        }

        if (array_key_exists('address', $data)) {
            $this->validateAddress($data['address'], $validationContext);
        }

        if (array_key_exists('cevi_name', $data)) {
            $this->validateName($data['cevi_name'], $validationContext, 'cevi_name');
        }

        if (array_key_exists('birthdate', $data)) {
            $this->validateBirthdate($data['birthdate'], $validationContext);
        }

        if (array_key_exists('phone', $data)) {
            $this->validatePhonenumber($data['phone'], $validationContext);
        }

        if (array_key_exists('mobile', $data)) {
            $this->validatePhonenumber($data['mobile'], $validationContext, 'mobile');
        }

        return $validationContext;
    }

    /**
     * Validate modifier.
     *
     * @param string $modifier
     * @param ValidationContext $validationContext
     */
    private function validateModifier(string $modifier, ValidationContext $validationContext)
    {
        if (!$this->userRepository->existsUserById($modifier)) {
            $validationContext->setError('modifier', __('Modifier does not exist'));
        }
    }

    /**
     * Validate city ID.
     *
     * @param string $postcode
     * @param ValidationContext $validationContext
     */
    private function validateCity(string $postcode, ValidationContext $validationContext)
    {
        if (!$this->cityRepository->existsPostcode($postcode)) {
            $validationContext->setError('postcode', __('Not found'));
        }
    }

    /**
     * Validate language ID.
     *
     * @param string $languageHash
     * @param ValidationContext $validationContext
     */
    private function validateLanguage(string $languageHash, ValidationContext $validationContext)
    {
        if (!$this->languageRepository->existsLanguage($languageHash)) {
            $validationContext->setError('language', __('Not found'));
        }
    }

    /**
     * Validate department ID.
     *
     * @param string $departmentHash
     * @param $validationContext
     */
    private function validateDepartment(string $departmentHash, ValidationContext $validationContext)
    {
        if (!$this->departmentRepository->existsDepartment($departmentHash)) {
            $validationContext->setError('department_hash', __('Not found'));
        }
    }

    /**
     * Validate position ID.
     *
     * @param string $positionHash
     * @param ValidationContext $validationContext
     */
    private function validatePosition(string $positionHash, ValidationContext $validationContext)
    {
        if (!$this->positionRepository->existsPosition($positionHash)) {
            $validationContext->setError('position', __('Not found'));
        }
    }

    /**
     * Validate gender ID.
     *
     * @param string $genderHash
     * @param ValidationContext $validationContext
     */
    private function validateGender(string $genderHash, ValidationContext $validationContext)
    {
        if (!$this->genderRepository->existsGender($genderHash)) {
            $validationContext->setError('gender_hash', __('Not found'));
        }
    }

    /**
     * @param string $name
     * @param ValidationContext $validationContext
     * @param string $elementName
     */
    private function validateName(string $name, ValidationContext $validationContext, string $elementName = 'last_name')
    {
        $this->validateLength($name, $elementName, $validationContext, 2);
    }

    /**
     * Validate username
     *
     * @param string $username
     * @param ValidationContext $validationContext
     */
    private function validateUsername(string $username, ValidationContext $validationContext)
    {
        $this->validateLength($username, 'username', $validationContext, 4, 40);

        if (!$this->userRepository->existsUsername($username)) {
            $validationContext->setError('username', __('Already in use'));
        }
    }

    /**
     * Validate password.
     *
     * @param string $password
     * @param ValidationContext $validationContext
     */
    private function validatePassword(string $password, ValidationContext $validationContext)
    {
        $this->validateLength($password, 'password', $validationContext, 6);

        if (!preg_match('/(?=.*\d)/', $password)) {
            $validationContext->setError('password', __('Password must contain a number'));
        }

        if (!preg_match('/(?=.*[a-z])/', $password)) {
            $validationContext->setError('password', __('Password must contain a lowercase character'));
        }

        if (!preg_match('/(?=.*[A-Z])/', $password)) {
            $validationContext->setError('password', __('Password must contain a uppercase character'));
        }
    }

    /**
     * Validate J + S certificate requirements
     *
     * @param array $data
     * @param ValidationContext $validationContext
     */
    private function validateJsCertificate(array $data, ValidationContext $validationContext)
    {
        if ((bool)$data['js_certificate']) {
            if (!array_key_exists('js_certificate_until', $data)) {
                $validationContext->setError('js_certificate', __('Date required'));
            } else {
                // allow dates
                if ((int)$data['js_certificate_until'] <= (time() - (60 * 60 * 24 * 365 * 2))) {
                    $validationContext->setError('js_certificate_until', __('JS Certificate is outdated'));
                }
            }
        }
    }

    /**
     * Validate address.
     *
     * @param string $address
     * @param ValidationContext $validationContext
     */
    private function validateAddress(string $address, ValidationContext $validationContext)
    {
        $this->validateLength($address, 'address', $validationContext);
    }

    /**
     * Validate birthdate.
     *
     * @param string $birthdate
     * @param ValidationContext $validationContext
     */
    private function validateBirthdate(string $birthdate, ValidationContext $validationContext)
    {
        $this->validateDate((int)$birthdate, 'birthday', $validationContext, true);

        // minimum age of 4 years
        if ($birthdate >= (time() - (60 * 60 * 24 * 365 * 4))) {
            $validationContext->setError('birthday', sprintf(__('Birthday not valid (minimum age: %s years'), 4));
        }
    }

    /**
     * Validate phonenumber.
     *
     * @param string $phonenumber
     * @param ValidationContext $validationContext
     * @param string $elementName
     */
    private function validatePhonenumber(string $phonenumber, ValidationContext $validationContext, string $elementName = 'phone')
    {
        $this->validateLength($phonenumber, $elementName, $validationContext, 4, 18);
    }

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
    {
        $validationContext = new ValidationContext(__('Please check your data'));

        $this->validateEmail($email, $validationContext);
        $this->validateName($firstName, $validationContext, 'first_name');
        if (!empty($lastName)) {
            $this->validateName($lastName, $validationContext, 'last_name');
        }
        $this->validateUsername($username, $validationContext);
        $this->validatePostcode($postcode, $validationContext);
        $this->validatePassword($password, $validationContext);
        if (!empty($ceviName)) {
            $this->validateName($ceviName, $validationContext, 'cevi_name');
        }
        $this->validateLanguage($languageHash, $validationContext);
        $this->validateDepartment($departmentHash, $validationContext);

        return $validationContext;
    }
}
