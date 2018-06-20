<?php

namespace App\Factory;

/**
 * Class JsonResponseFactory
 */
class JsonResponseFactory
{
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
    {
        $responseData = [
            'code' => $status,
            'message' => $message,
        ];
        return array_replace_recursive($responseData, $body);
    }

    /**
     * Create default error resonse
     *
     * @param array|null $body
     * @param int $status
     * @param string $message
     * @return array
     */
    public static function  error(array $body = null, int $status = 403, string $message = 'Forbidden')
    {
        $responseData = [
            'code' => $status,
            'message' => $message,
        ];
        if ($body !== null) {
            $responseData['info'] = $body;
        }

        return $responseData;
    }
}
