<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 14.12.2017
 * Time: 18:16
 */

namespace App\Factory;


class JsonResponseFactory
***REMOVED***
    /**
     * Create default JSON response body.
     *
     * Creates a default JSON response body if the request was successful.
     *
     * @param array $body
     * @return string
     */
    public static function createSuccess(array $body): string
    ***REMOVED***
        $body['message'] = 'Success';
        $body['code'] = 200;
        return json_encode($body);
***REMOVED***
***REMOVED***
