<?php

namespace App\Factory;

/**
 * Class JWTFactory
 */
class JWTFactory
***REMOVED***
    /**
     * Generate JWT data.
     *
     * @param string $username
     * @param string $userId
     * @param string $scope
     * @return array
     */
    public static function generate(string $username, string $userId, string $lang, string $scope = '')
    ***REMOVED***
        $exp = 60 * 60 * 8; // 8 hours
        return [
            'iss' => 'cevi-web',
            'aud' => 'cevi-web',
            'sub' => $scope,
            'exp' => time() + $exp,
            'iat' => time(),
            'data' => [
                'expires_at' => date('Y-m-d H:i:s',time() + $exp),
                'username' => $username,
                'user_id' => $userId,
                'lang' => $lang
            ]
        ];
***REMOVED***
***REMOVED***
