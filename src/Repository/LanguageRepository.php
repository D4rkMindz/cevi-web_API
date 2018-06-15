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
     * @param string $languageHash
     * @return bool
     */
    public function existsLanguage(string $languageHash)
    ***REMOVED***
        $query = $this->languageTable->newSelect();
        $query->select('hash')->where(['hash' => $languageHash]);
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
        $query->select('hash')->where(['abbreviation' => $abbreviation]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row)? $row['hash'] : 1;
***REMOVED***
***REMOVED***
