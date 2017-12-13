<?php
/**
 * Created by PhpStorm.
 * User: Björn
 * Date: 12.12.2017
 * Time: 09:48
 */

namespace App\Test\Database;


use App\Repository\UserRepository;
use PHPUnit\DbUnit\DataSet\ArrayDataSet;

/**
 * Class UserRepositoryTest
 *
 * @coversDefaultClass App\Repository\UserRepository
 */
class UserRepositoryTest extends DbUnitBaseTest
***REMOVED***
    protected $data = [];

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     *
     */
    public function setUp()
    ***REMOVED***
        parent::setUp();
        $this->repository = new UserRepository(app()->getContainer());
***REMOVED***

    /**
     * Get Data set.
     * @return ArrayDataSet|\PHPUnit\DbUnit\DataSet\IDataSet
     */
    public function getDataSet()
    ***REMOVED***
        $this->data['user'] = require __DIR__ . '/Data/user.php';
        return new ArrayDataSet($this->data);
***REMOVED***

    /**
     * Test getUsers.
     *
     * @covers ::getUsers
     */
    public function testGetUsers()
    ***REMOVED***
        $users = $this->repository->getUsers();
        $this->assertSame($this->data['user'], $users);
***REMOVED***

    /**
     * Test getUser.
     *
     * @covers ::getUser
     */
    public function testGetUser()
    ***REMOVED***
        $expected = $this->data['user'][0];
        $user = $this->repository->getUser($expected['id']);
        $this->assertSame($expected, $user);

        $user = $this->repository->getUser(end($this->data['user'])['id'] + 1);
        $this->assertSame([], $user);

        $user = $this->repository->getUser('string');
        $this->assertSame([], $user);
***REMOVED***
***REMOVED***

