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
        return $this->cityTable->existsPostcode($postcode);
***REMOVED***
***REMOVED***
