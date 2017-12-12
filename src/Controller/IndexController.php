<?php

namespace App\Controller;

use App\Table\UserTable;
use Cake\Database\Connection;
use League\Plates\Engine;
use Psr\Http\Message\ResponseInterface;
use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use SlimSession\Helper;

/**
 * Class IndexController
 */
class IndexController extends AppController
***REMOVED***

    /**
     * @var Connection
     */
    private $connection;

    /**
     * IndexController constructor.
     *
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
*/
    public function __construct(Container $container)
    ***REMOVED***
        parent::__construct($container);
        $this->connection = $container->get(Connection::class);
***REMOVED***

    /**
     * Index method.
     *
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function indexAction(Request $request, Response $response): Response
    ***REMOVED***
        $username = $this->session->get('username');

        $userTable = new UserTable($this->connection);
        $userData = $userTable->getAll();

        $viewData = [
            'page' => 'Home',
            'username'=> $username,
            'users' => $userData,
        ];

        $this->session->set('username', $userData[0]['username']);

        return $this->render($response,'Home/home.indexAction.twig', $viewData);
***REMOVED***
***REMOVED***
