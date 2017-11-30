<?php

namespace App\Controller;

use App\Service\Mail\MailerInterface;
use App\Service\Mail\MailgunAdapter;
use Exception;
use Interop\Container\Exception\ContainerException;
use Slim\Container;

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
     */
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        try ***REMOVED***
            $this->mail = $container->get(MailerInterface::class);
    ***REMOVED*** catch (ContainerException $exception) ***REMOVED***
    ***REMOVED***
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

        return $this->render('view::Mail/index.html.php', $viewData);
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

        return $this->render('view::Mail/index.html.php', []);
***REMOVED***
***REMOVED***
