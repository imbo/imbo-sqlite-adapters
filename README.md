# SQLite database adapters for Imbo

[![CI](https://github.com/imbo/imbo-sqlite-adapters/workflows/CI/badge.svg)](https://github.com/imbo/imbo-sqlite-adapters/actions?query=workflow%3ACI)

[SQLite](https://www.sqlite.org/) database adapters for [Imbo](https://imbo.io).

## Installation

    composer require imbo/imbo-sqlite-adapters

## Usage

This package provides SQLite adapters for Imbo using [PDO](https://www.php.net/pdo).

```php
$database = new Imbo\Database\SQLite($dsn, $options);
```

## Running integration tests

If you want to run the integration tests you will to create a local SQLite3 database:

    sqlite3 /tmp/imbo-sqlite-integration-test.sq3 < setup/000-imbo.sql

When the database exists with the initial tables created you can execute all tests by simply running PHPUnit:

```
composer run test # or ./vendor/bin/phpunit
```

## License

MIT, see [LICENSE](LICENSE).
