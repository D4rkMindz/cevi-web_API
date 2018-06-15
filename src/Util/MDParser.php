<?php


namespace App\Util;


use Parsedown;

class MDParser
***REMOVED***
    public static function parse(string $markdown)
    ***REMOVED***
        $parser = new Parsedown();
        return $parser->parse($markdown);
***REMOVED***
***REMOVED***
