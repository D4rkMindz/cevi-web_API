<?php

namespace App\Test;

use Cake\Database\Connection;
use Exception;
use PDO;
use Phinx\Console\PhinxApplication;
use Phinx\Wrapper\TextWrapper;
use PHPUnit\DbUnit\Database\DefaultConnection;
use PHPUnit\DbUnit\Operation\Factory;
use PHPUnit\DbUnit\TestCaseTrait;
use Slim\Container;

/**
 * Class DbTestCase
 */
abstract class DbTestCase extends ApiTestCase
***REMOVED***
    use TestCaseTrait;

    /**
     * @var PDO
     */
    private static $pdo = null;

    // only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
    private $conn = null;

    /**
     * @var Container
     */
    private $container;

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
            $pdo = $this->app->getContainer()->get(Connection::class)->getDriver()->connection();
            self::$pdo = $pdo;
    ***REMOVED***

        return self::$pdo;
***REMOVED***

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

        // Check if phinxlog table exists in database.
        $tableSchema = $this->container->get('settings')->get('db')['database'];
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
        Factory::INSERT()->execute($this->getConnection(), $this->getDataSet());
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
     * Get Connection.
     *
     * @return DefaultConnection
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function getConnection(): DefaultConnection
    ***REMOVED***
        if ($this->conn === null) ***REMOVED***
            $this->conn = $this->createDefaultDBConnection($this->getPdo());
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
***REMOVED***

