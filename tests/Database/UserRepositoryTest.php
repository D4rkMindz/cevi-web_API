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
        $this->data = require __DIR__ . '/Data/user.php';
        return new ArrayDataSet($this->data);
***REMOVED***

    public function testGetUser()
    ***REMOVED***
        $users = $this->repository->getUsers();
        $this->assertSame($this->data, $users);
***REMOVED***
***REMOVED***
