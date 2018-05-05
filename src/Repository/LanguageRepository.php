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
        $query->select('id')->where(['id' => $languageId]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***

    /**
     * Get language by abbreviation.
     *
     * @param string $abbreviation
     * @return int
     */
    public function getLanguageByAbbreviation(string $abbreviation)
    ***REMOVED***
        $query = $this->languageTable->newSelect();
        $query->select('id')->where(['abbreviation' => $abbreviation]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row)? $row['id'] : 1;
***REMOVED***
***REMOVED***
