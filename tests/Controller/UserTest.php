<?php
/**
 * Created by PhpStorm.
 * User: Björn
 * Date: 14.06.2018
 * Time: 14:22
 */

namespace App\Test\Controller;


use App\Test\DbTestCase;
use App\Util\PhonenumberConverter;

/**
 * Class UserTest
 *
 * @group actual
 * @coversDefaultClass \App\Controller\UserController
 *
 * TODO continue testing locations and then departments
 */
class UserTest extends DbTestCase
{
    private $emailToken;

    /**
     * Test get single user.
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     * @covers ::getUserAction
     */
    public function testGetUser()
    {
        $request = $this->createRequest('GET', '/v2/users/' . $this->userHash);
        $response = $this->request($request);
        $this->assertSame(200, $response->getStatusCode());
        $requiredKeys = [
            'user',
            'user.hash',
            'user.department',
            'user.department.hash',
            'user.department.name',
            'user.position',
            'user.position.hash',
            'user.position.name_de',
            'user.position.name_en',
            'user.position.name_fr',
            'user.position.name_it',
            'user.gender',
            'user.gender.hash',
            'user.gender.name_de',
            'user.gender.name_en',
            'user.gender.name_fr',
            'user.gender.name_it',
            'user.language',
            'user.language.full_name',
            'user.language.abbreviation',
            'user.last_name',
            'user.first_name',
            'user.cevi_name',
            'user.email',
            'user.username',
            'user.address',
            'user.birthdate',
            'user.js_certificate',
            'user.js_certificate_until',
            'user.signup_completed',
            'user.url',
            'user.created_at',
            'user.created_by',
            'user.modified_at',
            'user.modified_by',
            'user.archived_at',
            'user.archived_by',
        ];
        $this->assertResponseHasKeys($requiredKeys, $response);
        $expected = [
            'hash' => 'hash_test_1',
            'department' => [
                'hash' => 'hash_test_1',
                'name' => 'Department 1',
            ],
            'position' => [
                'hash' => 'hash_test_1',
                'name_de' => 'Abteilungsleiter',
                'name_en' => 'Head of department',
                'name_fr' => 'Capo dipartimento',
                'name_it' => 'Chef de département',
            ],
            'gender' => [
                'hash' => 'hash_test_1',
                'name_de' => 'Mann',
                'name_en' => 'Men',
                'name_fr' => 'Homme',
                'name_it' => 'Uomo',
            ],
            'language' => [
                'full_name' => 'de_CH',
                'abbreviation' => 'de',
            ],
            'last_name' => 'Mustermann',
            'first_name' => 'Max',
            'cevi_name' => 'asöfd',
            'email' => 'max.mustermann@example.com',
            'username' => 'max',
            'address' => [
                'city' => [
                    'id' => '1',
                    'name_de' => 'Möhlin',
                    'name_en' => 'Möhlin',
                    'name_fr' => 'Möhlin',
                    'name_it' => 'Möhlin',
                ],
                'street' => 'Examplehausenerstrasse 1',
            ],
            'birthdate' => '1998-06-05',
            'js_certificate' => true,
            'js_certificate_until' => '2019',
            'signup_completed' => true,
            'email_verified' => false,
            'url' => $this->baseurl('/v2/users/hash_test_1'),
            'created_at' => '2017-01-01 00:00:00',
            'created_by' => '0',
            'modified_at' => null,
            'modified_by' => null,
            'archived_by' => null,
            'archived_at' => null,
        ];
        $data = json_decode($response->getBody()->__toString(), true);
        $this->assertSame($expected, $data['user']);
    }

    /**
     * Get all users
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @covers ::getAllUsersAction
     */
    public function testGetAllUsers()
    {
        $request = $this->createRequest('GET', '/v2/users');
        $response = $this->request($request);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertResponseHasMessage('Success', $response);

        $requiredKeys = [
            'users.0',
            'users.0.hash',
            'users.0.department',
            'users.0.department.hash',
            'users.0.department.name',
            'users.0.position',
            'users.0.position.hash',
            'users.0.position.name_de',
            'users.0.position.name_en',
            'users.0.position.name_fr',
            'users.0.position.name_it',
            'users.0.gender',
            'users.0.gender.hash',
            'users.0.gender.name_de',
            'users.0.gender.name_en',
            'users.0.gender.name_fr',
            'users.0.gender.name_it',
            'users.0.language',
            'users.0.language.full_name',
            'users.0.language.abbreviation',
            'users.0.last_name',
            'users.0.first_name',
            'users.0.cevi_name',
            'users.0.email',
            'users.0.username',
            'users.0.address',
            'users.0.birthdate',
            'users.0.js_certificate',
            'users.0.js_certificate_until',
            'users.0.signup_completed',
            'users.0.url',
            'users.0.created_at',
            'users.0.created_by',
            'users.0.modified_at',
            'users.0.modified_by',
            'users.0.archived_at',
            'users.0.archived_by',
        ];
        $this->assertResponseHasKeys($requiredKeys, $response);
        $expected = [
            'hash' => 'hash_test_1',
            'department' => [
                'hash' => 'hash_test_1',
                'name' => 'Department 1',
            ],
            'position' => [
                'hash' => 'hash_test_1',
                'name_de' => 'Abteilungsleiter',
                'name_en' => 'Head of department',
                'name_fr' => 'Capo dipartimento',
                'name_it' => 'Chef de département',
            ],
            'gender' => [
                'hash' => 'hash_test_1',
                'name_de' => 'Mann',
                'name_en' => 'Men',
                'name_fr' => 'Homme',
                'name_it' => 'Uomo',
            ],
            'language' => [
                'full_name' => 'de_CH',
                'abbreviation' => 'de',
            ],
            'last_name' => 'Mustermann',
            'first_name' => 'Max',
            'cevi_name' => 'asöfd',
            'email' => 'max.mustermann@example.com',
            'username' => 'max',
            'address' => [
                'city' => [
                    'id' => '1',
                    'name_de' => 'Möhlin',
                    'name_en' => 'Möhlin',
                    'name_fr' => 'Möhlin',
                    'name_it' => 'Möhlin',
                ],
                'street' => 'Examplehausenerstrasse 1',
            ],
            'birthdate' => '1998-06-05',
            'js_certificate' => true,
            'js_certificate_until' => '2019',
            'signup_completed' => true,
            'email_verified' => false,
            'url' => $this->baseurl('/v2/users/hash_test_1'),
            'created_at' => '2017-01-01 00:00:00',
            'created_by' => '0',
            'modified_at' => null,
            'modified_by' => null,
            'archived_by' => null,
            'archived_at' => null,
        ];
        $json = $response->getBody()->__toString();
        $data = json_decode($json, true);
        $this->assertSame($expected, $data['users'][0]);
        $this->assertArrayNotHasKey(3, $data['users']);
    }

    /**
     * Test sign up action
     *
     * @param array $data
     * @param int $expectedStatusCode
     * @param array $expectedResponseData
     * @param $expectedDatabaseState
     * @param $notExpectedDatabaseState
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @covers ::signupAction
     * @dataProvider signupDataprovider
     */
    public function testSignup(array $data, int $expectedStatusCode, array $expectedResponseData, $expectedDatabaseState, $notExpectedDatabaseState)
    {
        $request = $this->createRequest('POST', '/v2/users/signup');
        $request = $this->withJson($request, $data);
        $response = $this->request($request);

        $data = json_decode($response->getBody()->__toString(), true);
        if (!empty(array_value('user_hash', $data))) {
            $expectedResponseData = preg_replace_array('/{new_user_hash}/', $data['user_hash'], $expectedResponseData);
        }

        $this->assertDefaultValues($response, $expectedStatusCode, $expectedResponseData, $expectedDatabaseState, $notExpectedDatabaseState);
    }

    /**
     * @param array $data
     * @param int $expectedStatusCode
     * @param array $expectedResponseData
     * @param $expectedDatabaseState
     * @param $notExpectedDatabaseState
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @covers ::verifyEmailAction
     * @dataProvider verifyEmailDataprovider
     */
    public function testVerifyEmail(array $data, int $expectedStatusCode, array $expectedResponseData, $expectedDatabaseState, $notExpectedDatabaseState)
    {
        $request = $this->createRequest('POST', '/v2/users/verify');

        $data = preg_replace_array('/{email_token}/', $this->emailToken, $data);

        $request = $this->withJson($request, $data);
        $response = $this->request($request);

        $this->assertDefaultValues($response, $expectedStatusCode, $expectedResponseData, $expectedDatabaseState, $notExpectedDatabaseState);
    }

    /**
     * @param array $data
     * @param int $expectedStatusCode
     * @param array $expectedResponseData
     * @param $expectedDatabaseState
     * @param $notExpectedDatabaseState
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @covers ::updateUserAction
     * @dataProvider updateUserDataProvider
     */
    public function testUpdateUser(array $data, int $expectedStatusCode, array $expectedResponseData, $expectedDatabaseState, $notExpectedDatabaseState)
    {
        $request = $this->createRequest('PUT', '/v2/users/' . $this->userHash);
        $request = $this->withJson($request, $data);
        $response = $this->request($request);

        $this->assertDefaultValues($response, $expectedStatusCode, $expectedResponseData, $expectedDatabaseState, $notExpectedDatabaseState);
    }

    public function testDeleteUser()
    {
        $request = $this->createRequest('DELETE', '/v2/users/' . $this->userHash);
        $response = $this->request($request);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertResponseHasMessage('Deleted user successfully', $response);
        $db = [
            'user' => [
                'id' => 1,
                'archived_by' => 1,
            ],
        ];
        $this->assertDataInDatabase($db);
    }

    /**
     * Sign up data provider.
     *
     * @return array
     */
    public function signupDataprovider()
    {
        return [
            'Test regular' => [
                'data' => [
                    'email' => 'test@gmail.com',
                    'first_name' => 'Björn',
                    'postcode' => 4313,
                    'username' => 'bjoern',
                    'password' => 'Asdf123!',
                    'language' => 'en',
                    'department_hash' => 'hash_test_1',
                ],
                'expectedStatusCode' => 200,
                'expectedResponseData' => [
                    'code' => 200,
                    'message' => 'Signed up user successfully',
                    'user_hash' => '{new_user_hash}',
                ],
                'expectedDatabaseState' => [
                    'user' => [
                        'id' => 4,
                        'language_hash' => 'hash_test_2', // english
                        'permission_hash' => 'hash_test_6', // Anon
                        'department_hash' => 'hash_test_1',
                        'position_hash' => null,
                        'gender_hash' => null,
                        'first_name' => 'Björn',
                        'email' => 'test@gmail.com',
                        'username' => 'bjoern',
                        'signup_completed' => 0,
                        'email_verified' => 0,
                        'js_certificate' => 0,
                        'last_name' => null,
                        'address' => null,
                        'cevi_name' => null,
                        'birthdate' => null,
                        'phone' => null,
                        'mobile' => null,
                        'js_certificate_until' => null,
                        'created_by' => 0,
                        'modified_at' => null,
                        'modified_by' => null,
                        'archived_at' => null,
                        'archived_by' => null,
                    ],
                    'email_token' => [
                        'id' => 4,
                    ],
                ],
                'notExpectedDatabaseState' => false,
            ],
            'Test with empty values' => [
                'data' => [
                    'email' => '',
                    'first_name' => '',
                    'postcode' => 0,
                    'username' => '',
                    'password' => '',
                    'language' => '',
                    'department_hash' => '',
                ],
                'expectedStatusCode' => 422,
                'expectedResponseData' => [
                    'code' => 422,
                    'message' => 'Please check your data',
                    'info' => [
                        'message' => 'Please check your data',
                        'errors' => [
                            ['field' => 'email', 'message' => 'Required'],
                            ['field' => 'email', 'message' => 'Not a valid email address'],
                            ['field' => 'first_name', 'message' => 'Required'],
                            ['field' => 'username', 'message' => 'Required'],
                            ['field' => 'postcode', 'message' => 'Does not exist'],
                            ['field' => 'password', 'message' => 'Required'],
                            ['field' => 'password', 'message' => 'Password must contain a number'],
                            ['field' => 'password', 'message' => 'Password must contain a lowercase character'],
                            ['field' => 'password', 'message' => 'Password must contain a uppercase character'],
                            ['field' => 'language', 'message' => 'Not found'],
                            ['field' => 'department_hash', 'message' => 'Not found'],
                        ],
                    ],
                ],
                'expectedDatabaseState' => false,
                'notExpectedDatabaseState' => false,
            ],
        ];
    }

    /**
     * Verify email data provider.
     *
     * @return array
     */
    public function verifyEmailDataprovider()
    {
        return [
            'Test regular' => [
                'data' => [
                    'token' => '{email_token}',
                ],
                'expectedStatusCode' => 200,
                'expectedResponseData' => [
                    'code' => 200,
                    'message' => 'Success',
                    'verified' => true,
                ],
                'expectedDatabaseState' => [
                    'user' => [
                        'id' => 1,
                        'email_verified' => 1,
                    ]
                ],
                'notExpectedDatabaseState' => false,
            ],
            'Test wrong Token' => [
                'data' => [
                    'token' => 'FalseTokenHere',
                ],
                'expectedStatusCode' => 422,
                'expectedResponseData' => [
                    'code' => 422,
                    'message' => 'Please check your data',
                    'info' => [
                        'message' => 'User does not exist',
                        'verified' => false
                    ],
                ],
                'expectedDatabaseState' => [
                    'user' => [
                        'id' => 1,
                        'email_verified' => 0,
                    ]
                ],
                'notExpectedDatabaseState' => false,
            ],
        ];
    }

    /**
     * Update user data provider.
     *
     * @return array
     */
    public function updateUserDataProvider()
    {
        $jsCertificateUntil = time() + (60 * 60 * 24 * 365);
        $birthdate = time() - (60 * 60 * 24 * 365 * 4) - 1;
        $phonenumberConverter = new PhonenumberConverter();
        return [
            'Test regular' => [
                'data' => [
                    'postcode' => 4310,
                    'language' => 'de',
                    'department_hash' => 'hash_test_2',
                    'position_hash' => 'hash_test_4',
                    'gender_hash' => 'hash_test_2',
                    'first_name' => 'Max',
                    'email' => 'max@mustermann.co.uk',
                    'username' => 'maxi.musti',
                    'js_certificate' => true,
                    'js_certificate_until' => $jsCertificateUntil,
                    'last_name' => 'Mustermann',
                    'address' => 'Ulmenstrasse 40',
                    'cevi_name' => 'Dash',
                    'birthdate' => $birthdate,
                    'phone' => '0041761238546',
                    'mobile' => '00416585569663',
                ],
                'expectedStatusCode' => 200,
                'expectedResponseData' => [
                    'code' => 200,
                    'message' => 'Success',
                    'info' => [
                        'message' => 'Updated user successfully',
                        'signup_completed' => true,
                    ],
                ],
                'expectedDatabaseState' => [
                    'user' => [
                        'city_id' => 2,
                        'language_hash' => 'hash_test_1',
                        'department_hash' => 'hash_test_2',
                        'position_hash' => 'hash_test_4',
                        'gender_hash' => 'hash_test_2',
                        'first_name' => 'Max',
                        'email' => 'max@mustermann.co.uk',
                        'username' => 'maxi.musti',
                        'js_certificate' => 1,
                        'js_certificate_until' => date('Y', $jsCertificateUntil),
                        'address' => 'Ulmenstrasse 40',
                        'cevi_name' => 'Dash',
                        'birthdate' => date('Y-m-d', $birthdate),
                        'phone' => $phonenumberConverter->convert('0041761238546'),
                        'mobile' => $phonenumberConverter->convert('00416585569663'),
                        'modified_by' => 1,
                    ],
                ],
                'notExpectedDatabaseState' => false,
            ],
            'Test with empty data' => [
                'data' => [
                    'postcode' => '',
                    'language' => '',
                    'department_hash' => '',
                    'position_hash' => '',
                    'gender_hash' => '',
                    'first_name' => '',
                    'email' => '',
                    'username' => '',
                    'js_certificate' => false,
                    'js_certificate_until' => '',
                    'last_name' => '',
                    'address' => '',
                    'cevi_name' => '',
                    'birthdate' => '',
                    'phone' => '',
                    'mobile' => '',
                ],
                'expectedStatusCode' => 422,
                'expectedResponseData' => [
                    'code' => 422,
                    'message' => 'Please check your data',
                    'info' => [
                        'message' => 'Please check your data',
                        'errors' => [
                            ['field' => 'postcode', 'message' => 'Does not exist'],
                            ['field' => 'language', 'message' => 'Not found'],
                            ['field' => 'department_hash', 'message' => 'Not found'],
                            ['field' => 'gender_hash', 'message' => 'Not found'],
                            ['field' => 'first_name', 'message' => 'Required'],
                            ['field' => 'email', 'message' => 'Required'],
                            ['field' => 'email', 'message' => 'Not a valid email address'],
                            ['field' => 'username', 'message' => 'Required'],
                            ['field' => 'last_name', 'message' => 'Required'],
                            ['field' => 'address', 'message' => 'Required'],
                            ['field' => 'cevi_name', 'message' => 'Required'],
                            ['field' => 'phone', 'message' => 'Required'],
                            ['field' => 'mobile', 'message' => 'Required'],
                        ],
                    ]
                ],
                'expectedDatabaseState' => false,
                'notExpectedDatabaseState' => [
                    'user' => [
                        'id' => 1,
                        'modified_by' => 1,
                    ]
                ],
            ],
        ];
    }

    /**
     * Hook to get all data
     *
     * @param array $data
     */
    protected function getDataHook(array $data): void
    {
        $this->emailToken = $data['email_token'][0]['token'];
    }
}
