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
        $query->select('number')->where(['number'=>$postcode]);
        $row = $query->execute()->fetch();
        return !empty($row);
***REMOVED***
***REMOVED***
