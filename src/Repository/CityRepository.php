<?php


namespace App\Repository;


use App\Table\CityTable;
use Slim\Container;

/**
 * Class CityRepository
 */
class CityRepository
***REMOVED***
    /**
     * @var CityTable
     */
    private $cityTable;

    /**
     * CityRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->cityTable = $container->get(CityTable::class);
***REMOVED***

    /**
     * Check if postcode exists in repository.
     *
     * @param string $postcode
     * @return bool true if found.
     */
    public function existsPostcode(string $postcode): bool
    ***REMOVED***
        $query = $this->cityTable->newSelect();
        $query->select('number')->where(['number' => $postcode, 'deleted = ' => '0']);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***

    /**
     * Check if city exists.
     *
     * @param string $cityId
     * @return bool true if exists
     */
    public function existsCity(string $cityId)
    ***REMOVED***
        $query = $this->cityTable->newSelect();
        $query->select('id')->where(['id'=> $cityId, 'deleted = ' => '0']);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***
***REMOVED***
