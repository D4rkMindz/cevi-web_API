<?php


namespace App\Repository;


use App\Table\CityTable;
use Slim\Container;

/**
 * Class CityRepository
 */
class CityRepository extends AppRepository
{
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
    {
        $this->cityTable = $container->get(CityTable::class);
    }

    /**
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function getAll(int $limit = 10000, int $page = 0): array
    {
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
    }

    /**
     * Get reduced city data for registration autocomplete
     *
     * @param string $lang
     * @param $limit
     * @param $page
     * @return array
     */
    public function getReduced(string $lang = 'de', $limit, $page): array
    {
        $query = $this->cityTable->newSelect();
        $name = 'title_' . $lang;
        $fields = [
            'id',
            'postcode' => 'number',
            'name' => $name,
        ];
        $query->select($fields)
            ->limit($limit)
            ->page($page);
        $rows = $query->execute()->fetchAll('assoc');
        return !empty($rows) ? $rows : [];
    }

    /**
     * Check if postcode exists in repository.
     *
     * @param string $postcode
     * @return bool true if found.
     */
    public function existsPostcode(string $postcode): bool
    {
        $query = $this->cityTable->newSelect();
        $query->select('number')->where(['number' => $postcode]);
        $row = $query->execute()->fetch();
        return !empty($row);
    }

    /**
     * Check if city exists.
     *
     * @param string $cityId
     * @return bool true if exists
     */
    public function existsCity(string $cityId)
    {
        $query = $this->cityTable->newSelect();
        $query->select('id')->where(['id' => $cityId]);
        $row = $query->execute()->fetch();
        return !empty($row);
    }
}
