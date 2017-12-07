<?php

namespace App\Controller;

use App\Service\Mail\MailerInterface;
use App\Service\Mail\MailgunAdapter;
use Exception;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

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
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function indexAction(Request $request, Response $response): Response
    ***REMOVED***
        $viewData = [
            'page' => 'MailgunAdapter',
        ];

        return $this->render('Mail/mail.indexAction.twig', $viewData);
***REMOVED***

    /**
     * Send mail action.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function sendMailAction(Request $request, Response $response): Response
    ***REMOVED***
        $data = $request->getParsedBody();
        try ***REMOVED***
            $this->mail->sendText('bjoern <bjoern.pfoster@gmail.com>', $data['subject'], $data['message']);
    ***REMOVED*** catch (Exception$exception) ***REMOVED***
            return $exception->getMessage();
    ***REMOVED***

        return $this->render('Mail/mail.indexAction.twig');
***REMOVED***
***REMOVED***
