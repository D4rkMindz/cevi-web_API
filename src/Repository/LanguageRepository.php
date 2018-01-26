<?php


namespace App\Repository;


use App\Table\LanguageTable;
use Slim\Container;

class LanguageRepository extends AppRepository
***REMOVED***
    /**
     * @var LanguageTable
     */
    private $languageTable;

    /**
     * LanguageRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->languageTable = $container->get(LanguageTable::class);
***REMOVED***

    /**
     * Check if language exists.
     *
     * @param string $languageId
     * @return bool
     */
    public function existsLanguage(string $languageId)
    ***REMOVED***
        $query = $this->languageTable->newSelect();
        $query->select('id')->where(['id' => $languageId, 'archived_at' => date('Y-m-d H:i:s')]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***
***REMOVED***
