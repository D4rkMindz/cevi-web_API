<?php


namespace App\Test\Mock;


use App\Service\Mail\MailerInterface;

class MockMailer implements MailerInterface
***REMOVED***

    /**
     * Get domain as string.
     *
     * @return string domain
     */
    public function getDomain(): string
    ***REMOVED***
        return 'test.cevi-web.com'; // Never required
***REMOVED***

    /**
     * Send HTML email.
     *
     * @param string $to Receiver
     * @param string $from Forwarder
     * @param string $subject
     * @param string $html Email content as HTML
     * @return void
     */
    public function sendHtml(string $to, string $subject, string $html, string $from = null)
    ***REMOVED***
***REMOVED***

    /**
     * Send Text email.
     *
     * @param string $to Receiver
     * @param string $from Forwarder
     * @param string $subject
     * @param string $text Email as String
     * @return void
     */
    public function sendText(string $to, string $subject, string $text, string $from = null)
    ***REMOVED***
***REMOVED***
***REMOVED***