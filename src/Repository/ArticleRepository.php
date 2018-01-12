<?php


namespace App\Repository;


use App\Service\Barcode;
use App\Service\Formatter;
use App\Service\TranslateService;
use App\Table\ArticleDescriptionTable;
use App\Table\ArticleQualityTable;
use App\Table\ArticleTable;
use App\Table\ArticleTitleTable;
use App\Table\SlChestTable;
use App\Table\SlCorridorTable;
use App\Table\SlLocationTable;
use App\Table\SlRoomTable;
use App\Table\SlShelfTable;
use App\Table\SlTrayTable;
use App\Table\StoragePlaceTable;
use Cake\Database\Query;
use Slim\Container;

class ArticleRepository extends AppRepository
***REMOVED***
    /**
     * @var ArticleTitleTable
     */
    private $articleTable;

    /**
     * @var ArticleTitleTable
     */
    private $articleTitleTable;

    /**
     * @var ArticleQualityTable
     */
    private $articleQualtityTable;

    /**
     * @var ArticleDescriptionTable
     */
    private $articleDescrtiptionTable;

    /**
     * @var StoragePlaceTable
     */
    private $storagePlaceTable;

    /**
     * @var SlLocationTable
     */
    private $slLocationTable;

    /**
     * @var SlRoomTable
     */
    private $slRoomTable;

    /**
     * @var SlCorridorTable
     */
    private $slCorridorTable;

    /**
     * @var SlShelfTable
     */
    private $slShelfTable;

    /**
     * @var SlTrayTable
     */
    private $slTrayTable;

    /**
     * @var SlChestTable
     */
    private $slChestTable;

    /**
     * @var Formatter
     */
    private $formatter;

    /**
     * ArticleRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->articleTable = $container->get(ArticleTable::class);
        $this->articleTitleTable = $container->get(ArticleTitleTable::class);
        $this->articleDescrtiptionTable = $container->get(ArticleDescriptionTable::class);
        $this->articleQualtityTable = $container->get(ArticleQualityTable::class);
        $this->storagePlaceTable = $container->get(StoragePlaceTable::class);
        $this->slLocationTable = $container->get(SlLocationTable::class);
        $this->slRoomTable = $container->get(SlRoomTable::class);
        $this->slCorridorTable = $container->get(SlCorridorTable::class);
        $this->slShelfTable = $container->get(SlShelfTable::class);
        $this->slTrayTable = $container->get(SlTrayTable::class);
        $this->slChestTable = $container->get(SlChestTable::class);

        $this->formatter = new Formatter();
***REMOVED***

    /**
     * Get all articles.
     *
     * @param int $departmentId
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function getAllArticles(int $departmentId, int $limit, int $page)
    ***REMOVED***
        $articleTableName = $this->articleTable->getTablename();
        $query = $this->getArticleQuery()
            ->limit($limit)
            ->page($page)
            ->where([
                $articleTableName . '.department_id' => $departmentId,
                $articleTableName . '.deleted' => false,
            ]);
        $articles = $query->execute()->fetchAll('assoc');

        if (empty($articles)) ***REMOVED***
            return [];
    ***REMOVED***

        foreach ($articles as $key => $article) ***REMOVED***
            $articles[$key] = $this->formatter->formatArticle($article);
    ***REMOVED***

        return $articles;
***REMOVED***

    /**
     * Get article Query.
     *
     * @return Query
     */
    private function getArticleQuery(): Query
    ***REMOVED***
        $articleTableName = $this->articleTable->getTablename();
        $articleTitleTableName = $this->articleTitleTable->getTablename();
        $articleDescriptionTableName = $this->articleDescrtiptionTable->getTablename();
        $articleQualityTableName = $this->articleQualtityTable->getTablename();
        $storagePlaceTableName = $this->storagePlaceTable->getTablename();
        $slLocationTableName = $this->slLocationTable->getTablename();
        $slRoomTableName = $this->slRoomTable->getTablename();
        $slCorridorTableName = $this->slCorridorTable->getTablename();
        $slShelfTableName = $this->slShelfTable->getTablename();
        $slTrayTableName = $this->slTrayTable->getTablename();
        $slChestTableName = $this->slChestTable->getTablename();

        $fields = [
            'id' => $articleTableName . '.id',
            'title_name_de' => $articleTitleTableName . '.name_de',
            'title_name_en' => $articleTitleTableName . '.name_en',
            'title_name_fr' => $articleTitleTableName . '.name_fr',
            'title_name_it' => $articleTitleTableName . '.name_it',
            'description_name_de' => $articleDescriptionTableName . '.name_de',
            'description_name_en' => $articleDescriptionTableName . '.name_en',
            'description_name_fr' => $articleDescriptionTableName . '.name_fr',
            'description_name_it' => $articleDescriptionTableName . '.name_it',
            'purchase_date' => $articleTableName . '.date',
            'quantity' => $articleTableName . '.quantity',
            'quality_level' => $articleQualityTableName . '.level',
            'quality_name' => $articleQualityTableName . '.name',
            'location_id' => $storagePlaceTableName . '.sl_location_id',
            'location_name' => $slLocationTableName . '.name',
            'room_id' => $storagePlaceTableName . '.sl_location_id',
            'room_name' => $slRoomTableName . '.name',
            'corridor_id' => $storagePlaceTableName . '.sl_location_id',
            'corridor_name' => $slCorridorTableName . '.name',
            'shelf_id' => $storagePlaceTableName . '.sl_location_id',
            'shelf_name' => $slShelfTableName . '.name',
            'tray_id' => $storagePlaceTableName . '.sl_location_id',
            'tray_name' => $slTrayTableName . '.name',
            'chest_id' => $storagePlaceTableName . '.sl_location_id',
            'chest_name' => $slChestTableName . '.name',
            'replace' => $articleTableName . '.replace',
            'barcode' => $articleTableName . '.barcode',
            'created' => $articleTableName . '.created',
            'created_by' => $articleTableName . '.created_by',
            'modified' => $articleTableName . '.modified',
            'modified_by' => $articleTableName . '.modified_by',
            'deleted' => $articleTableName . '.deleted',
            'deleted_by' => $articleTableName . '.deleted_by',
            'deleted_at' => $articleTableName . '.deleted_at',
        ];

        $join = [
            [
                'table' => $articleTitleTableName,
                'type' => 'INNER',
                'conditions' => $articleTableName . '.article_title_id = ' . $articleTitleTableName . '.id',
            ],
            [
                'table' => $articleDescriptionTableName,
                'type' => 'INNER',
                'conditions' => $articleTableName . '.article_description_id = ' . $articleDescriptionTableName . '.id',
            ],
            [
                'table' => $articleQualityTableName,
                'type' => 'INNER',
                'conditions' => $articleTableName . '.article_quality_id = ' . $articleQualityTableName . '.id',
            ],
            [
                'table' => $storagePlaceTableName,
                'type' => 'INNER',
                'conditions' => $articleTableName . '.storage_place_id = ' . $storagePlaceTableName . '.id',
            ],
            [
                'table' => $slLocationTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_location_id = ' . $slLocationTableName . '.id',
            ],
            [
                'table' => $slRoomTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_room_id = ' . $slRoomTableName . '.id',
            ],
            [
                'table' => $slCorridorTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_corridor_id = ' . $slCorridorTableName . '.id',
            ],
            [
                'table' => $slShelfTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_shelf_id = ' . $slShelfTableName . '.id',
            ],
            [
                'table' => $slTrayTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_tray_id = ' . $slTrayTableName . '.id',
            ],
            [
                'table' => $slChestTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_chest_id = ' . $slChestTableName . '.id',
            ],
        ];

        $query = $this->articleTable->newSelect();
        $query->select($fields)->join($join);
        return $query;
***REMOVED***

    /**
     * Inser new article.
     *
     * @param array $article
     * @param string $lang
     * @param string $userId
     * @return string last inserted id (article id)
     */
    public function insertArticle(array $article, string $lang, string $userId): string
    ***REMOVED***
        $articleTitleId = $this->insertArticleTitle($article['title'], $lang);
        $articleDescriptionId = $this->insertArticleDescription($article['description'], $lang);
        $storagePlaceId = $this->getStoragePlaceId($article['location_id'], $article['room_id'], $article['corridor_id'], $article['shelf_id'], $article['tray_id'], $article['chest_id'], $article['storage_place_name']);
        $row = [
            'article_title_id' => $articleTitleId,
            'article_description_id' => $articleDescriptionId,
            'article_quality_id' => $article['quality_id'],
            'storage_place_id' => $storagePlaceId,
            'department_id' => $article['department_id'],
            'date' => $article['date'],
            'quantity' => $article['quantity'],
            'replace' => $article['replacement_date'],
            'created' => date('Y-m-d H:i:s'),
            'created_by' => $userId,
        ];

        $articleId = $this->articleTable->insert($row);
        $barcode = Barcode::generate($articleId, $storagePlaceId, $article['department_id']);
        $this->articleTable->update(['barcode' => $barcode], $articleId);

        return $articleId;
***REMOVED***

    /**
     * Insert article title.
     *
     * @param string $articleTitle
     * @param string $lang
     * @return string
     */
    private function insertArticleTitle(string $articleTitle, string $lang)
    ***REMOVED***
        $translated = TranslateService::trans($articleTitle, $lang);
        $row = [
            'name_de' => $translated['de'],
            'name_en' => $translated['en'],
            'name_fr' => $translated['fr'],
            'name_it' => $translated['it'],
        ];
        return $this->articleTitleTable->insert($row);
***REMOVED***

    /**
     * Insert article title.
     *
     * @param string $articleDescription
     * @param string $lang
     * @return string
     */
    private function insertArticleDescription(string $articleDescription, string $lang)
    ***REMOVED***
        $translated = TranslateService::trans($articleDescription, $lang);
        $row = [
            'name_de' => $translated['de'],
            'name_en' => $translated['en'],
            'name_fr' => $translated['fr'],
            'name_it' => $translated['it'],
        ];

        return $this->articleDescrtiptionTable->insert($row);
***REMOVED***

    /**
     * Get storage place id.
     *
     * @param string $locationId
     * @param string $roomId
     * @param string $corridorId
     * @param string $shelfId
     * @param string $trayId
     * @param string $chestId
     * @param string $name
     * @return string
     */
    private function getStoragePlaceId(string $locationId, string $roomId, string $corridorId, string $shelfId, string $trayId, string $chestId, string $name)
    ***REMOVED***
        $row = [
            'sl_location_id' => $locationId,
            'sl_room_id' => $roomId,
            'sl_corridor_id' => $corridorId,
            'sl_shelf_id' => $shelfId,
            'sl_tray_id' => $trayId,
            'sl_chest_id' => $chestId,
            'deleted' => false,
        ];
        $query = $this->storagePlaceTable->newSelect();
        $query->select('id')->where($row);
        $row = $query->execute()->fetch();

        if (!empty($row)) ***REMOVED***
            return $row['id'];
    ***REMOVED***

        $row['name'] = $name;

        return $this->storagePlaceTable->insert($row);

***REMOVED***

    /**
     * Check if quality exists.
     *
     * @param string $qualityId
     * @return bool
     */
    public function existsQuality(string $qualityId): bool
    ***REMOVED***
        $query = $this->articleQualtityTable->newSelect();
        $query->select(1)->where(['id' => $qualityId, 'deleted' => false]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***
***REMOVED***
