<?php


namespace App\Repository;


use App\Table\PositionTable;
use Slim\Container;

/**
 * Class PositionRepository
 */
class PositionRepository extends AppRepository
{
    /**
     * @var PositionTable
     */
    private $positionTable;

    /**
     * PositionRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    {
        $this->positionTable = $container->get(PositionTable::class);
    }

    /**
     * Exists position.
     *
     * @param string $positionId
     * @return bool
     */
    public function existsPosition(string $positionId): bool
    {
        $query = $this->positionTable->newSelect();
        $query->select('hash')->where(['hash'=> $positionId]);
        $row = $query->execute()->fetch();
        return !empty($row);
    }
}
