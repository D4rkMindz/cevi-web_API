<?php


namespace App\Table;

/**
 * Class LanguageTable
 */
class LanguageTable extends AppTable
***REMOVED***
    protected $table = 'language';

    /**
     * Get language id.
     *
     * @param string $language
     * @return string
     */
    public function getLanguageId(string $language): string
    ***REMOVED***
        $query = $this->newSelect();
        $query->select('id')->where(['name' => $language]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row) ? $row['id'] : '';
***REMOVED***
***REMOVED***
