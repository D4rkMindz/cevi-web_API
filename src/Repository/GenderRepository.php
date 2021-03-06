<?php


namespace App\Repository;


use App\Table\GenderTable;
use Slim\Container;

/**
 * Class GenderRepository
 */
class GenderRepository extends AppRepository
{
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
    {
        $this->genderTable = $container->get(GenderTable::class);
    }

    /**
     * Exists gender.
     *
     * @param string $genderId
     * @return bool true if found
     */
    public function existsGender(string $genderId): bool
    {
        $query = $this->genderTable->newSelect();
        $query->select(1)->where(['hash' => $genderId]);
        $row = $query->execute()->fetch();
        return !empty($row);
    }

    /**
     * Get all available genders
     *
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function getAllGenders(int $limit, int $page): array
    {
        $fields = ['id', 'name_de', 'name_en', 'name_fr', 'name_it'];

        $query = $this->genderTable->newSelect();

        $query->select($fields)
            ->limit($limit)
            ->page($page);
        $rows = $query->execute()->fetchAll('assoc');
        return !empty($rows) ? $rows : [];
    }
}
