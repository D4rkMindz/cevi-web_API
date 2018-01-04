<?php


namespace App\Service;


use App\Repository\DepartmentRepository;
use App\Util\ValidationContext;
use Slim\Container;

/**
 * Class AppValidation
 */
class AppValidation
***REMOVED***
    /**
     * @var DepartmentRepository
     */
    protected $departmentRepository;

    /**
     * AppValidation constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    protected function __construct(Container $container)
    ***REMOVED***
        $this->departmentRepository = $container->get(DepartmentRepository::class);
***REMOVED***

    /**
     * Validate length of text.
     *
     * @param string $text
     * @param string $elementName
     * @param ValidationContext $validationContext
     * @param int $min
     * @param int $max
     */
    protected function validateLength(string $text, string $elementName, ValidationContext $validationContext, int $min = 3, int $max = 255)
    ***REMOVED***
        $length = strlen(trim($text));
        if ($length < $min) ***REMOVED***
            $validationContext->setError($elementName, __('too short'));
    ***REMOVED***

        if ($length > $max) ***REMOVED***
            $validationContext->setError($elementName, __('too long'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate email.
     *
     * @param string $email
     * @param ValidationContext $validationContext
     */
    protected function validateEmail(string $email, ValidationContext $validationContext)
    ***REMOVED***
        $this->validateLength($email, 'email', $validationContext);
        if (!is_email($email)) ***REMOVED***
            $validationContext->setError('email', _('Not a valid email address'));
    ***REMOVED***
***REMOVED***

    /**
     * Validate postcode.
     *
     * @param string $postcode
     * @param ValidationContext $validationContext
     */
    protected function validatePostcode(string $postcode, ValidationContext $validationContext)
    ***REMOVED***
        if (!$this->cityRepository->existsPostcode($postcode)) ***REMOVED***
            $validationContext->setError('postcode', _('Does not exist'));
    ***REMOVED***
***REMOVED***
***REMOVED***
