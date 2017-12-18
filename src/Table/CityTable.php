<?php


namespace App\Table;


class CityTable extends AppTable
***REMOVED***
    protected $table = 'city';

    /**
     * Check if postode exists in database.
     *
     * @param string $postcode postcode from switzerland
     * @return bool true if postcodes exists in database.
     */
    public function existsPostcode(string $postcode): bool
    ***REMOVED***
        $query = $this->newSelect();
        $query->select('number')->where(['number' => $postcode]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***

    /**
     * Get city id by postcode.
     *
     * @param string $postcode
     * @return string
     */
    public function getIdByPostcode(string $postcode): string
    ***REMOVED***
        $query = $this->newSelect();
        $query->select('id')->where(['number' => $postcode]);
        $row = $query->execute()->fetch('assoc');
        return !empty($row) ? (string)$row['id'] : '';
***REMOVED***
***REMOVED***
