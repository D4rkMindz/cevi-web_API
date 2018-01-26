<?php


namespace App\Repository;


use App\Table\PositionTable;
use Slim\Container;

/**
 * Class PositionRepository
 */
class PositionRepository extends AppRepository
***REMOVED***
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
    ***REMOVED***
        $this->positionTable = $container->get(PositionTable::class);
***REMOVED***

    /**
     * Exists position.
     *
     * @param string $positionId
     * @return bool
     */
    public function existsPosition(string $positionId): bool
    ***REMOVED***
        $query = $this->positionTable->newSelect();
        $query->select('id')->where(['id'=> $positionId, 'archived_at' => date('Y-m-d H:i:s')]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***
***REMOVED***
