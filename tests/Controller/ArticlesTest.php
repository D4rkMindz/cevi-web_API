<?php
/**
 * Created by PhpStorm.
 * User: Björn
 * Date: 06.06.2018
 * Time: 13:04
 */

namespace Controller;


use App\Test\DbTestCase;

class ArticlesTest extends DbTestCase
***REMOVED***
    private $departmentHash;
    private $articleHash;

    /**
     * Get single article
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     */
    public function testGetArticleAction()
    ***REMOVED***
        $request = $this->createRequest('GET', '/v2/departments/' . $this->departmentHash . '/articles/' . $this->articleHash);
        $response = $this->request($request);
        $this->assertSame(200, $response->getStatusCode());
        $requiredKeys = [
            'article',
            'article.hash',
            'article.title',
            'article.title.name_de',
            'article.title.name_en',
            'article.title.name_fr',
            'article.title.name_it',
            'article.description',
            'article.description.name_de',
            'article.description.name_de.plain',
            'article.description.name_de.parsed',
            'article.description.name_en',
            'article.description.name_en.plain',
            'article.description.name_en.parsed',
            'article.description.name_fr',
            'article.description.name_fr.plain',
            'article.description.name_fr.parsed',
            'article.description.name_it',
            'article.description.name_it.plain',
            'article.description.name_it.parsed',
            'article.purchase_date',
            'article.quantity',
            'article.quality',
            'article.quality.hash',
            'article.quality.level',
            'article.quality.name_de',
            'article.quality.name_en',
            'article.quality.name_fr',
            'article.quality.name_it',
            'article.storage',
            'article.storage.hash',
            'article.storage.name',
            'article.storage.url',
            'article.room',
            'article.room.hash',
            'article.room.name',
            'article.room.url',
            'article.corridor',
            'article.corridor.hash',
            'article.corridor.name',
            'article.corridor.url',
            'article.shelf',
            'article.shelf.hash',
            'article.shelf.name',
            'article.shelf.url',
            'article.tray',
            'article.tray.hash',
            'article.tray.name',
            'article.tray.url',
            'article.chest',
            'article.chest.hash',
            'article.chest.name',
            'article.chest.url',
            'article.replacement',
            'article.replacement.needed',
            'article.replacement.urgent',
            'article.replacement.date',
            'article.created_at',
            'article.created_by',
            'article.modified_at',
            'article.modified_by',
            'article.archived_at',
            'article.archived_by',
        ];
        $this->assertResponseHasKeys($response, $requiredKeys);

        $json = (string)$response->getBody();
        $this->assertJson($json);
        $data = json_decode($json, true);
        $this->assertArrayHasKey('article', $data);
        $article = $data['article'];
        $this->assertArrayNotHasKey('id', $article);
***REMOVED***

    public function testGetAllArticlesAction()
    ***REMOVED***
        $request = $this->createRequest('GET', '/v2/departments/' . $this->departmentHash . '/articles');
        $response = $this->request($request);
***REMOVED***

    /**
     * Hook to get all data
     *
     * @param array $data
     */
    protected function getDataHook(array $data): void
    ***REMOVED***
        $this->departmentHash = $data['department'][0]['hash'];
        $this->articleHash = $data['article'][0]['hash'];
***REMOVED***
***REMOVED***
