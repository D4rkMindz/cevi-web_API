<?php
/**
 * Created by PhpStorm.
 * User: Björn
 * Date: 19.01.2018
 * Time: 20:33
 */

namespace Controller;


use App\Test\DbTestCase;
use App\Test\Mockbuilder;
use PHPUnit\DbUnit\DataSet\ArrayDataSet;

/**
 * Class DbUserControllerTest
 * @coversDefaultClass App\Controller\UserController
 */
class DbUserControllerTest extends DbTestCase
***REMOVED***
    private $data;

    public function testGetAllUsersAction()
    ***REMOVED***
        $request = $this->createRequest('GET', '/v2/users', true);
        $response = $this->request($request);
        $this->assertSame(200, $response->getStatusCode());
        $json = (string)$response->getBody();
        $this->assertJson($json);
        $data = json_decode($json, true);
        $this->assertArrayHasKey('users', $data);
        $this->assertArrayHasKey('id', $data['users'][0]);
        $this->assertArrayHasKey('department', $data['users'][0]);
        $this->assertArrayHasKey('id', $data['users'][0]['department']);
        $this->assertArrayHasKey('name', $data['users'][0]['department']);
        $this->assertArrayHasKey('position', $data['users'][0]);
        $this->assertArrayHasKey('name_de', $data['users'][0]['position']);
        $this->assertArrayHasKey('name_en', $data['users'][0]['position']);
        $this->assertArrayHasKey('name_fr', $data['users'][0]['position']);
        $this->assertArrayHasKey('name_it', $data['users'][0]['position']);
        $this->assertArrayHasKey('gender', $data['users'][0]);
        $this->assertArrayHasKey('id', $data['users'][0]['gender']);
        $this->assertArrayHasKey('name_de', $data['users'][0]['gender']);
        $this->assertArrayHasKey('name_en', $data['users'][0]['gender']);
        $this->assertArrayHasKey('name_fr', $data['users'][0]['gender']);
        $this->assertArrayHasKey('name_it', $data['users'][0]['gender']);
        $this->assertArrayHasKey('language', $data['users'][0]);
        $this->assertArrayHasKey('full_name', $data['users'][0]['language']);
        $this->assertArrayHasKey('abbreviation', $data['users'][0]['language']);
        $this->assertArrayHasKey('last_name', $data['users'][0]);
        $this->assertArrayHasKey('first_name', $data['users'][0]);
        $this->assertArrayHasKey('cevi_name', $data['users'][0]);
        $this->assertArrayHasKey('address', $data['users'][0]);
        $this->assertArrayHasKey('street', $data['users'][0]['address']);
        $this->assertArrayHasKey('city', $data['users'][0]['address']);
        $this->assertArrayHasKey('id', $data['users'][0]['address']['city']);
        $this->assertArrayHasKey('name_de', $data['users'][0]['address']['city']);
        $this->assertArrayHasKey('name_en', $data['users'][0]['address']['city']);
        $this->assertArrayHasKey('name_fr', $data['users'][0]['address']['city']);
        $this->assertArrayHasKey('name_it', $data['users'][0]['address']['city']);
        $this->assertArrayHasKey('birthdate', $data['users'][0]);
        $this->assertArrayHasKey('js_certificate', $data['users'][0]);
        $this->assertArrayHasKey('js_certificate_until', $data['users'][0]);
        $this->assertArrayHasKey('signup_completed', $data['users'][0]);
        $this->assertArrayHasKey('url', $data['users'][0]);
        $this->assertArrayHasKey('created_at', $data['users'][0]);
        $this->assertArrayHasKey('created_by', $data['users'][0]);
        $this->assertArrayHasKey('modified_at', $data['users'][0]);
        $this->assertArrayHasKey('modified_by', $data['users'][0]);
        $this->assertArrayHasKey('archived_at', $data['users'][0]);
        $this->assertArrayHasKey('archived_by', $data['users'][0]);

        $this->assertEquals($this->data['app_user'][0]['id'], $data['users'][0]['id']);
        $this->assertEquals($this->data['app_user'][0]['city_id'], $data['users'][0]['address']['city']['id']);
        $this->assertEquals($this->data['app_user'][0]['last_name'], $data['users'][0]['last_name']);
        $this->assertEquals($this->data['app_user'][0]['first_name'], $data['users'][0]['first_name']);
        $this->assertEquals($this->data['app_user'][0]['cevi_name'], $data['users'][0]['cevi_name']);
        $this->assertEquals($this->data['app_user'][0]['js_certificate_until'], $data['users'][0]['js_certificate_until']);
        $this->assertEquals($this->data['app_user'][0]['signup_completed'], $data['users'][0]['signup_completed']);
        $this->assertEquals($this->data['app_user'][0]['created_at'], $data['users'][0]['created_at']);
        $this->assertEquals($this->data['app_user'][0]['created_by'], $data['users'][0]['created_by']);
***REMOVED***

    /**
     * Get data set.
     *
     * @return ArrayDataSet|\PHPUnit\DbUnit\DataSet\IDataSet
     */
    protected function getDataSet()
    ***REMOVED***
        $mockbuilder = new Mockbuilder();
        $this->data = $mockbuilder->users();
        return new ArrayDataSet($this->data);
***REMOVED***
***REMOVED***
