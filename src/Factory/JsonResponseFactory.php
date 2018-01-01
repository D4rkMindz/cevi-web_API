<?php

namespace App\Factory;


class JsonResponseFactory
***REMOVED***
    /**
     * Create default JSON response body.
     *
     * Creates a default JSON response body if the request was successful.
     *
     * @param array $body
     * @param int $status
     * @param string $message
     * @return array
     */
    public static function success(array $body, int $status = 200, string $message = 'success'): array
    ***REMOVED***
        $responseData = [
            'code' => $status,
            'message' => $message,
        ];
        return array_replace_recursive($responseData, $body);
***REMOVED***

    /**
     * Create default error resonse
     *
     * @param array|null $body
     * @param int $status
     * @param string $message
     * @return array
     */
    public static function error(array $body = null, int $status = 403, string $message = 'forbidden')
    ***REMOVED***
        $responseData = [
            'code' => $status,
            'message' => $message,
        ];
        if ($body !== null) ***REMOVED***
            $responseData['info'] = $body;
    ***REMOVED***

        return $responseData;
***REMOVED***
***REMOVED***
