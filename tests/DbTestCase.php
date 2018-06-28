<?php

namespace App\Test;

use Cake\Database\Connection;
use Exception;
use PDO;
use Phinx\Console\PhinxApplication;
use Phinx\Wrapper\TextWrapper;
use PHPUnit\DbUnit\Database\DefaultConnection;
use PHPUnit\DbUnit\DataSet\ArrayDataSet;
use PHPUnit\DbUnit\DataSet\IDataSet;
use PHPUnit\DbUnit\Operation\Factory;
use Slim\Container;
use Slim\Http\Response;

/**
 * Class DbTestCase
 */
abstract class DbTestCase extends ApiTestCase
{
    protected $articleHash;
    protected $departmentHash;
    protected $departmentGroupHash;
    protected $departmentRegionHash;
    protected $departmentTypeHash;
    protected $educationalCourseHash;
    protected $educationalCourseOrganiserHash;
    protected $educationalCourseParticipantHash;
    protected $eventHash;
    protected $eventParticipantHash;
    protected $eventParticipationStatusHash;
    protected $genderHash;
    protected $imageHash;
    protected $languageHash;
    protected $permissionHash;
    protected $positionHash;
    protected $slChestHash;
    protected $slCorridorHash;
    protected $slLocationHash;
    protected $slRoomHash;
    protected $slShelfHash;
    protected $slTrayHash;
    protected $storagePlaceHash;
    protected $userHash;

    /**
     * @var PDO
     */
    private static $pdo = null;
    private $conn = null;

    // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
    /**
     * @var Container
     */
    private $container;


    /**
     * Setup.
     *
     * This code will be executed once before the tests are executed.
     *
     * @throws Exception
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function setUp()
    {
        parent::setUp();
        $this->container = $this->app->getContainer();
        $config = $this->container->get('settings')->get('db');

        // Check if phinxlog table exists in database.
        $tableSchema = $config['database'];
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare("SELECT 1 FROM information_schema.TABLES WHERE TABLE_SCHEMA = :tableschema AND TABLE_NAME = :phinxlog");
        $stmt->execute([':tableschema' => $tableSchema, ':phinxlog' => 'phinxlog']);

        $shouldMigrate = true;

        if ($stmt->fetch()) {
            $shouldMigrate = $this->hasPendingMigrations($pdo);
        }

        if ($shouldMigrate) {
            chdir(__DIR__ . '/../config');
            $wrap = new TextWrapper(new PhinxApplication());
            // Execute the command and determine if it was successful.
            $target = null;
            call_user_func([$wrap, 'getMigrate'], 'local', $target);
            $error = $wrap->getExitCode() > 0;
            if ($error) {
                throw new Exception('Error: Setup database failed with exit code: %s', $wrap->getExitCode());
            }
        }

        $this->truncateTables();
        $dumpPath = __DIR__ . '/../resources/dumps/';
        $dump = $dumpPath . 'currentdump.sql';

        $user = $config['username'];
        $password = $config['password'];

        $regenerate = !empty(getenv('DBUNIT_REGENERATE_NOW'));
        $dataSet = $this->getDataSet($regenerate);
        // Regenerate schema by setting DBUNIT_REGENERATE_NOW
        if ($shouldMigrate || $regenerate || !file_exists($dump)) {
            putenv('DBUNIT_REGENERATE_NOW');

            $startInsert = microtime(true);
            Factory::INSERT()->execute($this->getConnection(), $dataSet);
            $endInsert = microtime(true);
            $timeUsedInserting = $endInsert - $startInsert;

            $startDump = microtime(true);
            $mysqldumpExecutable = $config['mysqldump_executable'];
            if (empty($mysqldumpExecutable)) {
                throw new Exception('Mysqldump Executable must be defined in the db.mysqldump_executable in the configuration (env.php)');
            }
            if (file_exists($dump)) {
                rename($dump, $dumpPath . date('Y-m-d_h-i-s') . '_backup.sql');
            }
            $command = "{$mysqldumpExecutable} -u {$user} -p{$password} {$tableSchema} > {$dump}";
            if (empty($password)) {
                $command = "{$mysqldumpExecutable} -u {$user} {$tableSchema} > {$dump}";
            }
            exec($command);
            $endDump = microtime(true);
            $timeUsedDumping = $endDump - $startDump;
        }
        $mysqlExecutable = $config['mysql_executable'];
        if (empty($mysqlExecutable)) {
            throw new Exception('Mysql Executable must be defined in the db.mysql_executable in the configuration (env.php)');
        }
        $startImport = microtime(true);
        $migrateCommand = "{$mysqlExecutable} -u {$user} -p{$password} {$tableSchema}< {$dump}";
        if (empty($password)) {
            $migrateCommand = "{$mysqlExecutable} -u {$user} {$tableSchema}< {$dump}";
        }
        exec($migrateCommand);
        $endImport = microtime(true);
        $timeUsedImporting = $endImport - $startImport;
    }

    /**
     * Get Connection.
     *
     * @return DefaultConnection
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function getConnection(): DefaultConnection
    {
        if ($this->conn === null) {
            $this->conn = new DefaultConnection($this->getPdo());
        }

        return $this->conn;
    }

    /**
     * Generate Update row.
     *
     * @param array $row
     * @return array
     */
    public function generateUpdateRow(array $row): array
    {
        foreach ($row as $key => $value) {
            if (preg_match('/\w*(id)\w*/', $key)) {
                continue;
            }
            $converted = preg_replace('/[ÄÖÜäöüÉÈÀéèà]/', "", $row[$key]);
            $parts = str_split(html_entity_decode($converted));
            sort($parts);
            $row[$key] = implode($parts);
        }

        return $row;
    }

    /**
     * Base url method to use for test data.
     *
     * @param string $path
     * @return mixed|string
     */
    public function baseurl(string $path = '')
    {
        $baseUri = dirname(dirname($_SERVER['SCRIPT_NAME']));
        $result = str_replace('\\', '/', $baseUri) . $path;
        $result = str_replace('//', '/', $result);
        return $result;
    }

    /**
     * Hook to get all data
     *
     * @param array $data
     */
    abstract protected function getDataHook(array $data): void;

    /**
     * Get array data set and create test data base object.
     *
     * @param bool $regenerate
     * @return IDataSet
     */
    protected function getDataSet(bool $regenerate): IDataSet
    {
        $testDatabase = new TestDatabase();
        $startGenerate = microtime(true);
        $json = '';
        if (file_exists(__DIR__ . '/dataset.json') || $regenerate) {
            $json = file_get_contents(__DIR__ . '/dataset.json');
        }

        if (empty($json)) {
            $data = $testDatabase->all();
            $this->fillHashes($data);
            $this->getDataHook($data);
            $json = json_encode($data);
            file_put_contents(__DIR__ . '/dataset.json', $json);
        } else {
            $dataJson = json_decode($json, true);
            $this->fillHashes($dataJson);
            $this->getDataHook($dataJson);
            $endGenerate = microtime(true);
            $timeUsedGenerating = $endGenerate - $startGenerate;
            return new ArrayDataSet($dataJson);
        }
        $endGenerate = microtime(true);
        $timeUsedGenerating = $endGenerate - $startGenerate;
        return new ArrayDataSet($data);
    }

    /**
     * Get PDO object.
     *
     * @return PDO
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function getPdo(): PDO
    {
        if (!self::$pdo) {
            /**
             * @var $connection Connection
             */
            $connection = $this->app->getContainer()->get(Connection::class);
            $pdo = $connection->getDriver()->getConnection();
            self::$pdo = $pdo;
        }

        return self::$pdo;
    }

    /**
     * Truncate all Tables.
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function truncateTables()
    {
        $pdo = $this->getPdo();
        $stmt = $pdo->query('SHOW TABLES');
        while ($row = $stmt->fetch()) {
            $table = array_values($row)[0];
            if ($table !== 'phinxlog') {
                $pdo->prepare(sprintf('TRUNCATE TABLE `%s`', $table))->execute();
            }
        }
    }

    /**
     * Assert that response has keys.
     *
     * @param Response $response
     * @param array $keys
     */
    protected function assertResponseHasKeys(array $keys, Response $response)
    {
        $json = $response->getBody()->__toString();
        $this->assertJson($json);
        $data = json_decode($json, true);
        foreach ($keys as $key) {
            $requiredKeys = $subKeys = explode('.', $key);
            array_pop($subKeys);
            $array = $data;

            foreach ($subKeys as $subKey) {
                $array = $array[$subKey];
            }
            $element = end($requiredKeys);
            $this->assertArrayHasKey($element, $array, "Assertion for {$key} failed");
        }
    }

    /**
     * Assert that response has a message
     *
     * @param $expected
     * @param Response $response
     */
    protected function assertResponseHasMessage($expected, Response $response)
    {
        $json = $response->getBody()->__toString();
        $data = json_decode($json, true);
        $this->assertArrayHasKey('message', $data, 'Response didn\'t have a message key');
        $this->assertSame($expected, $data['message'], 'Response didn\'t have the correct message');
    }

    /**
     * Make default assertions for POST/PUT Requests
     *
     * @param Response $response
     * @param int $expectedStatusCode
     * @param array $expectedResponseData
     * @param $expectedDatabaseState
     * @param $notExpectedDatabaseState
     */
    protected function assertDefaultValues(Response $response, int $expectedStatusCode, array $expectedResponseData, $expectedDatabaseState, $notExpectedDatabaseState, $replaceAnyHashes = true)
    {
        $this->assertSame($expectedStatusCode, $response->getStatusCode());
        $this->assertResponseHasMessage($expectedResponseData['message'], $response);
        $json = $response->getBody()->__toString();
        $this->assertJson($json);
        $responseData = json_decode($json, true);
        if ($replaceAnyHashes) {
            $expectedResponseData = $this->arrayReplaceHashes($expectedResponseData);
        }

        if (array_key_exists('info', $expectedResponseData)
            && is_array($expectedResponseData['info'])
            && array_key_exists('errors', (array)$expectedResponseData['info'])) {
            usort($expectedResponseData['info']['errors'], function ($a, $b) {
                return $a['field'] <=> $b['field'];
            });
            usort($responseData['info']['errors'], function ($a, $b) {
                return $a['field'] <=> $b['field'];
            });
        }

        $this->assertEquals($expectedResponseData, $responseData);

        if ($expectedDatabaseState) {
            $this->assertDataInDatabase($expectedDatabaseState);
        }

        if ($notExpectedDatabaseState) {
            $this->assertDataNotInDatabase($notExpectedDatabaseState);
        }
    }

    /***
     * Assert that data is in database.
     *
     * @param array $data
     */
    protected function assertDataInDatabase($data = ['table' => ['attribute' => 'value']])
    {
        $pdo = $this->getPdo();
        foreach ($data as $table => $values) {
            $query = "SELECT 1 FROM {$table} WHERE ";
            foreach ($values as $attribute => $value) {
                if (is_null($value) || $value === '') {
                    $query .= "{$attribute} IS NULL \nAND ";
                    continue;
                }
                $query .= "{$attribute} = '{$value}' AND ";
            }
            $query = substr($query, 0, -4);
            $stmt = $pdo->query($query);
            $row = $stmt->fetch();
            $this->assertNotEmpty($row, 'Assertion, that values would be in database was wrong');
        }
    }

    /**
     * Assert that data is not in database.
     *
     * @param array $data
     */
    protected function assertDataNotInDatabase($data = ['table' => ['attribute' => 'value']])
    {
        $pdo = $this->getPdo();
        foreach ($data as $table => $values) {
            $query = "SELECT 1 FROM {$table} WHERE ";
            foreach ($values as $attribute => $value) {
                $query .= "{$attribute} = '{$value}' && ";
            }
            $query = substr($query, 0, -4);
            $stmt = $pdo->query($query);
            $row = $stmt->fetch();
            $this->assertEmpty($row, 'Assertion, that values would not be in database was wrong');
        }
    }

    /**
     * Replace all required placeholders in array
     *
     * @param $array
     * @return null|string|string[]
     */
    protected function arrayReplaceHashes($array)
    {
        $array = preg_replace_array('/{article_hash}/', $this->articleHash, $array);
        $array = preg_replace_array('/{department_hash}/', $this->departmentHash, $array);
        $array = preg_replace_array('/{department_group_hash}/', $this->departmentGroupHash, $array);
        $array = preg_replace_array('/{department_region_hash}/', $this->departmentRegionHash, $array);
        $array = preg_replace_array('/{department_type_hash}/', $this->departmentTypeHash, $array);
        $array = preg_replace_array('/{educational_course_hash}/', $this->educationalCourseHash, $array);
        $array = preg_replace_array('/{educational_course_organiser_hash}/', $this->educationalCourseOrganiserHash, $array);
        $array = preg_replace_array('/{educational_course_participant_hash}/', $this->educationalCourseParticipantHash, $array);
        $array = preg_replace_array('/{event_hash}/', $this->eventHash, $array);
        $array = preg_replace_array('/{event_participant_hash}/', $this->eventParticipantHash, $array);
        $array = preg_replace_array('/{event_participation_hash}/', $this->eventParticipationStatusHash, $array);
        $array = preg_replace_array('/{gender_hash}/', $this->genderHash, $array);
        $array = preg_replace_array('/{image_hash}/', $this->imageHash, $array);
        $array = preg_replace_array('/{language_hash}/', $this->languageHash, $array);
        $array = preg_replace_array('/{permission_hash}/', $this->permissionHash, $array);
        $array = preg_replace_array('/{position_hash}/', $this->positionHash, $array);
        $array = preg_replace_array('/{sl_chest_hash}/', $this->slChestHash, $array);
        $array = preg_replace_array('/{sl_corridor_hash}/', $this->slCorridorHash, $array);
        $array = preg_replace_array('/{sl_location_hash}/', $this->slLocationHash, $array);
        $array = preg_replace_array('/{sl_room_hash}/', $this->slRoomHash, $array);
        $array = preg_replace_array('/{sl_shelf_hash}/', $this->slShelfHash, $array);
        $array = preg_replace_array('/{sl_tray_hash}/', $this->slTrayHash, $array);
        $array = preg_replace_array('/{storage_place_hash}/', $this->storagePlaceHash, $array);
        $array = preg_replace_array('/{user_hash}/', $this->userHash, $array);

        // implemented and required for LocationsTest::testGetAll (initially)
        if (is_string($array)) {
            return $array;
        }

        if (array_key_exists('code', $array)) {
            $array['code'] = (int)$array['code'];
        }
        if (array_key_exists('verified', $array)) {
            $array['verified'] = (bool)$array['verified'];
        }
        if (array_key_exists('limit', $array)) {
            $array['limit'] = (int)$array['limit'];
        }
        if (array_key_exists('page', $array)) {
            $array['page'] = (int)$array['page'];
        }
        if (array_key_exists('info', $array)) {
            if (array_key_exists('verified', $array['info'])) {
                $array['info']['verified'] = (bool)$array['info']['verified'];
            }
            if (array_key_exists('signup_completed', $array['info'])) {
                $array['info']['signup_completed'] = (bool)$array['info']['signup_completed'];
            }
        }
        return $array;
    }

    /**
     * Fill in all required hashes.
     *
     * @param $mockDatabaseArray
     */
    private function fillHashes($mockDatabaseArray)
    {
        $this->educationalCourseParticipantHash = $mockDatabaseArray['educational_course_participant'][0]['hash'];
        $this->articleHash = $mockDatabaseArray['article'][0]['hash'];
        $this->departmentHash = $mockDatabaseArray['department'][0]['hash'];
        $this->departmentGroupHash = $mockDatabaseArray['department_group'][0]['hash'];
        $this->departmentRegionHash = $mockDatabaseArray['department_region'][0]['hash'];
        $this->departmentTypeHash = $mockDatabaseArray['department_type'][0]['hash'];
        $this->educationalCourseHash = $mockDatabaseArray['educational_course'][0]['hash'];
        $this->educationalCourseOrganiserHash = $mockDatabaseArray['educational_course_organiser'][0]['hash'];
        $this->eventHash = $mockDatabaseArray['event'][0]['hash'];
        $this->eventParticipantHash = $mockDatabaseArray['event_participant'][0]['hash'];
        $this->eventParticipationStatusHash = $mockDatabaseArray['event_participation_status'][0]['hash'];
        $this->genderHash = $mockDatabaseArray['gender'][0]['hash'];
        $this->imageHash = $mockDatabaseArray['image'][0]['hash'];
        $this->languageHash = $mockDatabaseArray['language'][0]['hash'];
        $this->permissionHash = $mockDatabaseArray['permission'][0]['hash'];
        $this->positionHash = $mockDatabaseArray['position'][0]['hash'];
        $this->slChestHash = $mockDatabaseArray['sl_chest'][0]['hash'];
        $this->slCorridorHash = $mockDatabaseArray['sl_corridor'][0]['hash'];
        $this->slLocationHash = $mockDatabaseArray['sl_location'][0]['hash'];
        $this->slRoomHash = $mockDatabaseArray['sl_room'][0]['hash'];
        $this->slShelfHash = $mockDatabaseArray['sl_shelf'][0]['hash'];
        $this->slTrayHash = $mockDatabaseArray['sl_tray'][0]['hash'];
        $this->storagePlaceHash = $mockDatabaseArray['storage_place'][0]['hash'];
        $this->userHash = $mockDatabaseArray['user'][0]['hash'];
    }

    /**
     * Check if there is any pending migration.
     *
     * @param PDO $pdo
     * @return bool
     * @throws \Interop\Container\Exception\ContainerException
     */
    private function hasPendingMigrations(PDO $pdo): bool
    {
        $shouldMigrate = true;
        // Check if there is any pending migration
        $stmt = $pdo->prepare("SELECT version FROM phinxlog ORDER BY version ASC");
        $stmt->execute();
        $executedMigrations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($executedMigrations !== false) {
            foreach ($executedMigrations as $key => $record) {
                $executedMigrations[$key] = $record['version'];
            }

            $migrationsPath = $this->container->get('settings')->get('migrations');
            $migrationFiles = glob($migrationsPath . '/*.php');
            foreach ($migrationFiles as $key => $file) {
                $filename = basename($file, '.php');
                if ($filename === 'schema') {
                    unset($migrationFiles[$key]);
                    continue;
                }
                $migrationFiles[$key] = preg_replace('/[^\d\W]+/', '', $filename);;
            }
            $missingMigrations = array_diff($migrationFiles, $executedMigrations);
            $shouldMigrate = !empty($missingMigrations);
        }

        return $shouldMigrate;
    }
}

