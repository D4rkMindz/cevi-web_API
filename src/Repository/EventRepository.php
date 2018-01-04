<?php


namespace App\Repository;


use App\Service\Formatter;
use App\Table\DepartmentEventTable;
use App\Table\DepartmentGroupTable;
use App\Table\DepartmentTable;
use App\Table\EventDescriptionTable;
use App\Table\EventTable;
use App\Table\EventTitleTable;
use Slim\Container;

class EventRepository
***REMOVED***
    /**
     * @var DepartmentEventTable
     */
    private $departmentEventTable;

    /**
     * @var EventTable
     */
    private $eventTable;

    /**
     * @var EventTitleTable
     */
    private $eventTitleTable;

    /**
     * @var DepartmentTable
     */
    private $departmentTable;

    /**
     * @var DepartmentGroupTable
     */
    private $departmentGroupTable;

    /**
     * @var EventDescriptionTable
     */
    private $eventDescriptionTable;

    /**
     * @var Formatter
     */
    private $formatter;

    public function __construct(Container $container)
    ***REMOVED***
        $this->eventTable = $container->get(EventTable::class);
        $this->eventTitleTable = $container->get(EventTitleTable::class);
        $this->departmentTable = $container->get(DepartmentTable::class);
        $this->departmentEventTable = $container->get(DepartmentEventTable::class);
        $this->departmentGroupTable = $container->get(DepartmentGroupTable::class);
        $this->eventDescriptionTable = $container->get(EventDescriptionTable::class);

        $this->formatter = new Formatter();
***REMOVED***

    /**
     * @param int $limit Limit of records
     * @param int $page pagination @see https://book.cakephp.org/3.0/en/orm/query-builder.html
     * @param int $until date in the future (format: time(), @see http://php.net/manual/de/function.time.php)
     * @param string $departmentGroupId
     * @param string $departmentId
     * @param bool $inclPassed include passed events
     * @param string $descriptionFormat either parsed or plain. If null, both formats will be returned
     * @return array
     */
    public function getEvents(int $limit, int $page, int $until, string $departmentGroupId, string $departmentId, bool $inclPassed, string $descriptionFormat = null): array
    ***REMOVED***
        $eventTableName = $this->eventTable->getTablename();
        $eventTitleTableName = $this->eventTitleTable->getTablename();
        $departmentEventTableName = $this->departmentEventTable->getTablename();
        $eventDescriptionTableName = $this->eventDescriptionTable->getTablename();

        $fields = [
            'id' => $eventTableName . '.id',
            'event_name_de' => $eventTitleTableName . '.name_de',
            'event_name_en' => $eventTitleTableName . ',name_en',
            'event_name_fr' => $eventTitleTableName . '.name_fr',
            'event_name_it' => $eventTitleTableName . '.name_it',
            'description_name_de' => $eventDescriptionTableName . '.name_de',
            'description_name_en' => $eventDescriptionTableName . '.name_en',
            'description_name_fr' => $eventDescriptionTableName . '.name_fr',
            'description_name_it' => $eventDescriptionTableName . '.name_it',
            'price' => $eventTableName . '.price',
            'start' => $eventTableName . '.start',
            'end' => $eventTableName . '.end',
            'start_leader' => $eventTableName . '.start_leader',
            'end_leader' => $eventTableName . '.end_leader',
            'created' => $eventTableName . '.created',
            'created_by' => $eventTableName . '.created_by',
            'modified' => $eventTableName . '.modified',
            'modified_by' => $eventTableName . '.modified_by',
            'deleted' => $eventTableName . '.deleted',
            'deleted_at' => $eventTableName . '.deleted_at',
            'deleted_by' => $eventTableName . '.deleted_by',
        ];

        $where = [$eventTableName . '.public' => 1];
        $where[$eventTableName . '.start'] = '<=' . $until;

        if (!$inclPassed) ***REMOVED***
            $where[$eventTableName . '.start'] = '>=' . date('Y-m-d H:i:s');
    ***REMOVED***

        if (!empty($department)) ***REMOVED***
            $where[$departmentEventTableName . '.department_id'] = '=' . $departmentId;
    ***REMOVED***

        if (!empty($departmentGroupId)) ***REMOVED***
            $where[$departmentEventTableName . '.department_group_id'] = '=' . $departmentGroupId;
    ***REMOVED***

        $query = $this->eventTable->newSelect();
        $query->select($fields)
            ->join([
                [
                    'table' => $eventTitleTableName,
                    'type' => 'INNER',
                    'conditions' => $eventTableName . '.title_id=' . $eventTitleTableName . '.id',
                ],
                [
                    'table' => $departmentEventTableName,
                    'type' => 'RIGHT',
                    'conditions' => $departmentEventTableName . '.event_id=' . $eventTableName . '.id',
                ],
                [
                    'table' => $eventDescriptionTableName,
                    'type' => 'INNER',
                    'conditions' => $eventTableName . '.event_description_id=' . $eventDescriptionTableName . '.id',
                ],
            ])
            ->where($where)
            ->limit($limit)
            ->page($page);
        $rows = $query->execute()->fetchAll('assoc');
        if (empty($rows)) ***REMOVED***
            return [];
    ***REMOVED***

        foreach ($rows as $key => $event) ***REMOVED***
            $rows[$key] = $this->formatter->formatEvent($event, $descriptionFormat);
    ***REMOVED***

        return $rows;
***REMOVED***
***REMOVED***
