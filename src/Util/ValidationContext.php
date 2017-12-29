<?php


namespace App\Util;


class ValidationContext
***REMOVED***
    protected $message;
    protected $errors = [];
    /**
     * ValidationContext constructor.
     *
     * @param string|null $message
     */
    public function __construct(string $message = 'Please check your data')
    ***REMOVED***
        $this->message = $message;
***REMOVED***
    /**
     * Get message.
     *
     * @return null|string
     */
    public function getMessage()
    ***REMOVED***
        return $this->message;
***REMOVED***
    /**
     * Set message.
     *
     * @param string $message
     */
    public function setMessage(string $message)
    ***REMOVED***
        $this->message = $message;
***REMOVED***

    /**
     * Set error
     *
     * @param string $field
     * @param string $message
     * @param int $status
     */
    public function setError(string $field, string $message)
    ***REMOVED***
        $this->errors[] = [
            "field" => $field,
            "message" => $message,
        ];
***REMOVED***
    /**
     * Get errors.
     *
     * @return array $errors
     */
    public function getErrors()
    ***REMOVED***
        return $this->errors;
***REMOVED***
    /**
     * Fail.
     *
     * Check if there are any errors
     *
     * @return bool
     */
    public function fails()
    ***REMOVED***
        return !empty($this->errors);
***REMOVED***
    /**
     * Success
     *
     * Check if there are not any errors.
     *
     * @return bool
     */
    public function success()
    ***REMOVED***
        return empty($this->errors);
***REMOVED***
    /**
     * Clear.
     *
     * Clear message and errors
     */
    public function clear()
    ***REMOVED***
        $this->message = null;
        $this->errors = [];
***REMOVED***
    /**
     * Validation To Array.
     *
     * Get Validation Context as array
     *
     * @return array $result
     */
    public function toArray()
    ***REMOVED***
        $result = [
            "message" => $this->message,
            "errors" => $this->errors,
        ];
        return $result;
***REMOVED***
***REMOVED***
