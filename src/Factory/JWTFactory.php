<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 30.12.2017
 * Time: 23:25
 */

namespace App\Factory;


class JWTFactory
***REMOVED***
    public static function generate(string $username, string $scope = '')
    ***REMOVED***
        $exp = 60 * 60; // 1 hour
        return [
            'iss' => 'cevi-web',
            'aud' => 'cevi-web',
            'sub' => $scope,
            'exp' => time() + $exp,
            'iat' => time(),
            'data' => [
                'username' => $username,
            ]
        ];
***REMOVED***
***REMOVED***
