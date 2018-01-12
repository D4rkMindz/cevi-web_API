<?php
/**
 * Created by PhpStorm.
 * User: Björn
 * Date: 11.01.2018
 * Time: 21:01
 */

namespace App\Test\Controller;


use App\Controller\ArticleController;
use App\Factory\JsonResponseFactory;
use App\Repository\ArticleRepository;
use Slim\Container;
use Slim\Http\Response;

/**
 * Class ArticleControllerTest
 * @coversDefaultClass App\Controller\ArticleController
 */
class ArticleControllerTest extends BaseControllerTest
***REMOVED***
    /**
     * @covers ::getAllArticlesAction()
     */
    public function testGetAllArticlesAction()
    ***REMOVED***
        // TODO replace JSON data
        $json = '***REMOVED***"id":"1","title":***REMOVED***"name_de":"Titel des Artikels","name_en":"Title of the article","name_fr":"Titre de l\'article","name_it":"Titolo dell\' articolo"***REMOVED***,"description":***REMOVED***"name_de":***REMOVED***"plain":"Beschreibung des Artikels"***REMOVED***,"name_en":***REMOVED***"plain":"Description of the article"***REMOVED***,"name_fr":***REMOVED***"plain":"Description de l\'article"***REMOVED***,"name_it":***REMOVED***"plain":"Descrizione dell\' articolo"***REMOVED******REMOVED***,"purchase_date":"2018-01-11 21:44:06","quantity":10,"quality":***REMOVED***"level":1,"name":"Sehr Gut"***REMOVED***,"storage":***REMOVED***"id":"1","name":"Ort","url":"\/v2\/articles\/1"***REMOVED***,"room":***REMOVED***"id":"1","name":"Raum","url":"\/v2\/articles\/1"***REMOVED***,"corridor":***REMOVED***"id":"1","name":"Korridor","url":"\/v2\/articles\/1"***REMOVED***,"shelf":***REMOVED***"id":"1","name":"Regal","url":"\/v2\/articles\/1"***REMOVED***,"tray":***REMOVED***"id":"1","name":"Tablar","url":"\/v2\/articles\/1"***REMOVED***,"chest":***REMOVED***"id":"1","name":"Kiste","url":"\/v2\/articles\/1"***REMOVED***,"replacement":***REMOVED***"needed":true,"date":"2018-01-11 00:44:15"***REMOVED***,"barcode":"CEVIWEB-A1_L1_D1","created":"2018-01-11 21:44:47","created_by":"1","modified":null,"modified_by":null,"deleted":false,"deleted_by":null,"deleted_at":null***REMOVED***';
        $articles = [json_decode($json, true)];
        $articleRepositoryMock = $this->getMockBuilder(ArticleRepository::class)
            ->setConstructorArgs([$this->container])
            ->setMethods(['getAllArticles'])
            ->getMock();
        $articleRepositoryMock->method('getAllArticles')->willReturn($articles);
        $this->container[ArticleRepository::class] = function () use ($articleRepositoryMock) ***REMOVED***
            return $articleRepositoryMock;
    ***REMOVED***;
        $articleController = new ArticleController($this->container);
        $response = $articleController->getAllArticlesAction($this->request, $this->response, ['department_id' => 1]);

        $responseDataExpected = [
            'limit' => 1000,
            'page' => 1,
            'articles' => $articles,
        ];

        $expected = json_encode(JsonResponseFactory::success($responseDataExpected, 200, 'Success'));
        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertSame($expected, (string)$response->getBody());
***REMOVED***

    // todo more tests
***REMOVED***
