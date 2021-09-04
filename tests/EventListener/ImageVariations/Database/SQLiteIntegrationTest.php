<?php declare(strict_types=1);
namespace Imbo\EventListener\ImageVariations\Database;

use PDO;

/**
 * @coversDefaultClass Imbo\EventListener\ImageVariations\Database\SQLite
 */
class SQLiteIntegrationTest extends DatabaseTests
{
    protected function getAdapter(): SQLite
    {
        return new SQLite((string) getenv('DB_DSN'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $pdo = new PDO((string) getenv('DB_DSN'));
        $pdo->query(sprintf("DELETE FROM `%s`", SQLite::IMAGEVARIATIONS_TABLE));
    }
}
