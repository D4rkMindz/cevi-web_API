<?php

namespace App\Controller;

use League\Plates\Engine;
use Slim\Container;
use SlimSession\Helper;

/**
 * Class AppController
 */
class AppController
***REMOVED***
    /**
     * @var Container
     */
    protected $container;
    protected $session;
    private $engine;

    /**
     * AppController constructor.
     *
     * @param Engine $engine
     * @param Helper $session
     */
    public function __construct(Engine $engine, Helper $session)
    ***REMOVED***
        $this->engine = $engine;
        $this->session = $session;
***REMOVED***

    /**
     * Render HTML file.
     *
     * @param string $file
     * @param array $viewData
     * @return string rendered HTML File
     */
    public function render(string $file, array $viewData)
    ***REMOVED***
        //TODO implement base via PSR-7 Middleware
        $default = ['base' => ''];
        $viewData = array_merge_recursive($viewData, $default);
        $this->engine->addData($viewData);

        return $this->engine->render($file, $viewData);
***REMOVED***
***REMOVED***
