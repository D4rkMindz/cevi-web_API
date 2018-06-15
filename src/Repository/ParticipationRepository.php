<?php


namespace App\Repository;


use App\Util\Formatter;
use App\Table\CityTable;
use App\Table\DepartmentEventTable;
use App\Table\DepartmentTable;
use App\Table\EventDescriptionTable;
use App\Table\EventParticipantTable;
use App\Table\EventParticipationStatusTable;
use App\Table\EventTable;
use App\Table\EventTitleTable;
use App\Table\LanguageTable;
use App\Table\UserTable;
use Cake\Database\Query;
use Interop\Container\Exception\ContainerException;
use Slim\Container;

/**
 * Class ParticipationRepository
 */
class ParticipationRepository extends AppRepository
***REMOVED***
    /**
     * @var EventParticipantTable
     */
    private $eventParticipantTable;

    /**
     * @var EventTable
     */
    private $eventTable;

    /**
     * @var EventDescriptionTable
     */
    private $eventDescritpionTable;

    /**
     * @var EventTitleTable
     */
    private $eventTitleTable;

    /**
     * @var UserTable
     */
    private $userTable;

    /**
     * @var DepartmentEventTable
     */
    private $departmentEventTable;

    /**
     * @var DepartmentTable
     */
    private $departmentTable;

    /**
     * @var LanguageTable
     */
    private $languageTable;

    /**
     * @var CityTable
     */
    private $cityTable;

    /**
     * @var EventParticipationStatusTable
     */
    private $eventParticipationStatusTable;

    /**
     * @var Formatter
     */
    private $formatter;

    /**
     * ParticipationRepository constructor.
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->eventParticipantTable = $container->get(EventParticipantTable::class);
        $this->eventTable = $container->get(EventTable::class);
        $this->eventDescritpionTable = $container->get(EventDescriptionTable::class);
        $this->eventTitleTable = $container->get(EventTitleTable::class);
        $this->userTable = $container->get(UserTable::class);
        $this->departmentEventTable = $container->get(DepartmentEventTable::class);
        $this->departmentTable = $container->get(DepartmentTable::class);
        $this->languageTable = $container->get(LanguageTable::class);
        $this->cityTable = $container->get(CityTable::class);
        $this->formatter = $container->get(Formatter::class);
        $this->eventParticipationStatusTable = $container->get(EventParticipationStatusTable::class);
***REMOVED***

    /**
     * Get all participations
     *
     * @param string $eventId
     * @param int $limit
     * @param int $page
     * @param string $departmentId
     * @param string $eventDescriptionFormat
     * @return array
     */
    public function getParticipations(string $eventId, int $limit, int $page, string $departmentId, string $eventDescriptionFormat): array
    ***REMOVED***
        $query = $this->getParticipationQuery($eventId);
        $query
            ->limit($limit)
            ->page($page);
        $participations = $query->execute()
            ->fetchAll('assoc');

        if (empty($participations)) ***REMOVED***
            return $participations;
    ***REMOVED***

        foreach ($participations as $key => $participation) ***REMOVED***
            $participations[$key] = $this->formatter->formatParticipation($participation, $departmentId, $eventDescriptionFormat);
    ***REMOVED***

        return $participations;
***REMOVED***

    /**
     * Get single participation.
     *
     * @param string $eventId
     * @param string $userId
     * @param string $departmentId
     * @param string $eventDescriptionFormat
     * @return array
     */
    public function getParticipation(string $eventId, string $userId, string $departmentId, string $eventDescriptionFormat): array
    ***REMOVED***
        $query = $this->getParticipationQuery($eventId);
        $query->where([$this->eventParticipantTable->getTablename() . '.user_id' => $userId]);
        $participation = $query->execute()
            ->fetch('assoc');

        if (empty($participation)) ***REMOVED***
            return [];
    ***REMOVED***

        return $this->formatter->formatParticipation($participation, $departmentId, $eventDescriptionFormat);
***REMOVED***

    /**
     * Create participation and get participation id.
     *
     * @param string $eventId
     * @param string $userId
     * @param string $statusId
     * @param string $executorId
     * @return string
     */
    public function createParticipation(string $eventId, string $userId, string $statusId, string $executorId): string
    ***REMOVED***
        $row = [
            'event_id' => $eventId,
            'user_id' => $userId,
            'status_id' => $statusId,
        ];
        return $this->eventParticipantTable->insert($row, $executorId);
***REMOVED***

    /**
     * Update participation status.
     *
     * @param string $eventId
     * @param string $userId
     * @param string $statusId
     * @param string $executorId
     * @return bool
     */
    public function updateParticipation(string $eventId, string $userId, string $statusId, string $executorId): bool
    ***REMOVED***
        return $this->eventParticipantTable->modify(['status_id' => $statusId], ['event_id' => $eventId, 'user_id' => $userId], $executorId);
***REMOVED***

    /**
     * Delete participation for user
     *
     * @param string $eventId
     * @param string $userId
     * @param string $executorId
     * @return bool
     */
    public function deleteParticipation(string $eventId, string $userId, string $executorId): bool
    ***REMOVED***
        return $this->eventParticipantTable->archive($executorId, ['event_id' => $eventId, 'user_id' => $userId]);
***REMOVED***

    /**
     * Get all participating users of an event.
     *
     * @param string $eventId
     * @return array
     */
    public function getAllParticipatingUsers(string $eventId, int $limit, int $page): array
    ***REMOVED***
        $eventParticipationTablename = $this->eventParticipantTable->getTablename();
        $userTablename = $this->userTable->getTablename();
        $departmentTableName = $this->departmentTable->getTablename();
        $languageTablename = $this->languageTable->getTablename();
        $cityTablename = $this->cityTable->getTablename();
        $departmentEventTablename = $this->departmentEventTable->getTablename();

        $query = $this->eventParticipantTable->newSelect();

        $query
            ->select([
                'user_id' => $userTablename . '.id',
                'department_hash' => $departmentTableName . '.id',
                'department_name' => $departmentTableName . '.name',
                'last_name' => $userTablename . '.last_name',
                'first_name' => $userTablename . '.first_name',
                'cevi_name' => $userTablename . '.cevi_name',
                'language_id' => $languageTablename . '.id',
                'language_name' => $languageTablename . '.name',
                'language_abbreviation' => $languageTablename . '.abbreviation',
                'city_id' => $cityTablename . '.id',
                'city_postcode' => $cityTablename . '.number',
                'city_name_de' => $cityTablename . '.title_de',
                'city_name_en' => $cityTablename . '.title_en',
                'city_name_fr' => $cityTablename . '.title_fr',
                'city_name_it' => $cityTablename . '.title_it',
            ])
            ->join([
                [
                    'table' => $userTablename,
                    'type' => 'INNER',
                    'conditions' => $userTablename . '.id=' . $eventParticipationTablename . '.event_id',
                ],
                [
                    'table' => $departmentEventTablename,
                    'type' => 'INNER',
                    'conditions' => $departmentEventTablename . '.event_id=' . $eventParticipationTablename . '.event_id'
                ],
                [
                    'table' => $departmentTableName,
                    'type' => 'INNER',
                    'conditions' => $departmentTableName . '.id=' . $departmentEventTablename . '.department_hash',
                ],
                [
                    'table' => $languageTablename,
                    'type' => 'INNER',
                    'conditions' => $languageTablename . '.id=' . $userTablename . '.language_id',
                ],
                [
                    'table' => $cityTablename,
                    'type' => 'INNER',
                    'conditions' => $cityTablename . '.id=' . $userTablename . '.city_id',
                ],
            ])
            ->where([$eventParticipationTablename . '.event_id' => $eventId])
            ->limit($limit)
            ->page($page);
        $users = $query->execute()->fetchAll('assoc');

        if (empty($users)) ***REMOVED***
            return [];
    ***REMOVED***

        foreach ($users as $key => $user) ***REMOVED***
            $users[$key] = $this->formatter->formatParticipatingUser($user);
    ***REMOVED***
        return $users;
***REMOVED***

    /**
     * Cancel an event with a message (the reason why it is cancelled).
     *
     * @param string $eventId
     * @param string $message
     * @param string $executorId
     * @return bool
     */
    public function cancelEvent(string $eventId, string $message, string $executorId): bool
    ***REMOVED***
        $updated = $this->eventParticipantTable->modify(['message' => $message], ['event_id' => $eventId], $executorId);
        if (!$updated) ***REMOVED***
            return false;
    ***REMOVED***

        return $this->eventParticipantTable->archive($executorId, ['event_id' => $eventId]);
***REMOVED***

    /**
     * Get event participation statuses
     *
     * @return array
     */
    public function getStatuses(): array
    ***REMOVED***
        $query = $this->eventParticipationStatusTable->newSelect();
        $query->select('*');
        $rows = $query->execute()->fetchAll('assoc');
        return !empty($rows)? $rows: [];
***REMOVED***

    /**
     * Check if status exists.
     *
     * @param string $statusId
     * @return bool
     */
    public function existsStatus(string $statusId)
    ***REMOVED***
        return $this->exists($this->eventParticipationStatusTable, ['id'=> $statusId]);
***REMOVED***

    /**
     * Get participations query.
     *
     * @param string $eventId
     * @return Query
     */
    private function getParticipationQuery(string $eventId): Query
    ***REMOVED***
        $eventParticipationTablename = $this->eventParticipantTable->getTablename();
        $userTablename = $this->userTable->getTablename();
        $departmentTableName = $this->departmentTable->getTablename();
        $languageTablename = $this->languageTable->getTablename();
        $cityTablename = $this->cityTable->getTablename();
        $eventTablename = $this->eventTable->getTablename();
        $eventTitleTablename = $this->eventTitleTable->getTablename();
        $eventDescriptionTablename = $this->eventDescritpionTable->getTablename();
        $departmentEventTablename = $this->departmentEventTable->getTablename();

        $fields = [
            'user_id' => $userTablename . '.id',
            'department_hash' => $departmentTableName . '.id',
            'department_name' => $departmentTableName . '.name',
            'last_name' => $userTablename . '.last_name',
            'first_name' => $userTablename . '.first_name',
            'cevi_name' => $userTablename . '.cevi_name',
            'language_id' => $languageTablename . '.id',
            'language_name' => $languageTablename . '.name',
            'language_abbreviation' => $languageTablename . '.abbreviation',
            'city_id' => $cityTablename . '.id',
            'city_postcode' => $cityTablename . '.number',
            'city_name_de' => $cityTablename . '.title_de',
            'city_name_en' => $cityTablename . '.title_en',
            'city_name_fr' => $cityTablename . '.title_fr',
            'city_name_it' => $cityTablename . '.title_it',
            'event_id' => $eventTablename . '.id',
            'event_title_de' => $eventTitleTablename . '.name_de',
            'event_title_en' => $eventTitleTablename . '.name_en',
            'event_title_fr' => $eventTitleTablename . '.name_fr',
            'event_title_it' => $eventTitleTablename . '.name_it',
            'event_description_de' => $eventDescriptionTablename . '.name_de',
            'event_description_en' => $eventDescriptionTablename . '.name_en',
            'event_description_fr' => $eventDescriptionTablename . '.name_fr',
            'event_description_it' => $eventDescriptionTablename . '.name_it',
        ];
        $query = $this->eventParticipantTable->newSelect();
        $query->select($fields)
            ->join([
                [
                    'table' => $userTablename,
                    'type' => 'INNER',
                    'conditions' => $userTablename . '.id=' . $eventParticipationTablename . '.event_id',
                ],
                [
                    'table' => $departmentEventTablename,
                    'type' => 'INNER',
                    'conditions' => $departmentEventTablename . '.event_id=' . $eventParticipationTablename . '.event_id'
                ],
                [
                    'table' => $departmentTableName,
                    'type' => 'INNER',
                    'conditions' => $departmentTableName . '.id=' . $departmentEventTablename . '.department_hash',
                ],
                [
                    'table' => $languageTablename,
                    'type' => 'INNER',
                    'conditions' => $languageTablename . '.id=' . $userTablename . '.language_id',
                ],
                [
                    'table' => $cityTablename,
                    'type' => 'INNER',
                    'conditions' => $cityTablename . '.id=' . $userTablename . '.city_id',
                ],
                [
                    'table' => $eventTablename,
                    'type' => 'INNER',
                    'conditions' => $eventTablename . '.id=' . $eventParticipationTablename . '.event_id',
                ],
                [
                    'table' => $eventTitleTablename,
                    'type' => 'INNER',
                    'conditions' => $eventTitleTablename . '.id=' . $eventTablename . '.event_title_id',
                ],
                [
                    'table' => $eventDescriptionTablename,
                    'type' => 'INNER',
                    'conditions' => $eventDescriptionTablename . '.id=' . $eventTablename . '.event_description_id',
                ],
            ])
            ->where([
                $eventParticipationTablename . '.event_id' => $eventId,
            ]);
        return $query;
***REMOVED***
***REMOVED***
