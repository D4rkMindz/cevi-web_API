<?php


namespace App\Service;


use Parsedown;

class MDParser
***REMOVED***
    public static function parse(string $markdown)
    ***REMOVED***
        $parser = new Parsedown();
        return $parser->parse($markdown);
***REMOVED***
***REMOVED***
