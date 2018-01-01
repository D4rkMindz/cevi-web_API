<?php

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
            'exp' => date('Y-m-d H:i:s',time() + $exp),
            'iat' => date('Y-m-d H:i:s'),
            'data' => [
                'username' => $username,
            ]
        ];
***REMOVED***
***REMOVED***
