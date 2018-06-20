<?php

namespace App\Service\Mail;

/**
 * MailToken
 */
class MailToken
{
    public static function generate()
    {
        return md5(uniqid(rand(), true));
    }
}
