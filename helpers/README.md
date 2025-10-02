# Helpers

This directory contains reusable helper classes for the Mini Blog application.

## MessageHelper

A utility class for managing success and error messages across the application.

### Usage

```php
require_once 'helpers/MessageHelper.php';

// Set success message
MessageHelper::setSuccess("Operation completed successfully!");

// Set error message
MessageHelper::setError("Something went wrong. Please try again.");

// Display messages in views (automatically clears them)
echo MessageHelper::displayMessages();

// Check if messages exist
if (MessageHelper::hasMessages()) {
    // Handle messages
}

// Clear all messages manually
MessageHelper::clearMessages();
```

### Methods

#### `setSuccess(string $message)`
Stores a success message in the session.

#### `setError(string $message)`
Stores an error message in the session.

#### `displayMessages()`
Returns HTML for displaying and clearing messages. Automatically unsets messages after display.

#### `hasMessages()`
Returns true if there are any messages in the session.

#### `clearMessages()`
Manually clears all messages from the session.

### Integration

The MessageHelper is automatically integrated into the main layout (`views/layout.php`) and displays messages at the top of every page.

### Example in Controllers

```php
try {
    // Some operation
    MessageHelper::setSuccess("Post created successfully!");
} catch (Exception $e) {
    MessageHelper::setError("Failed to create post.");
}
```

### Styling

Messages are displayed using Bootstrap alert components with:
- Success: Green alert with check-circle icon
- Error: Red alert with exclamation-triangle icon
- Dismissible: Close button to hide alerts