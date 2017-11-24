<?php

namespace App\Controller;

use App\Service\Mail\Mail;
use Exception;
use Mailgun\Mailgun;
use Slim\Container;

class MailController extends AppController
***REMOVED***
    /**
     * @var Mail
     */
    private $mail;

    public function __construct(Container $container)
    ***REMOVED***
        $this->mail = $container->get(Mailgun::class);
        parent::__construct($container);
***REMOVED***

    public function index()
    ***REMOVED***
        $viewData = [
            'page' => 'Mail',
        ];

        return $this->render('view::Mail/index.html.php', $viewData);
***REMOVED***

    public function sendMail()
    ***REMOVED***
        $data = $this->request->getParsedBody();
        try ***REMOVED***
            $this->mail->send('bjoern <bjoern.pfoster@gmail.com>', $data['subject'], $data['message']);
    ***REMOVED*** catch (Exception$exception) ***REMOVED***
            return $exception->getMessage();
    ***REMOVED***

        return $this->render('view::Mail/index.html.php', []);
***REMOVED***
***REMOVED***
