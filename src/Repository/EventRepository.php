<?php


namespace App\Repository;


use App\Util\Formatter;
use App\Util\TranslateService;
use App\Table\DepartmentEventTable;
use App\Table\DepartmentGroupTable;
use App\Table\DepartmentTable;
use App\Table\EventDescriptionTable;
use App\Table\EventImageTable;
use App\Table\EventTable;
use App\Table\EventTitleTable;
use App\Table\ImageTable;
use Cake\Database\Query;
use Exception;
use Slim\Container;

/**
 * Class EventRepository
 */
class EventRepository extends AppRepository
{
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
     * @var EventImageTable
     */
    private $eventImageTable;

    /**
     * @var ImageTable
     */
    private $imageTable;

    /**
     * @var Formatter
     */
    private $formatter;

    public function __construct(Container $container)
    {
        $this->eventTable = $container->get(EventTable::class);
        $this->eventTitleTable = $container->get(EventTitleTable::class);
        $this->departmentTable = $container->get(DepartmentTable::class);
        $this->departmentEventTable = $container->get(DepartmentEventTable::class);
        $this->departmentGroupTable = $container->get(DepartmentGroupTable::class);
        $this->eventDescriptionTable = $container->get(EventDescriptionTable::class);
        $this->eventImageTable = $container->get(EventImageTable::class);
        $this->imageTable = $container->get(ImageTable::class);

        $this->formatter = new Formatter();
    }

    /**
     * @param int $limit Limit of records
     * @param int $page pagination @see https://book.cakephp.org/3.0/en/orm/query-builder.html
     * @param int $until date in the future (format: time(), @see http://php.net/manual/de/function.time.php)
     * @param string $departmentGroupId
     * @param string $departmentId
     * @param int $since
     * @param string $descriptionFormat either parsed or plain. If null, both formats will be returned
     * @param bool $isPublic
     * @return array
     */
    public function getEvents(int $limit, int $page, int $until, string $departmentGroupId, string $departmentId, int $since, string $descriptionFormat = null, bool $isPublic = true): array
    {
        $query = $this->getEventQuery($limit, $page, $until, $departmentGroupId, $departmentId, $since, $isPublic);
        $events = $query->execute()->fetchAll('assoc');
        if (empty($events)) {
            return [];
        }

        $events = $this->addEventImages($descriptionFormat, $events);

        return $events;
    }

    /**
     * Get single event.
     *
     * @param string $eventId
     * @param int $limit
     * @param int $page
     * @param int $until
     * @param string $departmentGroupId
     * @param string $departmentId
     * @param int $since
     * @param string|null $descriptionFormat
     * @param bool $isPublic
     * @return array
     */
    public function getEvent(string $eventId, int $limit, int $page, int $until, string $departmentGroupId, string $departmentId, int $since, string $descriptionFormat = null, bool $isPublic = true): array
    {
        $query = $this->getEventQuery($limit, $page, $until, $departmentGroupId, $departmentId, $since, $isPublic);
        $query->andWhere([$this->eventTable->getTablename() . '.id' => $eventId]);
        $event = $query->execute()->fetch('assoc');
        if (empty($event)) {
            return [];
        }

        $event = $this->addEventImages($descriptionFormat, $event);

        return $event;
    }

    /**
     * Create event.
     *
     * @param array $data
     * @param string $lang
     * @param string $userId
     * @return array
     */
    public function createEvent(array $data, string $lang, string $userId): array
    {
        $eventTitleId = $this->insertEventTitle((string)$data['title'], $lang, $userId);
        $eventDescriptionId = $this->insertEventDescription((string)$data['description'], $lang, $userId);

        $row = [
            'event_title_id' => $eventTitleId,
            'event_description_id' => $eventDescriptionId,
            'price' => (float)$data['price'],
            'start' => date('Y-m-d H:i:s', (int)$data['start']),
            'end' => date('Y-m-d H:i:s', (int)$data['end']),
            'start_leaders' => date('Y-m-d H:i:s', (int)$data['start_leaders']),
            'end_leaders' => date('Y-m-d H:i:s', (int)$data['end_leaders']),
            'public' => (bool)$data['public'],
            'publicize_at' => date('Y-m-d H:i:s', (int)$data['publicize_at']),
        ];

        return $this->eventTable->insert($row, $userId);
    }

    /**
     * Update event.
     *
     * @param array $data
     * @param int $eventId
     * @param string $lang
     * @param string $userId
     * @return bool
     */
    public function updateEvent(array $data, int $eventId, string $lang, string $userId): bool
    {
        $row = [];

        if (array_key_exists('title', $data)) {
            $row['title_id'] = $this->insertEventTitle((string)$data['title'], $lang, $userId);
        }
        if (array_key_exists('description', $data)) {
            $row['description_id'] = $this->insertEventDescription((string)$data['description'], $lang, $userId);
        }
        if (array_key_exists('start', $data)) {
            $row['start'] = date('Y-m-d H:i:s', (int)$data['start']);
        }
        if (array_key_exists('end', $data)) {
            $row['start'] = date('Y-m-d H:i:s', (int)$data['end']);
        }
        if (array_key_exists('start_leaders', $data)) {
            $row['start'] = date('Y-m-d H:i:s', (int)$data['start_leaders']);
        }
        if (array_key_exists('end_leaders', $data)) {
            $row['start'] = date('Y-m-d H:i:s', (int)$data['end_leaders']);
        }
        if (array_key_exists('price', $data)) {
            $row['price'] = (float)$data['price'];
        }

        if (array_key_exists('public', $data)) {
            $row['public'] = (bool)$data['public'];
            $row['publicize_at'] = !empty($data['publicize_at']) ? date('Y-m-d H:i:s', (int)$data['publicize_at']) : null;
        }

        return $this->eventTable->modify($row, [$this->eventTable->getTablename() . '.id' => $eventId], $userId);
    }

    /**
     * Check if event exists.
     *
     * @param string $eventId
     * @param string $departmentId
     * @return bool
     */
    public function existsEvent(string $eventId, string $departmentId): bool
    {
        return $this->exists($this->departmentEventTable, ['event_id' => $eventId, 'department_hash'=> $departmentId]);
    }

    /**
     * Insert event title.
     *
     * @param string $eventTitle
     * @param string $lang
     * @param string $userId
     * @return string
     */
    private function insertEventTitle(string $eventTitle, string $lang, string $userId)
    {
        $translated = TranslateService::trans($eventTitle, $lang);
        $row = [
            'name_de' => $translated['de'],
            'name_en' => $translated['en'],
            'name_fr' => $translated['fr'],
            'name_it' => $translated['it'],
        ];

        return $this->eventTitleTable->insert($row, $userId);
    }

    /**
     * Insert event description.
     *
     * @param string $eventDescription
     * @param string $lang
     * @param string $userId
     * @return int
     */
    private function insertEventDescription(string $eventDescription, string $lang, string $userId): int
    {
        $translated = TranslateService::trans($eventDescription, $lang);
        $row = [
            'name_de' => $translated['de'],
            'name_en' => $translated['en'],
            'name_fr' => $translated['fr'],
            'name_it' => $translated['it'],
        ];

        return $this->eventDescriptionTable->insert($row, $userId);
    }

    /**
     * Delete event.
     *
     * @param string $eventId
     * @param string $executorId
     * @return bool
     */
    public function deleteEvent(string $eventId, string $executorId)
    {
        try {
            $this->eventTable->archive($executorId, ['id' => $eventId]);
        } catch (Exception $exception) {
            return false;
        }
        return true;
    }

    /**
     * Get event selection query.
     *
     * @param int $limit
     * @param int $page
     * @param int $until
     * @param string $departmentGroupId
     * @param string $departmentId
     * @param int $since
     * @param bool $isPublic
     * @return Query
     */
    private function getEventQuery(int $limit, int $page, int $until, string $departmentGroupId, string $departmentId, int $since, bool $isPublic): Query
    {
        $eventTableName = $this->eventTable->getTablename();
        $eventTitleTableName = $this->eventTitleTable->getTablename();
        $departmentEventTableName = $this->departmentEventTable->getTablename();
        $eventDescriptionTableName = $this->eventDescriptionTable->getTablename();

        $fields = [
            'hash' => $eventTableName . '.hash',
            'event_name_de' => $eventTitleTableName . '.name_de',
            'event_name_en' => $eventTitleTableName . '.name_en',
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
            'created_at' => $eventTableName . '.created_at',
            'created_by' => $eventTableName . '.created_by',
            'modified_at' => $eventTableName . '.modified_at',
            'modified_by' => $eventTableName . '.modified_by',
            'archived_at' => $eventTableName . '.archived_at',
            'archived_by' => $eventTableName . '.archived_by',
        ];

        $where = [];
        if ($isPublic) {
            $where[$eventTableName . '.public'] = true;
        }
        $where[$eventTableName . '.start <= '] = date('Y-m-d H:i:s', $until);
        $where[$eventTableName . '.start >= '] = date('Y-m-d H:i:s', $since);

        if (!empty($departmentId)) {
            $where[$departmentEventTableName . '.department_hash'] = $departmentId;
        }

        if (!empty($departmentGroupId)) {
            $where[$departmentEventTableName . '.department_group_hash'] = $departmentGroupId;
        }

        $query = $this->eventTable->newSelect();
        $query->select($fields)
            ->join([
                [
                    'table' => $eventTitleTableName,
                    'type' => 'INNER',
                    'conditions' => $eventTableName . '.event_title_id=' . $eventTitleTableName . '.id',
                ],
                [
                    'table' => $departmentEventTableName,
                    'type' => 'LEFT',
                    'conditions' => $departmentEventTableName . '.event_hash=' . $eventTableName . '.hash',
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
        return $query;
    }

    /**
     * Add all event images to the event array
     *
     * @param string $descriptionFormat
     * @param $events
     * @return mixed
     */
    private function addEventImages(string $descriptionFormat, $events)
    {
        $imageTablename = $this->imageTable->getTablename();
        $eventImageTablename = $this->eventImageTable->getTablename();

        $fields = [
            'hash' => $imageTablename . '.hash',
            'url' => $imageTablename . '.url',
        ];

        $query = $this->eventImageTable->newSelect();
        $query->select($fields)
            ->join([
                [
                    'table' => $imageTablename,
                    'type' => 'RIGHT',
                    'conditions' => $eventImageTablename . '.image_hash = ' . $imageTablename . '.hash',
                ],
            ]);

        foreach ($events as $key => $event) {
            $q = $query;
            $q->where([$eventImageTablename . '.event_hash' => $event['hash']]);

            $images = $q->execute()->fetchAll('assoc');
            if (!empty($images)) {
                foreach ($images as $k => $image) {
                    $images[$k]['url'] = baseurl($image['url']);
                }
            } else {
                $images = ['message' => __('No images available')];
            }
            $event['images'] = $images;
            $events[$key] = $this->formatter->formatEvent($event, $descriptionFormat);
        }
        return $events;
    }
}
