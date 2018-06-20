<?php


namespace App\Util;


class Barcode
{
    public static function generate(string $articleId, string $locationId, string $departmentId)
    {
        return 'CEVIWEB-ART:' . $articleId . ':LOC:' . $locationId . ':DEPT:' . $departmentId;
    }
}
