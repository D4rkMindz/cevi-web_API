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
    //use TestCaseTrait;

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

        // Regenerate schema by setting DBUNIT_REGENERATE_NOW
        if ($shouldMigrate || getenv('DBUNIT_REGENERATE_NOW') || !file_exists($dump)) ***REMOVED***
            putenv('DBUNIT_REGENERATE_NOW');
            $dataSet = $this->getDataSet();

            echo "Inserting data into test datbase...\t";
            $startInsert = microtime(true);
            Factory::INSERT()->execute($this->getConnection(), $dataSet);
            $endInsert = microtime(true);
            $timeUsedInserting = $startInsert - $endInsert;
            echo "Done ***REMOVED***$timeUsedInserting***REMOVED***s\n";

            echo "Dumping data into dumpfile...\t\t";
            $startDump = microtime(true);
            $mysqldumpExecutable = $config['mysqldump_executable'];
            if (empty($mysqldumpExecutable)) ***REMOVED***
                throw new Exception('Mysqldump Executable must be defined in the db_test.mysqldump_executable in the configuration (env.php)');
        ***REMOVED***
            if (file_exists($dump)) ***REMOVED***
                rename($dump, $dumpPath . date('Y-m-d_h-i-s_backup.sql'));
        ***REMOVED***
            exec("***REMOVED***$mysqldumpExecutable***REMOVED*** -u ***REMOVED***$user***REMOVED*** -p***REMOVED***$password***REMOVED*** ***REMOVED***$tableSchema***REMOVED*** > ***REMOVED***$dump***REMOVED***");
            $endDump = microtime(true);
            $timeUsedDumping = $endDump - $startDump;
            echo "Done ***REMOVED***$timeUsedDumping***REMOVED***s\n";
    ***REMOVED***
        $mysqlExecutable = $config['mysql_executable'];
        if (empty($mysqlExecutable)) ***REMOVED***
            throw new Exception('Mysql Executable must be defined in the db_test.mysql_executable in the configuration (env.php)');
    ***REMOVED***
        echo "Importing mysql dump...\t\t\t";
        $sql = file_get_contents($dump);
        $startImport = microtime(true);
        exec("***REMOVED***$mysqlExecutable***REMOVED*** -u ***REMOVED***$user***REMOVED*** -p***REMOVED***$password***REMOVED*** ***REMOVED***$tableSchema***REMOVED***< ***REMOVED***$sql***REMOVED***");
        $endImport = microtime(true);
        $timeUsedImporting = $endImport - $startImport;
        echo "Done ***REMOVED***$timeUsedImporting***REMOVED***s\n";
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

    protected function getDataSet(): IDataSet
    ***REMOVED***
        echo "Regenerating mock database...\t\t";
        $testDatabase = new TestDatabase();
        $startGenerate = microtime(true);
        $json = file_get_contents(__DIR__ . '/dataset.json');
        if (empty($json)) ***REMOVED***
            $data = $testDatabase->all();
            $json = json_encode($data);
            file_put_contents(__DIR__ . '/dataset.json', $json);
    ***REMOVED*** else ***REMOVED***
            $dataJson = json_decode($json, true);
            return new ArrayDataSet($dataJson);
    ***REMOVED***
        $endGenerate = microtime(true);
        $timeUsedGenerating = $endGenerate - $startGenerate;
        echo "Done ***REMOVED***$timeUsedGenerating***REMOVED***s\n";
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

    protected function assertResponseHasKeys(Response $response, array $keys)
    ***REMOVED***
        $json = $response->getBody()->__toString();
        $this->assertJson($json);
        $data = json_decode($json, true);
        foreach ($keys as $key) ***REMOVED***
            $subKeys = explode('.', $key);
            $array = $data;
            foreach ($subKeys as $subKey) ***REMOVED***
                $this->assertArrayHasKey($subKey, $array);
                $array = $array[$subKey];
        ***REMOVED***
    ***REMOVED***
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

