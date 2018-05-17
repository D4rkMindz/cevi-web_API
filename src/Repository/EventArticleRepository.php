<?php


namespace App\Repository;

use App\Service\Formatter;
use App\Table\ArticleDescriptionTable;
use App\Table\ArticleQualityTable;
use App\Table\ArticleTable;
use App\Table\ArticleTitleTable;
use App\Table\EventArticleTable;
use App\Table\EventDescriptionTable;
use App\Table\EventTable;
use App\Table\EventTitleTable;
use App\Table\UserTable;
use Interop\Container\Exception\ContainerException;
use Slim\Container;

/**
 * Class EventArticleRepository
 */
class EventArticleRepository extends AppRepository
***REMOVED***
    /**
     * @var ArticleTable
     */
    private $articleTable;

    /**
     * @var ArticleDescriptionTable
     */
    private $articleDescriptionTable;

    /**
     * @var ArticleTitleTable
     */
    private $articleTitleTable;

    /**
     * @var ArticleQualityTable
     */
    private $articleQualityTable;

    /**
     * @var EventArticleTable
     */
    private $eventArticleTable;

    /**
     * @var EventTable
     */
    private $eventTable;

    /**
     * @var EventDescriptionTable
     */
    private $eventDescriptionTable;

    /**
     * @var EventTitleTable
     */
    private $eventTitleTable;

    /**
     * @var Formatter
     */
    private $formatter;

    /**
     * @var UserTable
     */
    private $userTable;

    /**
     * EventArticleRepository constructor.
     * @param Container $container
     * @throws ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->articleTable = $container->get(ArticleTable::class);
        $this->articleDescriptionTable = $container->get(ArticleDescriptionTable::class);
        $this->articleTitleTable = $container->get(ArticleTitleTable::class);
        $this->articleQualityTable = $container->get(ArticleQualityTable::class);
        $this->eventArticleTable = $container->get(EventArticleTable::class);
        $this->eventTable = $container->get(EventTable::class);
        $this->eventDescriptionTable = $container->get(EventDescriptionTable::class);
        $this->eventTitleTable = $container->get(EventTitleTable::class);
        $this->formatter = $container->get(Formatter::class);
        $this->userTable = $container->get(UserTable::class);
***REMOVED***

    /**
     * Get all articles.
     *
     * @param string $eventId
     * @param string $departmentId
     * @param string $descriptionFormat
     * @param string $articleDescriptionFormat
     * @return array
     */
    public function getAllArticles(string $eventId, string $departmentId, string $descriptionFormat, string $articleDescriptionFormat): array
    ***REMOVED***
        $eventTablename = $this->eventTable->getTablename();
        $eventDescriptionTablename = $this->eventDescriptionTable->getTablename();
        $eventTitleTablename = $this->eventTitleTable->getTablename();

        $fields = [
            'id' => $eventTablename . '.id',
            'event_name_de' => $eventTitleTablename . '.name_de',
            'event_name_en' => $eventTitleTablename . '.name_en',
            'event_name_fr' => $eventTitleTablename . '.name_fr',
            'event_name_it' => $eventTitleTablename . '.name_it',
            'event_description_de' => $eventDescriptionTablename . '.name_de',
            'event_description_en' => $eventDescriptionTablename . '.name_en',
            'event_description_fr' => $eventDescriptionTablename . '.name_fr',
            'event_description_it' => $eventDescriptionTablename . '.name_it',
            'created_at' => $eventTablename . '.created_at',
            'created_by' => $eventTablename . '.created_by',
            'modified_at' => $eventTablename . '.modified_at',
            'modified_by' => $eventTablename . '.modified_by',
            'archived_at' => $eventTablename . '.archived_at',
            'archived_by' => $eventTablename . '.archived_by',
        ];

        $query = $this->eventTable->newSelect();
        $query->select($fields)
            ->join([
                [
                    'table' => $eventTitleTablename,
                    'type' => 'INNER',
                    'conditions' => $eventTitleTablename . '.id = ' . $eventTablename . '.event_title_id',
                ],
                [
                    'table' => $eventDescriptionTablename,
                    'type' => 'INNER',
                    'conditions' => $eventDescriptionTablename . '.id = ' . $eventDescriptionTablename . '.event_description_id',
                ],
            ])
            ->where([$eventTablename . '.id' => $eventId]);
        $event = $query->execute()->fetch('assoc');

        if (empty($event)) ***REMOVED***
            return [];
    ***REMOVED***

        $event = $this->formatter->formatEventSimple($event, $descriptionFormat);
        $event['articles'] = $this->getArticles($event['id'], $departmentId,  $articleDescriptionFormat);

        return $event;
***REMOVED***

    /**
     * Link article to event
     *
     * @param string $eventId
     * @param string $articleId
     * @param string $accountableUserId
     * @param int $quantity
     * @param string $executorId
     * @return array
     */
    public function linkArticle(string $eventId, string $articleId, string $accountableUserId, int $quantity, string $executorId): array
    ***REMOVED***
        $row = [
            'event_id' => $eventId,
            'article_id' => $articleId,
            'accountable_user_id' => $accountableUserId,
            'quantity' => $quantity,
        ];
        return $this->eventArticleTable->insert($row, $executorId);
***REMOVED***

    /**
     * Remove linked article
     *
     * @param string $eventId
     * @param string $articleId
     * @param string $executorId
     * @return bool
     */
    public function removeLinkedArticle(string $eventId, string $articleId, string $executorId)
    ***REMOVED***
        return $this->eventArticleTable->archive($executorId, ['event_id' => $eventId, 'article_id' => $articleId]);
***REMOVED***

    /**
     * Check if link exists
     *
     * @param string $eventId
     * @param string $articleId
     * @return bool
     */
    public function existsLink(string $eventId, string $articleId): bool
    ***REMOVED***
        return $this->exists($this->eventArticleTable, ['event_id'=> $eventId, 'article_id'=> $articleId]);
***REMOVED***

    /**
     * Get articles for event
     *
     * @param string $eventId
     * @param string $departmentId
     * @param string $articleDescriptionFormat
     * @return array
     */
    private function getArticles(string $eventId, string $departmentId, string $articleDescriptionFormat): array
    ***REMOVED***
        $eventArticleTablename = $this->eventArticleTable->getTablename();
        $articleTablename = $this->articleTable->getTablename();
        $articleDescriptionTablename = $this->articleDescriptionTable->getTablename();
        $articleTitleTablename = $this->articleTitleTable->getTablename();
        $articleQualityTablename = $this->articleQualityTable->getTablename();

        $fields = [
            'id' => $articleTablename . '.id',
            'title_name_de' => $articleTitleTablename . '.name_de',
            'title_name_en' => $articleTitleTablename . '.name_en',
            'title_name_fr' => $articleTitleTablename . '.name_fr',
            'title_name_it' => $articleTitleTablename . '.name_it',
            'description_name_de' => $articleDescriptionTablename . '.name_de',
            'description_name_en' => $articleDescriptionTablename . '.name_en',
            'description_name_fr' => $articleDescriptionTablename . '.name_fr',
            'description_name_it' => $articleDescriptionTablename . '.name_it',
            'purchase_date' => $articleTablename . '.date',
            'quantity' => $articleTablename . '.quantity',
            'quality_level' => $articleQualityTablename . '.level',
            'quality_name_de' => $articleQualityTablename . '.name_de',
            'quality_name_en' => $articleQualityTablename . '.name_en',
            'quality_name_fr' => $articleQualityTablename . '.name_fr',
            'quality_name_it' => $articleQualityTablename . '.name_it',
            'replace' => $articleTablename . '.replace',
            'barcode' => $articleTablename . '.barcode',
            'created_at' => $articleTablename . '.created_at',
            'created_by' => $articleTablename . '.created_by',
            'modified_at' => $articleTablename . '.modified_at',
            'modified_by' => $articleTablename . '.modified_by',
            'archived_at' => $articleTablename . '.archived_at',
            'archived_by' => $articleTablename . '.archived_by',
            'required_article_quantity' => $eventArticleTablename . '.quantity',
        ];

        $query = $this->eventArticleTable->newSelect();
        $query->select($fields)
            ->join([
                [
                    'table' => $articleTablename,
                    'type' => 'INNER',
                    'conditions' => $eventArticleTablename . '.article_id = ' . $articleTablename . '.id',
                ],
                [
                    'table' => $articleDescriptionTablename,
                    'type' => 'INNER',
                    'conditions' => $articleTablename . '.article_description_id = ' . $articleDescriptionTablename . '.id',
                ],
                [
                    'table' => $articleTitleTablename,
                    'type' => 'INNER',
                    'conditions' => $articleTablename . '.article_title_id = ' . $articleTitleTablename . '.id',
                ],
                [
                    'table' => $articleQualityTablename,
                    'type' => 'INNER',
                    'conditions' => $articleTablename . '.article_quality_id = ' . $articleQualityTablename . '.id',
                ],
            ])
            ->where([$eventArticleTablename . '.event_id' => $eventId]);
        $articles = $query->execute()->fetchAll('assoc');

        if (empty($articles)) ***REMOVED***
            return [];
    ***REMOVED***

        foreach ($articles as $key => $article) ***REMOVED***
            $articles[$key] = $this->formatter->formatArticle($article, $departmentId,$articleDescriptionFormat, false);
            $articles[$key]['accountable_user'] = $this->getAccountableUser($article['id']);
            $articles[$key]['required_quantity'] = $article['required_article_quantity'];
    ***REMOVED***

        return $articles;
***REMOVED***

    /**
     * Get accountable user for article.
     *
     * @param string $articleId
     * @return array
     */
    private function getAccountableUser(string $articleId)
    ***REMOVED***
        $userTablename = $this->userTable->getTablename();
        $eventArticleTablename = $this->eventArticleTable->getTablename();

        $query = $this->eventArticleTable->newSelect();
        $query
            ->select([
                'id' => $eventArticleTablename . '.accountable_user_id',
                'department_id' => $userTablename . '.department_id',
                'first_name' => $userTablename . '.first_name',
                'last_name' => $userTablename . '.last_name',
            ])
            ->join([
                [
                    'table' => $userTablename,
                    'type' => 'INNER',
                    'conditions' => $eventArticleTablename . '.accountable_user_id = ' . $userTablename . '.id',
                ]
            ])
            ->where([$eventArticleTablename . '.article_id' => $articleId]);
        $user = $query->execute()->fetchAll('assoc');
        if (empty($user)) ***REMOVED***
            return [];
    ***REMOVED***

        $user['url'] = baseurl('/v2/users/' . $user['id']);
        return $user;
***REMOVED***
***REMOVED***
