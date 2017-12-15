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
            $validationContext->setError($elementName, 'too short', 1);
    ***REMOVED***

        if ($length > $max) ***REMOVED***
            $validationContext->setError($elementName, 'too long', 2);
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
        if (!is_email($email)) ***REMOVED***
            $validationContext->setError('email', 'invalid', 3);
    ***REMOVED***
***REMOVED***
***REMOVED***
