<?php
/**
 * Created by PhpStorm.
 * User: bjoern.pfoster
 * Date: 24.11.2017
 * Time: 16:16
 */

namespace App\Service\Mail;

interface MailService
***REMOVED***
    /**
     * Get domain as string.
     *
     * @return string domain
     */
    public function getDomain(): string;

    /**
     * Send HTML email.
     *
     * @param string $to Receiver
     * @param string $from Forwarder
     * @param string $subject
     * @param string $html Email content as HTML
     * @return void
     */
    public function sendHtml(string $to, string $from, string $subject, string $html);

    /**
     * Send Text email.
     *
     * @param string $to Receiver
     * @param string $from Forwarder
     * @param string $subject
     * @param string $text Email as String
     * @return void
     */
    public function sendText(string $to, string $from, string $subject, string $text);
***REMOVED***
