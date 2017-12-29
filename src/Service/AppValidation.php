<?php


namespace App\Service;


use App\Util\ValidationContext;

/**
 * Class AppValidation
 */
class AppValidation
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
***REMOVED***
