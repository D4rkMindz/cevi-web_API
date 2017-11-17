<?php

namespace App\Controller;

use App\Table\UserTable;
use Cake\Database\Connection;
use League\Plates\Engine;
use Slim\Container;

/**
 * Class IndexController
 */
class IndexController extends AppController
***REMOVED***
    /**
     * @var Container
     */
    protected $container;

    /**
     * @var Connection
     */
    private $connection;

    /**
     * IndexController constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->container = $container;
        $this->connection = $this->container->get('connection');
        parent::__construct($this->container->get(Engine::class));
***REMOVED***

    /**
     * Index method,
     * .
     *
     * @return string
     */
    public function index()
    ***REMOVED***
        $userTable = new UserTable();
        $userData = $userTable->getAll();
        $viewData = [
            'page' => 'Home',
            'userData' => $userData,
        ];

        return $this->render('view::Home/index.html.php', $viewData);
***REMOVED***
***REMOVED***
