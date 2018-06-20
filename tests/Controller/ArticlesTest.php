<?php
/**
 * Created by PhpStorm.
 * User: Björn
 * Date: 06.06.2018
 * Time: 13:04
 */

namespace App\Test\Controller;


use App\Test\DbTestCase;

/**
 * Class ArticlesTest
 *
 * @coversDefaultClass \App\Controller\ArticleController
 */
class ArticlesTest extends DbTestCase
{
    private $qualities;
    private $locations;

    /**
     * Get single article
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @covers ::getArticleAction
     */
    public function testGetArticleActionSuccess()
    {
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
            'article.quality.name',
            'article.quality.name.name_de',
            'article.quality.name.name_en',
            'article.quality.name.name_fr',
            'article.quality.name.name_it',
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
            'article.rent',
            'article.rent.available',
            'article.rent.price',
            'article.created_at',
            'article.created_by',
            'article.modified_at',
            'article.modified_by',
            'article.archived_at',
            'article.archived_by',
        ];
        $this->assertResponseHasKeys($requiredKeys, $response);

        $json = (string)$response->getBody();
        $this->assertJson($json);
        $data = json_decode($json, true);
        $this->assertArrayHasKey('article', $data);
        $article = $data['article'];
        $this->assertArrayNotHasKey('id', $article);
    }

    /**
     * Get all articles
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @covers ::getAllArticlesAction
     */
    public function testGetAllArticlesActionSuccess()
    {
        $request = $this->createRequest('GET', '/v2/departments/' . $this->departmentHash . '/articles');
        $response = $this->request($request);
        $this->assertSame(200, $response->getStatusCode());
        $this->assertResponseHasMessage('Success', $response);

        $requiredKeys = [
            'articles',
            'articles.0',
            'articles.0.hash',
            'articles.0.title',
            'articles.0.title.name_de',
            'articles.0.title.name_en',
            'articles.0.title.name_fr',
            'articles.0.title.name_it',
            'articles.0.description',
            'articles.0.description.name_de',
            'articles.0.description.name_de.plain',
            'articles.0.description.name_de.parsed',
            'articles.0.description.name_en',
            'articles.0.description.name_en.plain',
            'articles.0.description.name_en.parsed',
            'articles.0.description.name_fr',
            'articles.0.description.name_fr.plain',
            'articles.0.description.name_fr.parsed',
            'articles.0.description.name_it',
            'articles.0.description.name_it.plain',
            'articles.0.description.name_it.parsed',
            'articles.0.purchase_date',
            'articles.0.quantity',
            'articles.0.quality',
            'articles.0.quality.hash',
            'articles.0.quality.level',
            'articles.0.quality.name',
            'articles.0.quality.name.name_de',
            'articles.0.quality.name.name_en',
            'articles.0.quality.name.name_fr',
            'articles.0.quality.name.name_it',
            'articles.0.storage',
            'articles.0.storage.hash',
            'articles.0.storage.name',
            'articles.0.storage.url',
            'articles.0.room',
            'articles.0.room.hash',
            'articles.0.room.name',
            'articles.0.room.url',
            'articles.0.corridor',
            'articles.0.corridor.hash',
            'articles.0.corridor.name',
            'articles.0.corridor.url',
            'articles.0.shelf',
            'articles.0.shelf.hash',
            'articles.0.shelf.name',
            'articles.0.shelf.url',
            'articles.0.tray',
            'articles.0.tray.hash',
            'articles.0.tray.name',
            'articles.0.tray.url',
            'articles.0.chest',
            'articles.0.chest.hash',
            'articles.0.chest.name',
            'articles.0.chest.url',
            'articles.0.replacement',
            'articles.0.replacement.needed',
            'articles.0.replacement.urgent',
            'articles.0.replacement.date',
            'articles.0.rent',
            'articles.0.rent.available',
            'articles.0.rent.price',
            'articles.0.created_at',
            'articles.0.created_by',
            'articles.0.modified_at',
            'articles.0.modified_by',
            'articles.0.archived_at',
            'articles.0.archived_by',
        ];
        $this->assertResponseHasKeys($requiredKeys, $response);

        $json = (string)$response->getBody();
        $this->assertJson($json);
        $data = json_decode($json, true);
        $this->assertArrayHasKey('articles', $data);
        $articles = $data['articles'];
        $this->assertArrayNotHasKey('id', $articles['0']);
        $this->assertArrayNotHasKey('2', $articles); // maximum result set of the department
    }

    /**
     * Test create article
     * @param array $data
     * @param int $expectedStatusCode
     * @param array $expectedResponseData
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     *
     * @dataProvider createArticleDataprovider
     * @covers ::createArticleAction
     */
    public function testCreateArticle(array $data, int $expectedStatusCode, array $expectedResponseData)
    {
        $request = $this->createRequest('POST', '/v2/departments/' . $this->departmentHash . '/articles');
        $request = $this->withJson($request, $data);
        $response = $this->request($request);

        if (array_key_exists('hash', $expectedResponseData)) {
            $json = $response->getBody()->__toString();
            $data = json_decode($json, true);
            $expectedResponseData['hash'] = $data['hash'];
        }

        if (array_key_exists('url', $expectedResponseData)) {
            $json = $response->getBody()->__toString();
            $data = json_decode($json, true);
            $expectedResponseData['url'] = preg_replace('/{new_article_hash}/', $data['hash'], $expectedResponseData['url']);
        }

        $this->assertDefaultValues($response, $expectedStatusCode, $expectedResponseData, false, false);
    }

    /**
     * @param array $data
     * @param int $expectedStatusCode
     * @param array $expectedResponseData
     * @param $expectedDatabaseState
     * @param $notExpectedDatabaseState
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     * @dataProvider updateArticleDataprovider
     */
    public function testUpdateArticle(array $data, int $expectedStatusCode, array $expectedResponseData, $expectedDatabaseState, $notExpectedDatabaseState)
    {
        $request = $this->createRequest('PUT', '/v2/departments/' . $this->departmentHash . '/articles/' . $this->articleHash);
        $request = $this->withJson($request, $data);
        $response = $this->request($request);

        $this->assertDefaultValues($response, $expectedStatusCode, $expectedResponseData, $expectedDatabaseState, $notExpectedDatabaseState);
    }

    /**
     * Test delete article
     *
     * @throws \Slim\Exception\MethodNotAllowedException
     * @throws \Slim\Exception\NotFoundException
     */
    public function testDeleteArticle()
    {
        $request = $this->createRequest('DELETE', '/v2/departments/' . $this->departmentHash . '/articles/' . $this->articleHash);
        $response = $this->request($request);

        $this->assertSame(200, $response->getStatusCode());
        $this->assertResponseHasMessage('Deleted article successfully', $response);

        $json = $response->getBody()->__toString();
        $this->assertJson($json);
        $data = json_decode($json, true);
        $expectedResponseData = [
            'code' => 200,
            'message' => 'Deleted article successfully',
        ];
        $this->assertEquals($expectedResponseData, $data);

        $tableData = [
            'article' => [
                'hash' => $this->articleHash,
                'archived_by' => '1',
            ],

        ];
        $this->assertDataInDatabase($tableData);
    }

    /**
     * Dataprovider for testCreateArticle
     *
     * @return array
     */
    public function createArticleDataprovider()
    {
        return [
            'Test regular' => [
                'data' => [
                    'title' => 'new title',
                    'description' => "# new description\nTest article description",
                    'purchase_date' => (time() - (60 * 60 * 24 * 150)),
                    'quantity' => 12,
                    'quality_hash' => 'hash_test_1',
                    'replacement' => (time() + (60 * 60 * 24 * 360)),
                    'storage_place_hash' => 'hash_test_1',
                    'available_for_rent' => true,
                    'rent_price' => 12.50,
                ],
                'expectedStatusCode' => 200,
                'expectedResponseData' => [
                    'code' => 200,
                    'message' => 'Inserted article successfully',
                    'hash' => 'hashToBeReplacedManually',
                    'url' => baseurl('/v2/departments/{department_hash}/articles/{new_article_hash}'),
                ],
                'expectedDatabaseState' => [
                    'article' => [
                        'id' => 4,
                        'hash' => 'hash_test_3',
                        'article_title_id' => 3,
                        'article_description_id' => 3,
                        'article_quality_hash' => 'hash_test_3',
                        'storage_place_hash' => 'hash_test_3',
                        'quality_hash' => 'hash_test_1',
                        'department_hash' => 'hash_test_3',
                        'date' => '2017-01-01 00:00:00',
                        'quantity' => '10',
                        'replacement' => '2018-12-01 00:00:00',
                        'barcode' => 'CEVIWEB-A3_L3_D3',
                        'available_for_rent' => true,
                        'rent_price' => 12.50,
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => 'hash_test_1',
                    ],
                ],
                'notExpectedDatabaseState' => false,
            ],
            'Test with empty values' => [
                'data' => [
                    'title' => '',
                    'description' => '',
                    'purchase_date' => null,
                    'quantity' => 0,
                    'quality_hash' => '',
                    'replacement' => null, // ignored, could be null
                    'storage_place_hash' => '',
                    'available_for_rent' => false,
                    'rent_price' => 12,
                ],
                'expectedStatusCode' => 422,
                'expectedResponseData' => [
                    'code' => 422,
                    'message' => 'Please check your data',
                    'info' => [
                        'message' => 'Please check your data',
                        'errors' => [
                            ['field' => 'title', 'message' => 'Required',],
                            ['field' => 'description', 'message' => 'Required',],
                            ['field' => 'purchase_date', 'message' => 'Required',],
                            ['field' => 'quantity', 'message' => 'Required',],
                            ['field' => 'quantity', 'message' => 'Impossible quantity',],
                            ['field' => 'quality_hash', 'message' => 'Required',],
                            ['field' => 'quality_hash', 'message' => 'Quality does not exist',],
                            ['field' => 'storage_place_hash', 'message' => 'Storage place does not exist',],
                            ['field' => 'rent_price', 'message' => 'The article must be available to rent to define a rent price.',],
                        ],
                    ],
                ],
                'expectedDatabaseState' => false,
                'notExpectedDatabaseState' => [
                    'article' => [
                        'id' => 4,
                    ],
                ],
            ],
            'Test with too long values' => [
                'data' => [
                    'title' => str_pad('asdf', 61, '_-'),
                    'description' => str_pad('asdf', 10001, '_-'),
                    'purchase_date' => (time() + (60 * 60 * 24 * 365) + 200), // add 20 because of the testing boot time
                    'quantity' => 10001,
                    'quality_hash' => null,
                    'replacement' => time(), // every date is valid
                    'storage_place_hash' => null,
                    'available_for_rent' => true,
                    'rent_price' => -1,
                ],
                'expectedStatusCode' => 422,
                'expectedResponseData' => [
                    'code' => 422,
                    'message' => 'Please check your data',
                    'info' => [
                        'message' => 'Please check your data',
                        'errors' => [
                            ['field' => 'title', 'message' => 'too long'],
                            ['field' => 'description', 'message' => 'too long'],
                            ['field' => 'purchase_date', 'message' => 'Dates more than a year in the future are not allowed here'],
                            ['field' => 'quantity', 'message' => 'Impossible quantity'],
                            ['field' => 'quality_hash', 'message' => 'Required'],
                            ['field' => 'storage_place_hash', 'message' => 'Storage place does not exist'],
                            ['field' => 'rent_price', 'message' => 'The rent price can not be less than zero'],

                            //['field' => 'title', 'message' => 'too long'],
                            //['field' => 'description', 'message' => 'too long'],
                            //['field' => 'quantity', 'message' => 'Impossible quantity'],
                            //['field' => 'quality_hash', 'message' => 'Required'],
//                            ['field' => 'quality_hash', 'message' => 'Quality does not exist'],
                            //['field' => 'storage_place_hash', 'message' => 'Storage place does not exist'],
                            //['field' => 'rent_price', 'message' => 'The rent price can not be less than zero'],
                        ],
                    ],
                ],
                'expectedDatabaseState' => false,
                'notExpectedDatabaseState' => [
                    'article' => [
                        'id' => 4,
                    ],
                ],
            ],
        ];
    }

    /**
     * Dataprovider for testUpdateArticle
     *
     * @return array
     */
    public function updateArticleDataprovider(): array
    {
        return [
            'Test regular' => [
                'data' => [
                    'title' => 'new title',
                    'description' => "# new description\nTest article description",
                    'purchase_date' => (time() - (60 * 60 * 24 * 150)),
                    'quantity' => 12,
                    'quality_hash' => 'hash_test_2',
                    'replacement' => (time() + (60 * 60 * 24 * 360)),
                    'storage_place_hash' => 'hash_test_2',
                    'available_for_rent' => true,
                    'rent_price' => 12.50,
                ],
                'expectedStatusCode' => 200,
                'expectedResponseData' => [
                    'code' => 200,
                    'message' => 'Updated article successfully',
                ],
                'expectedDatabaseState' => [
                    'article' => [
                        'id' => 1,
                        'article_title_id' => 4,
                        'article_description_id' => 4,
                        'article_quality_hash' => 'hash_test_2',
                        'date' => date('Y-m-d H:i:s', time() - (60 * 60 * 24 * 150)),
                        'quantity' => 12,
                        'replacement' => date('Y-m-d H:i:s', time() + (60 * 60 * 24 * 360)),
                        'storage_place_hash' => 'hash_test_2',
                        'available_for_rent' => true,
                        'rent_price' => 12.50,
                    ]
                ],
                'notExpectedDatabaseState' => false,
            ],
            'Test with empty values' => [
                'data' => [
                    'title' => '',
                    'description' => '',
                    'purchase_date' => null,
                    'quantity' => 0,
                    'quality_hash' => '',
                    // 'replacement' => null, // ignored, could be null
                    'storage_place_hash' => '',
                    'available_for_rent' => false,
                    'rent_price' => 12,
                ],
                'expectedStatusCode' => 422,
                'expectedResponseData' => [
                    'code' => 422,
                    'message' => 'Please check your data',
                    'info' => [
                        'message' => 'Please check your data',
                        'errors' => [
                            ['field' => 'title', 'message' => 'Required',],
                            ['field' => 'description', 'message' => 'Required',],
                            ['field' => 'purchase_date', 'message' => 'Required',],
                            ['field' => 'quantity', 'message' => 'Required',],
                            ['field' => 'quantity', 'message' => 'Impossible quantity',],
                            ['field' => 'quality_hash', 'message' => 'Required',],
                            ['field' => 'quality_hash', 'message' => 'Quality does not exist',],
                            ['field' => 'storage_place_hash', 'message' => 'Storage place does not exist',],
                            ['field' => 'rent_price', 'message' => 'The article must be available to rent to define a rent price.',],
                        ],
                    ]
                ],
                'expectedDatabaseState' => [
                    'article' => [
                        'id' => 3,
                        'hash' => 'hash_test_3',
                        'article_title_id' => 3,
                        'article_description_id' => 3,
                        'article_quality_hash' => 'hash_test_3',
                        'storage_place_hash' => 'hash_test_3',
                        'department_hash' => 'hash_test_3',
                        'date' => '2017-01-01 00:00:00',
                        'quantity' => '10',
                        'replacement' => '2018-12-01 00:00:00',
                        'barcode' => 'CEVIWEB-A3_L3_D3',
                        'available_for_rent' => true,
                        'rent_price' => null,
                        'created_at' => '2017-01-01 00:00:00',
                        'created_by' => '0',
                    ],
                ],
                'notExpectedDatabaseState' => false,
            ]
        ];
    }

    /**
     * Hook to get all data
     *
     * @param array $data
     */
    protected function getDataHook(array $data): void
    {
        $this->qualities = $data['article_quality'];
        $this->locations = $data['storage_place'];
    }
}
