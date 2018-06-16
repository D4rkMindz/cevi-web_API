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
***REMOVED***
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
    ***REMOVED***
        parent::setUp();
        $this->container = $this->app->getContainer();
        $config = $this->container->get('settings')->get('db');

        // Check if phinxlog table exists in database.
        $tableSchema = $config['database'];
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare("SELECT 1 FROM information_schema.TABLES WHERE TABLE_SCHEMA = :tableschema AND TABLE_NAME = :phinxlog");
        $stmt->execute([':tableschema' => $tableSchema, ':phinxlog' => 'phinxlog']);

        $shouldMigrate = true;

        if ($stmt->fetch()) ***REMOVED***
            $shouldMigrate = $this->hasPendingMigrations($pdo);
    ***REMOVED***

        if ($shouldMigrate) ***REMOVED***
            chdir(__DIR__ . '/../config');
            $wrap = new TextWrapper(new PhinxApplication());
            // Execute the command and determine if it was successful.
            $target = null;
            call_user_func([$wrap, 'getMigrate'], 'local', $target);
            $error = $wrap->getExitCode() > 0;
            if ($error) ***REMOVED***
                throw new Exception('Error: Setup database failed with exit code: %s', $wrap->getExitCode());
        ***REMOVED***
    ***REMOVED***

        $this->truncateTables();
        $dumpPath = __DIR__ . '/../resources/dumps/';
        $dump = $dumpPath . 'currentdump.sql';

        $user = $config['username'];
        $password = $config['password'];

        $dataSet = $this->getDataSet();
        // Regenerate schema by setting DBUNIT_REGENERATE_NOW
        if ($shouldMigrate || !empty(getenv('DBUNIT_REGENERATE_NOW')) || !file_exists($dump)) ***REMOVED***
            putenv('DBUNIT_REGENERATE_NOW');

            $startInsert = microtime(true);
            Factory::INSERT()->execute($this->getConnection(), $dataSet);
            $endInsert = microtime(true);
            $timeUsedInserting = $endInsert - $startInsert;

            $startDump = microtime(true);
            $mysqldumpExecutable = $config['mysqldump_executable'];
            if (empty($mysqldumpExecutable)) ***REMOVED***
                throw new Exception('Mysqldump Executable must be defined in the db_test.mysqldump_executable in the configuration (env.php)');
        ***REMOVED***
            if (file_exists($dump)) ***REMOVED***
                rename($dump, $dumpPath . date('Y-m-d_h-i-s') . '_backup.sql');
        ***REMOVED***
            $command = "***REMOVED***$mysqldumpExecutable***REMOVED*** -u ***REMOVED***$user***REMOVED*** -p***REMOVED***$password***REMOVED*** ***REMOVED***$tableSchema***REMOVED*** > ***REMOVED***$dump***REMOVED***";
            if (empty($password)) ***REMOVED***
                $command = "***REMOVED***$mysqldumpExecutable***REMOVED*** -u ***REMOVED***$user***REMOVED*** ***REMOVED***$tableSchema***REMOVED*** > ***REMOVED***$dump***REMOVED***";
        ***REMOVED***
            exec($command);
            $endDump = microtime(true);
            $timeUsedDumping = $endDump - $startDump;
    ***REMOVED***
        $mysqlExecutable = $config['mysql_executable'];
        if (empty($mysqlExecutable)) ***REMOVED***
            throw new Exception('Mysql Executable must be defined in the db_test.mysql_executable in the configuration (env.php)');
    ***REMOVED***
        $startImport = microtime(true);
        $migrateCommand = "***REMOVED***$mysqlExecutable***REMOVED*** -u ***REMOVED***$user***REMOVED*** -p***REMOVED***$password***REMOVED*** ***REMOVED***$tableSchema***REMOVED***< ***REMOVED***$dump***REMOVED***";
        if (empty($password)) ***REMOVED***
            $migrateCommand = "***REMOVED***$mysqlExecutable***REMOVED*** -u ***REMOVED***$user***REMOVED*** ***REMOVED***$tableSchema***REMOVED***< ***REMOVED***$dump***REMOVED***";
    ***REMOVED***
        exec($migrateCommand);
        $endImport = microtime(true);
        $timeUsedImporting = $endImport - $startImport;
***REMOVED***

    /**
     * Get Connection.
     *
     * @return DefaultConnection
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function getConnection(): DefaultConnection
    ***REMOVED***
        if ($this->conn === null) ***REMOVED***
            $this->conn = new DefaultConnection($this->getPdo());
    ***REMOVED***

        return $this->conn;
***REMOVED***

    /**
     * Generate Update row.
     *
     * @param array $row
     * @return array
     */
    public function generateUpdateRow(array $row): array
    ***REMOVED***
        foreach ($row as $key => $value) ***REMOVED***
            if (preg_match('/\w*(id)\w*/', $key)) ***REMOVED***
                continue;
        ***REMOVED***
            $converted = preg_replace('/[ÄÖÜäöüÉÈÀéèà]/', "", $row[$key]);
            $parts = str_split(html_entity_decode($converted));
            sort($parts);
            $row[$key] = implode($parts);
    ***REMOVED***

        return $row;
***REMOVED***

    /**
     * Hook to get all data
     *
     * @param array $data
     */
    abstract protected function getDataHook(array $data): void;

    /**
     * Get array data set and create test data base object.
     *
     * @return IDataSet
     */
    protected function getDataSet(): IDataSet
    ***REMOVED***
        $testDatabase = new TestDatabase();
        $startGenerate = microtime(true);
        $json = '';
        if (file_exists(__DIR__ . '/dataset.json')) ***REMOVED***
            $json = file_get_contents(__DIR__ . '/dataset.json');
    ***REMOVED***

        if (empty($json)) ***REMOVED***
            $data = $testDatabase->all();
            $this->fillHashes($data);
            $this->getDataHook($data);
            $json = json_encode($data);
            file_put_contents(__DIR__ . '/dataset.json', $json);
    ***REMOVED*** else ***REMOVED***
            $dataJson = json_decode($json, true);
            $this->fillHashes($dataJson);
            $this->getDataHook($dataJson);
            $endGenerate = microtime(true);
            $timeUsedGenerating = $endGenerate - $startGenerate;
            return new ArrayDataSet($dataJson);
    ***REMOVED***
        $endGenerate = microtime(true);
        $timeUsedGenerating = $endGenerate - $startGenerate;
        return new ArrayDataSet($data);
***REMOVED***

    /**
     * Get PDO object.
     *
     * @return PDO
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function getPdo(): PDO
    ***REMOVED***
        if (!self::$pdo) ***REMOVED***
            /**
             * @var $connection Connection
             */
            $connection = $this->app->getContainer()->get(Connection::class);
            $pdo = $connection->getDriver()->getConnection();
            self::$pdo = $pdo;
    ***REMOVED***

        return self::$pdo;
***REMOVED***

    /**
     * Truncate all Tables.
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function truncateTables()
    ***REMOVED***
        $pdo = $this->getPdo();
        $stmt = $pdo->query('SHOW TABLES');
        while ($row = $stmt->fetch()) ***REMOVED***
            $table = array_values($row)[0];
            if ($table !== 'phinxlog') ***REMOVED***
                $pdo->prepare(sprintf('TRUNCATE TABLE `%s`', $table))->execute();
        ***REMOVED***
    ***REMOVED***
***REMOVED***

    /**
     * Assert that response has keys.
     *
     * @param Response $response
     * @param array $keys
     */
    protected function assertResponseHasKeys(array $keys, Response $response)
    ***REMOVED***
        $json = $response->getBody()->__toString();
        $this->assertJson($json);
        $data = json_decode($json, true);
        foreach ($keys as $key) ***REMOVED***
            $requiredKeys = $subKeys = explode('.', $key);
            array_pop($subKeys);
            $array = $data;

            foreach ($subKeys as $subKey) ***REMOVED***
                $array = $array[$subKey];
        ***REMOVED***
            $element = end($requiredKeys);
            $this->assertArrayHasKey($element, $array, "Assertion for ***REMOVED***$key***REMOVED*** failed");
    ***REMOVED***
***REMOVED***

    /**
     * Assert that response has a message
     *
     * @param $expected
     * @param Response $response
     */
    protected function assertResponseHasMessage($expected, Response $response)
    ***REMOVED***
        $json = $response->getBody()->__toString();
        $data = json_decode($json, true);
        $this->assertArrayHasKey('message', $data, 'Response didn\'t have a message key');
        $this->assertSame($expected, $data['message'], 'Response didn\'t have the correct message');
***REMOVED***

    /**
     * Make default assertions for POST/PUT Requests
     *
     * @param Response $response
     * @param int $expectedStatusCode
     * @param array $expectedResponseData
     * @param $expectedDatabaseState
     * @param $notExpectedDatabaseState
     */
    protected function assertDefaultValues(Response $response, int $expectedStatusCode, array $expectedResponseData, $expectedDatabaseState, $notExpectedDatabaseState)
    ***REMOVED***
        $this->assertSame($expectedStatusCode, $response->getStatusCode());
        $this->assertResponseHasMessage($expectedResponseData['message'], $response);
        $json = $response->getBody()->__toString();
        $this->assertJson($json);
        $responseData = json_decode($json, true);
        $expectedResponseData = $this->arrayReplaceHashes($expectedResponseData);

        if (array_key_exists('info', $expectedResponseData)
            && is_array($expectedResponseData['info'])
            && array_key_exists('errors', (array)$expectedResponseData['info'])) ***REMOVED***
            usort($expectedResponseData['info']['errors'], function ($a, $b) ***REMOVED***
                return $a['field'] <=> $b['field'];
        ***REMOVED***);
            usort($responseData['info']['errors'], function ($a, $b) ***REMOVED***
                return $a['field'] <=> $b['field'];
        ***REMOVED***);
    ***REMOVED***

        $this->assertEquals($expectedResponseData, $responseData);

        if ($expectedDatabaseState) ***REMOVED***
            $this->assertDataInDatabase($expectedDatabaseState);
    ***REMOVED***

        if ($notExpectedDatabaseState) ***REMOVED***
            $this->assertDataNotInDatabase($notExpectedDatabaseState);
    ***REMOVED***
***REMOVED***

    /***
     * Assert that data is in database.
     *
     * @param array $data
     */
    protected function assertDataInDatabase($data = ['table' => ['attribute' => 'value']])
    ***REMOVED***
        $pdo = $this->getPdo();
        foreach ($data as $table => $values) ***REMOVED***
            $query = "SELECT 1 FROM ***REMOVED***$table***REMOVED*** WHERE ";
            foreach ($values as $attribute => $value) ***REMOVED***
                if (is_null($value) || $value === '') ***REMOVED***
                    $query .= "***REMOVED***$attribute***REMOVED*** IS NULL \nAND ";
                    continue;
            ***REMOVED***
                $query .= "***REMOVED***$attribute***REMOVED*** = '***REMOVED***$value***REMOVED***' AND ";
        ***REMOVED***
            $query = substr($query, 0, -4);
            $stmt = $pdo->query($query);
            $row = $stmt->fetch();
            $this->assertNotEmpty($row, 'Assertion, that values would be in database was wrong');
    ***REMOVED***
***REMOVED***

    /**
     * Assert that data is not in database.
     *
     * @param array $data
     */
    protected function assertDataNotInDatabase($data = ['table' => ['attribute' => 'value']])
    ***REMOVED***
        $pdo = $this->getPdo();
        foreach ($data as $table => $values) ***REMOVED***
            $query = "SELECT 1 FROM ***REMOVED***$table***REMOVED*** WHERE ";
            foreach ($values as $attribute => $value) ***REMOVED***
                $query .= "***REMOVED***$attribute***REMOVED*** = '***REMOVED***$value***REMOVED***' && ";
        ***REMOVED***
            $query = substr($query, 0, -4);
            $stmt = $pdo->query($query);
            $row = $stmt->fetch();
            $this->assertEmpty($row, 'Assertion, that values would not be in database was wrong');
    ***REMOVED***
***REMOVED***

    /**
     * Replace all required placeholders in array
     *
     * @param $array
     * @return null|string|string[]
     */
    protected function arrayReplaceHashes($array)
    ***REMOVED***
        $array = preg_replace_array('/***REMOVED***article_hash***REMOVED***/', $this->articleHash, $array);
        $array = preg_replace_array('/***REMOVED***department_hash***REMOVED***/', $this->departmentHash, $array);
        $array = preg_replace_array('/***REMOVED***department_group_hash***REMOVED***/', $this->departmentGroupHash, $array);
        $array = preg_replace_array('/***REMOVED***department_region_hash***REMOVED***/', $this->departmentRegionHash, $array);
        $array = preg_replace_array('/***REMOVED***department_type_hash***REMOVED***/', $this->departmentTypeHash, $array);
        $array = preg_replace_array('/***REMOVED***educational_course_hash***REMOVED***/', $this->educationalCourseHash, $array);
        $array = preg_replace_array('/***REMOVED***educational_course_organiser_hash***REMOVED***/', $this->educationalCourseOrganiserHash, $array);
        $array = preg_replace_array('/***REMOVED***educational_course_participant_hash***REMOVED***/', $this->educationalCourseParticipantHash, $array);
        $array = preg_replace_array('/***REMOVED***event_hash***REMOVED***/', $this->eventHash, $array);
        $array = preg_replace_array('/***REMOVED***event_participant_hash***REMOVED***/', $this->eventParticipantHash, $array);
        $array = preg_replace_array('/***REMOVED***event_participation_hash***REMOVED***/', $this->eventParticipationStatusHash, $array);
        $array = preg_replace_array('/***REMOVED***gender_hash***REMOVED***/', $this->genderHash, $array);
        $array = preg_replace_array('/***REMOVED***image_hash***REMOVED***/', $this->imageHash, $array);
        $array = preg_replace_array('/***REMOVED***language_hash***REMOVED***/', $this->languageHash, $array);
        $array = preg_replace_array('/***REMOVED***permission_hash***REMOVED***/', $this->permissionHash, $array);
        $array = preg_replace_array('/***REMOVED***position_hash***REMOVED***/', $this->positionHash, $array);
        $array = preg_replace_array('/***REMOVED***sl_chest_hash***REMOVED***/', $this->slChestHash, $array);
        $array = preg_replace_array('/***REMOVED***sl_corridor_hash***REMOVED***/', $this->slCorridorHash, $array);
        $array = preg_replace_array('/***REMOVED***sl_location_hash***REMOVED***/', $this->slLocationHash, $array);
        $array = preg_replace_array('/***REMOVED***sl_room_hash***REMOVED***/', $this->slRoomHash, $array);
        $array = preg_replace_array('/***REMOVED***sl_shelf_hash***REMOVED***/', $this->slShelfHash, $array);
        $array = preg_replace_array('/***REMOVED***sl_tray_hash***REMOVED***/', $this->slTrayHash, $array);
        $array = preg_replace_array('/***REMOVED***storage_place_hash***REMOVED***/', $this->storagePlaceHash, $array);
        $array = preg_replace_array('/***REMOVED***user_hash***REMOVED***/', $this->userHash, $array);
        if (array_key_exists('code', $array)) ***REMOVED***
            $array['code'] = (int)$array['code'];
    ***REMOVED***
        if (array_key_exists('verified', $array)) ***REMOVED***
            $array['verified'] = (bool)$array['verified'];
    ***REMOVED***
        if (array_key_exists('info', $array)) ***REMOVED***
            if (array_key_exists('verified', $array['info'])) ***REMOVED***
                $array['info']['verified'] = (bool)$array['info']['verified'];
        ***REMOVED***
            if (array_key_exists('signup_completed', $array['info'])) ***REMOVED***
                $array['info']['signup_completed'] = (bool)$array['info']['signup_completed'];
        ***REMOVED***
    ***REMOVED***
        return $array;
***REMOVED***

    /**
     * Fill in all required hashes.
     *
     * @param $mockDatabaseArray
     */
    private function fillHashes($mockDatabaseArray)
    ***REMOVED***
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
***REMOVED***

    /**
     * Check if there is any pending migration.
     *
     * @param PDO $pdo
     * @return bool
     * @throws \Interop\Container\Exception\ContainerException
     */
    private function hasPendingMigrations(PDO $pdo): bool
    ***REMOVED***
        $shouldMigrate = true;
        // Check if there is any pending migration
        $stmt = $pdo->prepare("SELECT version FROM phinxlog ORDER BY version ASC");
        $stmt->execute();
        $executedMigrations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($executedMigrations !== false) ***REMOVED***
            foreach ($executedMigrations as $key => $record) ***REMOVED***
                $executedMigrations[$key] = $record['version'];
        ***REMOVED***

            $migrationsPath = $this->container->get('settings')->get('migrations');
            $migrationFiles = glob($migrationsPath . '/*.php');
            foreach ($migrationFiles as $key => $file) ***REMOVED***
                $filename = basename($file, '.php');
                if ($filename === 'schema') ***REMOVED***
                    unset($migrationFiles[$key]);
                    continue;
            ***REMOVED***
                $migrationFiles[$key] = preg_replace('/[^\d\W]+/', '', $filename);;
        ***REMOVED***
            $missingMigrations = array_diff($migrationFiles, $executedMigrations);
            $shouldMigrate = !empty($missingMigrations);
    ***REMOVED***

        return $shouldMigrate;
***REMOVED***
***REMOVED***

