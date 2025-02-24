<?php declare(strict_types=1);
namespace Imbo\Database;

use PDO;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(SQLite::class)]
class SQLiteIntegrationTest extends DatabaseTests
{
    private PDO $pdo;

    protected function insertImage(array $image): void
    {
        $sql = <<<SQL
            INSERT INTO `imageinfo` (
                `user`,
                `imageIdentifier`,
                `size`,
                `extension`,
                `mime`,
                `added`,
                `updated`,
                `width`,
                `height`,
                `checksum`,
                `originalChecksum`
            ) VALUES (
                :user,
                :imageIdentifier,
                :size,
                :extension,
                :mime,
                :added,
                :updated,
                :width,
                :height,
                :checksum,
                :originalChecksum
            )
        SQL;

        $this->pdo
            ->prepare($sql)
            ->execute([
                ':user'             => $image['user'],
                ':imageIdentifier'  => $image['imageIdentifier'],
                ':size'             => $image['size'],
                ':extension'        => $image['extension'],
                ':mime'             => $image['mime'],
                ':added'            => $image['added'],
                ':updated'          => $image['updated'],
                ':width'            => $image['width'],
                ':height'           => $image['height'],
                ':checksum'         => $image['checksum'],
                ':originalChecksum' => $image['originalChecksum'],
            ]);
    }

    protected function getAdapter(): SQLite
    {
        return new SQLite((string) getenv('DB_DSN'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->pdo = new PDO(
            dsn: (string) getenv('DB_DSN'),
            options: [PDO::ATTR_PERSISTENT => true],
        );

        $tables = [
            SQLite::IMAGEINFO_TABLE,
            SQLite::SHORTURL_TABLE,
        ];

        foreach ($tables as $table) {
            $this->pdo->exec("DELETE FROM `{$table}`");
        }
    }
}
