<?php


namespace App\Repository;


use App\Table\GenderTable;
use Slim\Container;

/**
 * Class GenderRepository
 */
class GenderRepository extends AppRepository
***REMOVED***
    /**
     * @var GenderTable
     */
    private $genderTable;

    /**
     * GenderRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->genderTable = $container->get(GenderTable::class);
***REMOVED***

    /**
     * Exists gender.
     *
     * @param string $genderId
     * @return bool true if found
     */
    public function existsGender(string $genderId): bool
    ***REMOVED***
        $query = $this->genderTable->newSelect();
        $query->select('id')->where(['id'=> $genderId, 'deleted = ' => false]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***
***REMOVED***
