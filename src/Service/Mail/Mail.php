<?php

namespace App\Service\Mail;

use Mailgun\Mailgun;

/**
 * Class Mail
 */
class Mail implements MailService
***REMOVED***
    /**
     * @var Mailgun $mail
     */
    private $mail;

    /**
     * @var string $domain
     */
    private $domain;

    /**
     * @var string $sender email
     */
    private $sender;

    /**
     * Mail constructor.
     *
     * @param string $apiKey
     * @param string $domain
     * @param string $sender email
     */
    public function __construct(string $apiKey, string $domain, string $sender)
    ***REMOVED***
        $this->mail = Mailgun::create($apiKey);
        $this->domain = $domain;
        $this->sender = $sender;
***REMOVED***

    public function getDomain()
    ***REMOVED***
        return $this->domain;
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
    public function sendText(string $to, string $from, string $subject, string $text)
    ***REMOVED***
        $mailConfig = [
            'from' => $this->sender,
            'to' => $to,
            'subject' => $subject,
            'text' => $text,
        ];
        $this->mail->messages()->send($this->getDomain(), $mailConfig);
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
    public function sendHtml(string $to, string $from, string $subject, string $html)
    ***REMOVED***
        $mailConfig = [
            'from' => $this->sender,
            'to' => $to,
            'subject' => $subject,
            'html' => $html,
        ];
        $this->mail->messages()->send($this->getDomain(), $mailConfig);
***REMOVED***
***REMOVED***
