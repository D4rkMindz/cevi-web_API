<?php


namespace App\Service\User;


use App\Repository\CityRepository;
use App\Repository\UserRepository;
use App\Service\AppValidation;
use App\Util\ValidationContext;
use Slim\Container;

class UserValidation extends AppValidation
***REMOVED***
    /**
     * @var CityRepository
     */
    private $postcodeRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserValidation constructor.
     *
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->postcodeRepository = $container->get(CityRepository::class);
        $this->userRepository = $container->get(UserRepository::class);
***REMOVED***

    /**
     * Validate signup data.
     *
     * @param string $email
     * @param string $firstName
     * @param string $postcode
     * @param string $username
     * @param string $password
     * @param string $lang
     * @return ValidationContext
     */
    public function validateSignup(string $email, string $firstName, string $postcode, string $username, string $password, string $lang): ValidationContext
    ***REMOVED***
        $validationContext = new ValidationContext();
        $this->validateLength($email, 'email', $validationContext);
        $this->validateLength($firstName, 'first_name', $validationContext, 2);
        $this->validateLength($username, 'username', $validationContext, 4, 40);
        $this->validateLength($password, 'password', $validationContext, 6);
        $this->validateLength($lang, 'lang', $validationContext, 2, 2);

        $this->validatePostcode($postcode, $validationContext);
        $this->validateUsername($username, $validationContext);
        $this->validatePassword($password, $validationContext);

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
        if (!$this->postcodeRepository->existsPostcode($postcode)) ***REMOVED***
            $validationContext->setError('postcode', _('Does not exist'), 3);
    ***REMOVED***
***REMOVED***

    /**
     * Validate username
     *
     * @param string $username
     * @param ValidationContext $validationContext
     */
    private function validateUsername(string $username, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->userRepository->existsUsername($username))***REMOVED***
            $validationContext->setError('username', __('Already in use'), 4);
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
        if (!preg_match('/(?=.*\d)/', $password)) ***REMOVED***
            $validationContext->setError('password', __('Password must contain a number'), 4);
    ***REMOVED***

        if (!preg_match('/(?=.*[a-z])/', $password))***REMOVED***
            $validationContext->setError('password', __('Password must contain a lowercase character'), 4);
    ***REMOVED***

        if (!preg_match('/(?=.*[A-Z])/', $password)) ***REMOVED***
            $validationContext->setError('password', __('Password must contain a uppercase character'), 4);
    ***REMOVED***
***REMOVED***
***REMOVED***
