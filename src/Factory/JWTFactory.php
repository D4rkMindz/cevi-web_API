<?php

namespace App\Factory;
use Firebase\JWT\JWT;

/**
 * Class JWTFactory
 */
class JWTFactory
{
    /**
     * Generate JWT data.
     *
     * @param string $username
     * @param string $userId
     * @param string $lang
     * @param string $secret
     * @param int $expireOffset
     * @param string $scope
     * @return string
     */
    public static function generate(string $username, string $userId, string $lang, string $secret, int $expireOffset = 60 * 60 * 8, string $scope = '')
    {
        $tokenData = [
            'iss' => 'cevi-web',
            'aud' => 'cevi-web',
            'sub' => $scope,
            'exp' => time() + $expireOffset,
            'iat' => time(),
            'data' => [
                'expires_at' => date('Y-m-d H:i:s', time() + $expireOffset),
                'username' => $username,
                'user_id' => $userId,
                'lang' => $lang
            ]
        ];
        return $token = JWT::encode($tokenData, $secret);

    }
}
