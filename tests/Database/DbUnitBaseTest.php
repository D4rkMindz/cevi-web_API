<?php

namespace App\Test\Database;


use App\Test\BaseTest;
use Cake\Database\Connection;
use Exception;
use PDO;
use Phinx\Console\PhinxApplication;
use Phinx\Wrapper\TextWrapper;
use PHPUnit\DbUnit\Database\DefaultConnection;
use PHPUnit\DbUnit\Operation\Factory;
use PHPUnit\DbUnit\TestCaseTrait;
use Slim\Container;

abstract class DbUnitBaseTest extends BaseTest
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
     * Setup before Class.
     *
     * This code will be executed before every class. This makes sure, that the test-database is always in the same
     * "test-state".
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function setUpBeforeClass()
    ***REMOVED***
        static::getPdo();
***REMOVED***

    /**
     * Get PDO object.
     *
     * @return PDO
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected static function getPdo(): PDO
    ***REMOVED***
        if (!self::$pdo) ***REMOVED***
            self::$pdo = container()->get(Connection::class)->getDriver()->connection();
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
        $this->container = app()->getContainer();

        static $setup = false;
        if (!$setup) ***REMOVED***
            $this->setupDatabase();
            $setup = true;
    ***REMOVED***
        $this->truncateTables();
        Factory::INSERT()->execute($this->getConnection(), $this->getDataSet());
***REMOVED***

    /**
     * Setup Database.
     *
     * @throws Exception
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function setupDatabase()
    ***REMOVED***
        $pdo = static::getPdo();
        $stmt = $pdo->query('SHOW TABLES');
        $phinxlog = false;
        while ($row = $stmt->fetch()) ***REMOVED***
            $table = array_values($row)[0];
            $pdo->prepare(sprintf('DROP TABLE `%s`', $table))->execute();
    ***REMOVED***
        if (!$phinxlog) ***REMOVED***
            $sql = "CREATE TABLE `phinxlog` (`version` bigint(20) NOT NULL,`migration_name` varchar(100) DEFAULT NULL,`start_time` timestamp NULL DEFAULT NULL,`end_time` timestamp NULL DEFAULT NULL,`breakpoint` tinyint(1) NOT NULL DEFAULT '0',PRIMARY KEY (`version`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
            $pdo->prepare($sql)->execute();
    ***REMOVED***
        chdir(__DIR__ . '/../../config');
        $wrap = new TextWrapper(new PhinxApplication());
        // Execute the command and determine if it was successful.
        $env = 'test';
        $target = null;
        call_user_func([$wrap, 'getMigrate'], $env, $target);
        $error = $wrap->getExitCode() > 0;
        if ($error) ***REMOVED***
            throw new Exception('Error: Setup database failed with exit code: %s', $wrap->getExitCode());
    ***REMOVED***
***REMOVED***

    /**
     * Truncate all Tables.
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    protected function truncateTables()
    ***REMOVED***
        $pdo = static::getPdo();
        $stmt = $pdo->query('SHOW TABLES');
        while ($row = $stmt->fetch()) ***REMOVED***
            $table = array_values($row)[0];
            $pdo->prepare(sprintf('TRUNCATE TABLE `%s`', $table))->execute();
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
            $this->conn = $this->createDefaultDBConnection(static::getPdo());
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

