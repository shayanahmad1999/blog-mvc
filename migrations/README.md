# Database Migrations

This directory contains database migration files for the Mini Blog application.

## Migration Files

### 001_create_users_table.php
- Creates the `users` table
- Fields: id, name, email, password, role, created_at

### 002_create_posts_table.php
- Creates the `posts` table
- Fields: id, user_id, title, content, created_at
- Foreign key to users table

### 003_create_comments_table.php
- Creates the `comments` table
- Fields: id, post_id, user_id, comment, created_at
- Foreign keys to posts and users tables

### 004_insert_sample_data.php
- Inserts sample data for testing
- Creates admin and regular users
- Adds sample posts and comments

## Running Migrations

To run all migrations, execute the migration runner:

```bash
php migrate.php
```

This will:
1. Connect to the database using config.php settings
2. Execute migrations in numerical order
3. Create all tables and insert sample data
4. Display success/failure messages

## Migration Structure

Each migration file returns an array with:
- `up`: SQL to apply the migration
- `down`: SQL to rollback the migration

## Manual Execution

You can also run the SQL directly in your MySQL client:

```sql
-- Copy and paste the SQL from each migration file
-- Execute in order: 001, 002, 003, 004
```

## Database Requirements

- MySQL 5.7+ or MariaDB 10.0+
- Database specified in `config.php`
- User with CREATE, INSERT, ALTER permissions

## Troubleshooting

- Ensure database exists before running migrations
- Check config.php for correct database credentials
- Verify MySQL server is running
- Check file permissions if migration runner fails