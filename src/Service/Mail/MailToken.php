<?php

namespace App\Service\Mail;

/**
 * MailToken
 */
class MailToken
***REMOVED***
    public static function generate()
    ***REMOVED***
        return md5(uniqid(rand(), true));
***REMOVED***
***REMOVED***
