<?php


namespace App\Repository;


use App\Table\CityTable;
use Slim\Container;

/**
 * Class CityRepository
 */
class CityRepository extends AppRepository
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
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function getAll(int $limit=10000, int $page = 0): array
    ***REMOVED***
        $query = $this->cityTable->newSelect();
        $fields = [
            'id',
            'postcode' => 'number',
            'name_de' => 'title_de',
            'name_en' => 'title_en',
            'name_fr' => 'title_fr',
            'name_it' => 'title_it',
        ];
        $query->select($fields)
            ->limit($limit)
            ->page($page);
        $row = $query->execute()->fetchAll('assoc');
        return !empty($row) ? $row : [];
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
        $query->select('number')->where(['number' => $postcode, 'deleted = ' => false]);
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
        $query->select('id')->where(['id' => $cityId, 'deleted = ' => false]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***
***REMOVED***
