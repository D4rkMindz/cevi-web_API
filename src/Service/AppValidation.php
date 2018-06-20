<?php


namespace App\Service;


use App\Repository\CityRepository;
use App\Repository\DepartmentRepository;
use App\Util\ValidationContext;
use Slim\Container;

/**
 * Class AppValidation
 */
class AppValidation
{
    /**
     * @var DepartmentRepository
     */
    protected $departmentRepository;

    /**
     * @var CityRepository
     */
    protected $cityRepository;

    /**
     * AppValidation constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    protected function __construct(Container $container)
    {
        $this->departmentRepository = $container->get(DepartmentRepository::class);
        $this->cityRepository = $container->get(CityRepository::class);
    }

    /**
     * Validate value not empty.
     *
     * @param $value
     * @param string $elementName
     * @param ValidationContext $validationContext
     */
    protected function validateNotEmpty($value, string $elementName, ValidationContext $validationContext)
    {
        if (empty($value)) {
            $validationContext->setError($elementName, __('Required'));
            return true;
        }
        return false;
    }

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
    {
        $fails = $this->validateNotEmpty($text, $elementName, $validationContext);
        if ($fails) {
            return;
        }
        $length = strlen(trim($text));
        if ($length < $min) {
            $validationContext->setError($elementName, __('too short'));
        }

        if ($length > $max) {
            $validationContext->setError($elementName, __('too long'));
        }
    }

    /**
     * Validate email.
     *
     * @param string $email
     * @param ValidationContext $validationContext
     */
    protected function validateEmail(string $email, ValidationContext $validationContext)
    {
        $this->validateLength($email, 'email', $validationContext);
        if (!is_email($email)) {
            $validationContext->setError('email', _('Not a valid email address'));
        }
    }

    /**
     * Validate postcode.
     *
     * @param string $postcode
     * @param ValidationContext $validationContext
     */
    protected function validatePostcode(string $postcode, ValidationContext $validationContext)
    {
        if (!$this->cityRepository->existsPostcode($postcode)) {
            $validationContext->setError('postcode', _('Does not exist'));
        }
    }

    protected function validateDate($time, string $elementName, ValidationContext $validationContext, bool $acceptPassed = false)
    {
        if (!$acceptPassed && $time < time()) {
            $validationContext->setError($elementName, __('Date already passed'));
        }
    }
}
