<?php

namespace App\Controller;

use App\Service\Mail\MailerInterface;
use App\Service\Mail\MailgunAdapter;
use Exception;
use Slim\Container;
use Slim\Views\Twig;

class MailController extends AppController
***REMOVED***
    /**
     * @var MailgunAdapter
     */
    private $mail;

    /**
     * MailController constructor.
     *
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->mail = $container->get(MailerInterface::class);
***REMOVED***

    /**
     * Index action.
     *
     * @return string rendered HTML
     */
    public function index(): string
    ***REMOVED***
        $viewData = [
            'page' => 'MailgunAdapter',
        ];

        return $this->render('Mail/index.html.php', $viewData);
***REMOVED***

    /**
     * Send mail action.
     *
     * @return string rendered HTML
     */
    public function sendMail(): string
    ***REMOVED***
        $data = $this->request->getParsedBody();
        try ***REMOVED***
            $this->mail->sendText('bjoern <bjoern.pfoster@gmail.com>', $data['subject'], $data['message']);
    ***REMOVED*** catch (Exception$exception) ***REMOVED***
            return $exception->getMessage();
    ***REMOVED***

        return $this->render('Mail/index.html.php');
***REMOVED***
***REMOVED***
