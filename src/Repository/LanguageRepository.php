<?php


namespace App\Repository;


use App\Table\LanguageTable;
use Slim\Container;

class LanguageRepository extends AppRepository
{
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
    {
        $this->languageTable = $container->get(LanguageTable::class);
    }

    /**
     * Check if language exists.
     *
     * @param string $languageHash
     * @return bool
     */
    public function existsLanguage(string $languageHash)
    {
        $query = $this->languageTable->newSelect();
        $query->select('hash')->where(['hash' => $languageHash]);
        $row = $query->execute()->fetch();
        return !empty($row);
    }

    /**
     * Get language by abbreviation.
     *
     * @param string $abbreviation
     * @return int
     */
    public function getLanguageByAbbreviation(string $abbreviation)
    {
        $query = $this->languageTable->newSelect();
        $query->select('hash')->where(['abbreviation' => $abbreviation]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row)? $row['hash'] : 1;
    }
}
