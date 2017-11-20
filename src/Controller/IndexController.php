<?php

namespace App\Controller;

use App\Table\UserTable;
use Cake\Database\Connection;
use League\Plates\Engine;
use Slim\Container;
use SlimSession\Helper;

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
        $session = new Helper();

        $this->container = $container;
        $this->connection = $this->container->get('connection');
        parent::__construct($this->container->get(Engine::class), $session);
***REMOVED***

    /**
     * Index method,
     * .
     *
     * @return string
     */
    public function index()
    ***REMOVED***
        $username = $this->session->get('username');

        $userTable = new UserTable();
        $userData = $userTable->getAll();

        $viewData = [
            'page' => 'Home',
            'username'=> $username,
            'userData' => $userData,
        ];

        $this->session->set('username', $userData[0]['username']);

        return $this->render('view::Home/index.html.php', $viewData);
***REMOVED***
***REMOVED***
