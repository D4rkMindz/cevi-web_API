<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 18.12.2017
 * Time: 22:46
 */

namespace App\Test;


class Mockbuilder
***REMOVED***
    /**
     * Get User data
     *
     * @param bool $forceReload
     * @return array
     */
    public static function User(bool $forceReload = false)
    ***REMOVED***
        $file = __DIR__ . '/Database/Data/user.json';
        $data = self::getData($file, $forceReload);
        return $data;
***REMOVED***

    /**
     * Get data
     *
     * @param string $file
     * @param bool $forceReload
     * @return mixed
     */
    private static function getData(string $file, bool $forceReload): array
    ***REMOVED***
        if (!file_exists($file) || $forceReload) ***REMOVED***
            $data = require_once __DIR__ . '/Database/Data/user.php';
            file_put_contents($file, json_encode($data));
    ***REMOVED*** else ***REMOVED***
            $data = json_decode(file_get_contents($file), true);
    ***REMOVED***
        return $data;
***REMOVED***
***REMOVED***
