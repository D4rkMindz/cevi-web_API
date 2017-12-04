<?php

namespace App\Controller;

use Interop\Container\Exception\ContainerException;
use League\Plates\Engine;
use Monolog\Logger;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Router;
use Slim\Views\Twig;
use SlimSession\Helper as SessionHelper;

/**
 * Class AppController
 */
class AppController
***REMOVED***
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var SessionHelper
     */
    protected $session;


    /**
     * @var Router
     */
    protected $router;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @var Twig
     */
    protected $twig;

    /**
     * AppController constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    ***REMOVED***
        try ***REMOVED***
            $this->request = $container->get('request');
            $this->response = $container->get('response');
            $this->session = $container->get(SessionHelper::class);
            $this->router = $container->get('router');
            $this->logger = $container->get(Logger::class);
            $this->twig = $container->get(Twig::class);
    ***REMOVED*** catch (ContainerException $exception) ***REMOVED***
            // TODO handle Exception
    ***REMOVED***
***REMOVED***

    /**
     * Render HTML file.
     *
     * @param string $file
     * @param array $viewData
     * @return Response
     */
    public function render(string $file, array $viewData = []): Response
    ***REMOVED***
        $extend = [
            'base'=> baseurl('/'),
        ];
        $viewData = array_replace_recursive($extend, $viewData);
        return $this->twig->render($this->response, $file, $viewData);
***REMOVED***

    /**
     * Return JSON Response.
     *
     * @param array $data
     * @param int $status
     * @return Response
     */
    public function json(array $data, int $status = 200): Response
    ***REMOVED***
        return $this->response->withJson($data, $status);
***REMOVED***

    /**
     * Return redirect.
     *
     * @param string $url
     * @param int $status
     * @return Response
     */
    public function redirect(string $url, int $status = 301): Response
    ***REMOVED***
        return $this->response->withRedirect($url, $status);
***REMOVED***
***REMOVED***
