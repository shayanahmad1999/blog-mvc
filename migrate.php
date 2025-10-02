<?php
// Database Migration Runner
// Run this script to execute all migrations

require_once 'config.php';

class Migrator {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO(
                'mysql:host='.DB_HOST.';dbname='.DB_NAME,
                DB_USER,
                DB_PASS
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function runMigrations() {
        $migrationFiles = glob('migrations/*.php');

        if (empty($migrationFiles)) {
            echo "No migration files found.\n";
            return;
        }

        sort($migrationFiles); // Ensure migrations run in order

        foreach ($migrationFiles as $file) {
            echo "Running migration: " . basename($file) . "\n";

            $migration = include $file;

            if (isset($migration['up'])) {
                try {
                    $this->pdo->exec($migration['up']);
                    echo "✓ Migration completed successfully\n";
                } catch (PDOException $e) {
                    echo "✗ Migration failed: " . $e->getMessage() . "\n";
                }
            } else {
                echo "✗ Invalid migration format\n";
            }

            echo "\n";
        }

        echo "All migrations completed!\n";
    }

    public function rollbackMigration($migrationFile) {
        if (!file_exists($migrationFile)) {
            echo "Migration file not found: $migrationFile\n";
            return;
        }

        echo "Rolling back migration: " . basename($migrationFile) . "\n";

        $migration = include $migrationFile;

        if (isset($migration['down'])) {
            try {
                $this->pdo->exec($migration['down']);
                echo "✓ Rollback completed successfully\n";
            } catch (PDOException $e) {
                echo "✗ Rollback failed: " . $e->getMessage() . "\n";
            }
        } else {
            echo "✗ No rollback defined for this migration\n";
        }
    }
}

// Run migrations
$migrator = new Migrator();
$migrator->runMigrations();

// Optional: Rollback example
// $migrator->rollbackMigration('migrations/004_insert_sample_data.php');