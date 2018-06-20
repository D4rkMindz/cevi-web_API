<?php

namespace App\Service\Mail;

use Mailgun\Mailgun;

/**
 * Class MailgunAdapter
 */
class MailgunAdapter implements MailerInterface
{
    /**
     * @var Mailgun $mail
     */
    private $mail;

    /**
     * @var string $domain
     */
    private $domain;

    /**
     * @var string $from email
     */
    private $from;

    /**
     * MailgunAdapter constructor.
     *
     * @param string $apiKey
     * @param string $domain
     * @param string $sender email
     */
    public function __construct(string $apiKey, string $domain, string $sender)
    {
        $this->mail = Mailgun::create($apiKey);
        $this->domain = $domain;
        $this->from = $sender;
    }

    /**
     * Get domain name.
     *
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * Send Text email.
     *
     * @param string $to Receiver
     * @param string $subject
     * @param string $text Email as String
     * @param string $from Forwarder
     * @return void
     */
    public function sendText(string $to, string $subject, string $text, string $from = null)
    {
        if (empty($from)) {
            $from = $this->from;
        }
        $mailConfig = [
            'from' => $from,
            'to' => $to,
            'subject' => $subject,
            'text' => $text,
        ];
        $this->mail->messages()->send($this->getDomain(), $mailConfig);
    }

    /**
     * Send HTML email.
     *
     * @param string $to Receiver
     * @param string $subject
     * @param string $html Email content as HTML
     * @param string $from Forwarder
     * @return void
     */
    public function sendHtml(string $to,  string $subject, string $html, string $from = null)
    {
        if (empty($from)) {
            $from = $this->from;
        }
        $mailConfig = [
            'from' => $from,
            'to' => $to,
            'subject' => $subject,
            'html' => $html,
        ];
        $this->mail->messages()->send($this->getDomain(), $mailConfig);
    }
}
