<?php

namespace App\Controller;

use League\Plates\Engine;

/**
 * Class AppController
 */
class AppController
***REMOVED***
    private $engine;

    /**
     * AppController constructor.
     *
     * @param Engine $engine
     */
    public function __construct(Engine $engine)
    ***REMOVED***
        $this->engine = $engine;
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
        $default = ['base' => baseurl('/', true)];
        $viewData = array_merge_recursive($viewData, $default);
        $this->engine->addData($viewData);

        return $this->engine->render($file, $viewData);
***REMOVED***
***REMOVED***
