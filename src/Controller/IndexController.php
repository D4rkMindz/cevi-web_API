<?php

namespace App\Controller;

use App\Table\UserTable;
use Slim\Container;

class IndexController extends AppController
***REMOVED***
    private $connection;

    public function __construct(Container $container)
    ***REMOVED***
        $this->connection = $container->get('connection');
        parent::__construct($container->get('renderEngine'));
***REMOVED***

    public function index()
    ***REMOVED***
        $userTable = new UserTable();
        $userData = $userTable->getAll();
        $viewData = [
            'page' => 'Home',
            'userData' => $userData,
        ];
        return $this->render('view::index.html.php', $viewData);
***REMOVED***
***REMOVED***
