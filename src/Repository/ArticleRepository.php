<?php


namespace App\Repository;


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
use App\Util\Barcode;
use App\Util\Formatter;
use App\Util\TranslateService;
use Cake\Database\Query;
use Exception;
use Slim\Container;

class ArticleRepository extends AppRepository
{
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
    {
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
    }

    /**
     * Get single article
     *
     * @param string $departmentHash
     * @param string $articleHash
     * @return array
     */
    public function getArticle(string $departmentHash, string $articleHash): array
    {
        $articleTableName = $this->articleTable->getTablename();
        $query = $this->getArticleQuery();
        $query->where([$articleTableName . '.department_hash' => $departmentHash, $articleTableName . '.hash' => $articleHash]);
        $row = $query->execute()->fetch('assoc');
        if (empty($row)) {
            return [];
        }

        $article = $this->formatter->formatArticle($row, $departmentHash);
        return $article;
    }

    /**
     * Get all articles for storage place
     *
     * @param string $storagePlaceHash
     * @param string $departmentHash
     * @param string $descriptionFormat 'both'||'plain'||'parsed'
     * @return array
     */
    public function getArticleForStorageplace(string $storagePlaceHash, string $departmentHash, string $descriptionFormat = 'both'): array
    {
        $articleTableName = $this->articleTable->getTablename();
        $articleTitleTableName = $this->articleTitleTable->getTablename();
        $articleDescriptionTableName = $this->articleDescrtiptionTable->getTablename();
        $articleQualityTableName = $this->articleQualtityTable->getTablename();

        $fields = [
            'hash' => $articleTableName . '.hash',
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
            'quality_hash' => $articleQualityTableName . '.hash',
            'quality_level' => $articleQualityTableName . '.level',
            'quality_name_de' => $articleQualityTableName . '.name_de',
            'quality_name_en' => $articleQualityTableName . '.name_en',
            'quality_name_fr' => $articleQualityTableName . '.name_fr',
            'quality_name_it' => $articleQualityTableName . '.name_it',
            'replacement' => $articleTableName . '.replace',
            'barcode' => $articleTableName . '.barcode',
            'created_at' => $articleTableName . '.created_at',
            'created_by' => $articleTableName . '.created_by',
            'modified_at' => $articleTableName . '.modified_at',
            'modified_by' => $articleTableName . '.modified_by',
            'archived_by' => $articleTableName . '.archived_by',
            'archived_at' => $articleTableName . '.archived_at',
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
                'conditions' => $articleTableName . '.article_quality_hash = ' . $articleQualityTableName . '.hash',
            ],
        ];
        $query = $this->articleTable->newSelect();
        $query->select($fields)->join($join)->where([$this->articleTable->getTablename() . '.storage_place_hash' => $storagePlaceHash]);
        $articles = $query->execute()->fetchAll('assoc');
        if (empty($articles)) {
            return [];
        }

        foreach ($articles as $key => $article) {
            $articles[$key] = $this->formatter->formatArticle($article, $departmentHash, $descriptionFormat, false);
        }

        return $articles;
    }

    /**
     * Get all articles.
     *
     * @param string $departmentHash
     * @param int $limit
     * @param int $page
     * @param string $descriptionFormat
     * @return array
     */
    public function getAllArticles(string $departmentHash, int $limit, int $page, string $descriptionFormat): array
    {
        $articleTableName = $this->articleTable->getTablename();
        $query = $this->getArticleQuery()
            ->limit($limit)
            ->page($page)
            ->where([
                $articleTableName . '.department_hash' => $departmentHash,
            ]);

        $articles = $query->execute()->fetchAll('assoc');

        if (empty($articles)) {
            return [];
        }

        foreach ($articles as $key => $article) {
            $articles[$key] = $this->formatter->formatArticle($article, $departmentHash, $descriptionFormat);
        }

        return $articles;
    }

    /**
     * Check if quantity is possible to use for article. Measured with the full, possible quantity.
     *
     * @param string $articleId
     * @param int $quantity
     * @return bool
     */
    public function hasQuantity(string $articleId, int $quantity): bool
    {
        $query = $this->articleTable->newSelect();
        $query->select('quantity')->where(['id' => $articleId]);
        $quantityAvailable = $query->execute()->fetch('assoc')[0];
        return $quantity <= $quantityAvailable;

    }

    /**
     * Inser new article.
     *
     * @param array $article
     * @param string $lang
     * @param string $userId
     * @return string last inserted id (article id)
     */
    public function insertArticle(array $article, string $lang, string $userId): string
    {
        $articleTitleId = $this->insertArticleTitle($article['title'], $lang, $userId);
        $articleDescriptionId = $this->insertArticleDescription($article['description'], $lang, $userId);
        $availableForRent = array_key_exists('available_for_rent', $article) ? $article['available_for_rent'] : false;
        $row = [
            'hash' => uniqid(),
            'article_title_id' => $articleTitleId,
            'article_description_id' => $articleDescriptionId,
            'article_quality_hash' => $article['quality_hash'],
            'storage_place_hash' => $article['storage_place_hash'],
            'department_hash' => $article['department_hash'],
            'date' => date('Y-m-d H:i:s', $article['purchase_date']),
            'quantity' => (int)$article['quantity'],
            'replacement' => date('Y-m-d H:i:s', $article['replacement']),
            'available_for_rent' => $availableForRent,
        ];

        $articleHash = $this->articleTable->insert($row, $userId);
        $barcode = Barcode::generate($articleHash, $article['storage_place_hash'], $article['department_hash']);
        $this->articleTable->modify(['barcode' => $barcode], ['id' => $articleHash], $userId);
        return $articleHash;
    }

    /**
     * Update article
     *
     * @param array $article
     * @param string $lang
     * @param string $userId
     * @return bool
     */
    public function updateArticle(array $article, string $lang, string $userId): bool
    {
        $row = [
            'modified_at' => date('Y-m-d H:i:s'),
            'modified_by' => $userId,
        ];
        if (array_key_exists('title', $article)) {
            $row['article_title_id'] = $this->insertArticleTitle($article['title'], $lang, $userId);
        }

        if (array_key_exists('description', $article)) {
            $row['article_description_id'] = $this->insertArticleDescription($article['description'], $lang, $userId);
        }

        if (array_key_exists('quality_hash', $article)) {
            $row['article_quality_hash'] = $article['quality_hash'];
        }

        if (array_key_exists('storage_place_hash', $article)) {
            $row['storage_place_hash'] = $article['storage_place_hash'];
        }

        if (array_key_exists('purchase_date', $article)) {
            $row['date'] = date('Y-m-d H:i:s', $article['purchase_date']);
        }

        if (array_key_exists('quantity', $article)) {
            $row['quantity'] = $article['quantity'];
        }

        if (array_key_exists('replacement', $article)) {
            $row['replacement'] = date('Y-m-d H:i:s', $article['replacement']);
        }

        if (array_key_exists('available_for_rent', $article)) {
            $row['available_for_rent'] = $article['available_for_rent'];
        }

        if (array_key_exists('rent_price', $article)) {
            $row['rent_price'] = $article['rent_price'];
        }

        return $this->articleTable->modify($row, ['hash' => $article['hash']], $userId);
    }

    /**
     * Delete article
     *
     * @param int $articleHash
     * @param string $executorId
     * @return bool
     */
    public function deleteArticle(string $articleHash, string $executorId)
    {
        try {
            $this->articleTable->archive($executorId, ['hash' => $articleHash]);
        } catch (Exception $exception) {
            return false;
        }
        return true;
    }

    /**
     * Check if article exists
     *
     * @param string $articleId
     * @param string $departmentId
     * @return bool
     */
    public function existsArticle(string $articleId, string $departmentId)
    {
        return $this->exists($this->articleTable, ['hash' => $articleId, 'department_hash' => $departmentId]);
    }

    /**
     * Check if storage place exists
     *
     * @param string $storagePlaceHash
     * @return bool
     */
    public function existsStoragePlace(string $storagePlaceHash): bool
    {
        $query = $this->storagePlaceTable->newSelect();
        $query->select(1)->where(['hash' => $storagePlaceHash]);
        $row = $query->execute()->fetch();
        return !empty($row);
    }

    /**
     * Check if quality exists.
     *
     * @param string $qualityHash
     * @return bool
     */
    public function existsQuality(string $qualityHash): bool
    {
        $query = $this->articleQualtityTable->newSelect();
        $query->select(1)->where(['hash' => $qualityHash]);
        $row = $query->execute()->fetch();
        return !empty($row);
    }

    /**
     * Get all article qualities.
     *
     * @return array
     */
    public function getQualities()
    {
        $query = $this->articleQualtityTable->newSelect();
        $query->select('*');
        $rows = $query->execute()->fetchAll('assoc');
        return $rows ?: [];
    }

    /**
     * Get article Query.
     *
     * @return Query
     */
    private function getArticleQuery(): Query
    {
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
            'hash' => $articleTableName . '.hash',
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
            'quality_hash' => $articleQualityTableName . '.hash',
            'quality_level' => $articleQualityTableName . '.level',
            'quality_name_de' => $articleQualityTableName . '.name_de',
            'quality_name_en' => $articleQualityTableName . '.name_en',
            'quality_name_fr' => $articleQualityTableName . '.name_fr',
            'quality_name_it' => $articleQualityTableName . '.name_it',
            'location_hash' => $storagePlaceTableName . '.sl_location_hash',
            'location_name' => $slLocationTableName . '.name',
            'room_hash' => $storagePlaceTableName . '.sl_location_hash',
            'room_name' => $slRoomTableName . '.name',
            'corridor_hash' => $storagePlaceTableName . '.sl_location_hash',
            'corridor_name' => $slCorridorTableName . '.name',
            'shelf_hash' => $storagePlaceTableName . '.sl_location_hash',
            'shelf_name' => $slShelfTableName . '.name',
            'tray_hash' => $storagePlaceTableName . '.sl_location_hash',
            'tray_name' => $slTrayTableName . '.name',
            'chest_hash' => $storagePlaceTableName . '.sl_location_hash',
            'chest_name' => $slChestTableName . '.name',
            'replacement' => $articleTableName . '.replacement',
            'barcode' => $articleTableName . '.barcode',
            'available_for_rent' => $articleTableName . '.available_for_rent',
            'rent_price' => $articleTableName . '.rent_price',
            'created_at' => $articleTableName . '.created_at',
            'created_by' => $articleTableName . '.created_by',
            'modified_at' => $articleTableName . '.modified_at',
            'modified_by' => $articleTableName . '.modified_by',
            'archived_by' => $articleTableName . '.archived_by',
            'archived_at' => $articleTableName . '.archived_at',
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
                'conditions' => $articleTableName . '.article_quality_hash = ' . $articleQualityTableName . '.hash',
            ],
            [
                'table' => $storagePlaceTableName,
                'type' => 'INNER',
                'conditions' => $articleTableName . '.storage_place_hash = ' . $storagePlaceTableName . '.hash',
            ],
            [
                'table' => $slLocationTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_location_hash = ' . $slLocationTableName . '.hash',
            ],
            [
                'table' => $slRoomTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_room_hash = ' . $slRoomTableName . '.hash',
            ],
            [
                'table' => $slCorridorTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_corridor_hash = ' . $slCorridorTableName . '.hash',
            ],
            [
                'table' => $slShelfTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_shelf_hash = ' . $slShelfTableName . '.hash',
            ],
            [
                'table' => $slTrayTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_tray_hash = ' . $slTrayTableName . '.hash',
            ],
            [
                'table' => $slChestTableName,
                'type' => 'LEFT',
                'conditions' => $storagePlaceTableName . '.sl_chest_hash = ' . $slChestTableName . '.hash',
            ],
        ];

        $query = $this->articleTable->newSelect();
        $query->select($fields)->join($join);
        return $query;
    }

    /**
     * Insert article title.
     *
     * @param string $articleTitle
     * @param string $lang
     * @param string $userId
     * @return string
     */
    private function insertArticleTitle(string $articleTitle, string $lang, string $userId): int
    {
        $translated = TranslateService::trans($articleTitle, $lang);
        $row = [
            'name_de' => $translated['de'],
            'name_en' => $translated['en'],
            'name_fr' => $translated['fr'],
            'name_it' => $translated['it'],
        ];
        return $this->articleTitleTable->insert($row, $userId);
    }

    /**
     * Insert article title.
     *
     * @param string $articleDescription
     * @param string $lang
     * @param string $userId
     * @return string
     */
    private function insertArticleDescription(string $articleDescription, string $lang, string $userId): int
    {
        $translated = TranslateService::trans($articleDescription, $lang);
        $row = [
            'name_de' => $translated['de'],
            'name_en' => $translated['en'],
            'name_fr' => $translated['fr'],
            'name_it' => $translated['it'],
        ];

        return $this->articleDescrtiptionTable->insert($row, $userId);
    }

    /**
     * Get storage place id.
     *
     * @param string $locationId
     * @param string $roomHash
     * @param string $corridorHash
     * @param string $shelfHash
     * @param string $trayHash
     * @param string $chestHash
     * @param string $name
     * @param string $userId
     * @return string
     */
    private function getStoragePlaceHash(string $locationId, string $roomHash, string $corridorHash, string $shelfHash, string $trayHash, string $chestHash, string $name, string $userHash)
    {
        $row = [
            'sl_location_hash' => $locationId,
            'sl_room_hash' => $roomHash,
            'sl_corridor_hash' => $corridorHash,
            'sl_shelf_hash' => $shelfHash,
            'sl_tray_hash' => $trayHash,
            'sl_chest_hash' => $chestHash,
        ];
        $query = $this->storagePlaceTable->newSelect();
        $query->select('hash')->where($row);
        $row = $query->execute()->fetch();

        if (!empty($row)) {
            return $row['hash'];
        }

        $row['hash'] = uniqid();
        $row['name'] = $name;
        $row['created_at'] = date('Y-m-d H:i:s');
        $row['created_by'] = $userHash;

        $this->storagePlaceTable->insert($row, $userHash);
        return $row['hash'];
    }
}
