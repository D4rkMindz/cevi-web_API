<?php


namespace App\Util;


use Parsedown;

class MDParser
{
    public static function parse(string $markdown)
    {
        $parser = new Parsedown();
        return $parser->parse($markdown);
    }
}
