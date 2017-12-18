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
     * @param string $abbreviation
     * @return string
     */
    public function getLanguageId(string $abbreviation): string
    ***REMOVED***
        $query = $this->newSelect();
        $query->select('id')->where(['abbreviation' => $abbreviation]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row) ? $row['id'] : '';
***REMOVED***
***REMOVED***
