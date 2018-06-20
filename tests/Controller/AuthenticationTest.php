<?php
/**
 * Created by PhpStorm.
 * User: Björn
 * Date: 16.06.2018
 * Time: 09:24
 */

namespace Controller;


use App\Test\DbTestCase;

/**
 * Class AuthenticationTest
 *
 * @coversDefaultClass \App\Controller\AuthenticationController
 */
class AuthenticationTest extends DbTestCase
{
    /**
     * @param array $data
     * @param int $expectedStatusCode
     * @param $expectedResponseData
     * @param $expectedResponseKeys
     * @param $expiresAtWithinRange
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @covers ::authenticateAction
     * @dataProvider authenticateDataprovider
     */
    public function testAuthenticate(array $data, int $expectedStatusCode, $expectedResponseData, $expectedResponseKeys, $expiresAtWithinRange)
    {
        $request = $this->createRequest('POST', '/v2/auth', false);
        $request = $this->withJson($request, $data);
        $response = $this->request($request);
        $this->assertSame($expectedStatusCode, $response->getStatusCode());

        if ($expectedResponseKeys) {
            $this->assertResponseHasKeys($expectedResponseKeys, $response);
        }

        $json = $response->getBody()->__toString();
        $this->assertJson($json);
        $responseData = json_decode($json, true);

        if (array_key_exists('token', $expectedResponseData)) {
            $expectedResponseData['token'] = $responseData['token'];
        }

        if (array_key_exists('expires_at', $expectedResponseData)) {
            $expectedResponseData['expires_at'] = $responseData['expires_at'];
        }

        $this->assertSame($expectedResponseData, $responseData);

        $expiresAt = array_value('expires_at', $responseData);
        if (!empty($expiresAt)) {
            $this->assertGreaterThan($expiresAtWithinRange['start'], $expiresAt);
            $this->assertLessThan($expiresAtWithinRange['end'], $expiresAt);
        }
    }

    /**
     * Test authenticate data provider.
     *
     * @return array
     */
    public function authenticateDataprovider()
    {
        return [
            'Test regular' => [
                'data' => [
                    'username' => 'max',
                    'password' => 'mäxle1',
                ],
                'expectedStatusCode' => 200,
                'expectedResponseData' => [
                    'code' => 200,
                    'message' => 'Success',
                    'token' => '{token}',
                    'expires_at' => '{expires_at}',
                    'user_hash' => 'hash_test_1',
                ],
                'expectedResponseKeys' => [
                    'code',
                    'message',
                    'token',
                    'expires_at',
                    'user_hash',
                ],
                'expiresAtWithinRange' => [
                    'start' => (time() + (60 * 15)) * 1000,
                    // testing time should not be more than 3 Minutes, otherwise adjust the value below
                    'end' => (time() + (60 * 18)) * 1000,
                ]
            ],
            'Test with wrong password' => [
                'data' => [
                    'username' => 'max',
                    'password' => 'LOL',
                ],
                'expectedStatusCode' => 422,
                'expectedResponseData' => [
                    'code' => 422,
                    'message' => 'Unprocessable entity',
                    'info' => [
                        'message' => 'Invalid user data',
                    ],
                ],
                'expectedResponseKeys' => false,
                'expiresAtWithinRange' => false,
            ]
        ];
    }

    /**
     * Hook to get all data
     *
     * @param array $data
     */
    protected function getDataHook(array $data): void
    {
    }
}
