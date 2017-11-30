<?php

namespace App\Controller;

use League\Plates\Engine;
use Monolog\Logger;
use Slim\Container;
use Slim\Http\Request;
use Slim\Router;
use SlimSession\Helper as SessionHelper;
use Interop\Container\Exception\ContainerException;

/**
 * Class AppController
 */
class AppController
***REMOVED***
    /**
     * @var SessionHelper
     */
    protected $session;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Router
     */
    protected $router;

    /**
     * @var Engine
     */
    private $engine;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * AppController constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    ***REMOVED***
        try ***REMOVED***
            $this->request = $container->get('request');
            $this->engine = $container->get(Engine::class);
            $this->session = $container->get(SessionHelper::class);
            $this->router = $container->get('router');
            $this->logger = $container->get(Logger::class);
    ***REMOVED*** catch (ContainerException $exception) ***REMOVED***
            // TODO handle Exception
            return null;
    ***REMOVED***
***REMOVED***

    /**
     * Render HTML file.
     *
     * @param string $file
     * @param array $viewData
     * @return string rendered HTML File
     */
    public function render(string $file, array $viewData): string
    ***REMOVED***
        $default = ['base' => $this->router->pathFor('/')];
        $viewData = array_merge_recursive($viewData, $default);
        $this->engine->addData($viewData);

        return $this->engine->render($file, $viewData);
***REMOVED***
***REMOVED***
