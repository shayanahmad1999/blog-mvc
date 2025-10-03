# Routes System

This directory contains the modular routing system for the Mini Blog application.

## Structure

```
routes/
├── auth.php        # Authentication routes (login, register, logout)
├── posts.php       # Blog post routes (CRUD operations)
├── comments.php    # Comment routes (add, edit, delete)
└── README.md       # This documentation
```

## Route Groups

### Authentication Routes (`auth.php`)
```php
$router->get('/login', 'UserController@showLogin');
$router->post('/login', 'UserController@login');
$router->get('/register', 'UserController@showRegister');
$router->post('/register', 'UserController@register');
$router->get('/logout', 'UserController@logout');
```

### Post Routes (`posts.php`)
```php
$router->get('/posts', 'PostController@list');
$router->post('/posts', 'PostController@create');
$router->get('/post/{id}', 'PostController@show');
$router->get('/edit-post/{id}', 'PostController@edit');
$router->post('/edit-post/{id}', 'PostController@update');
$router->get('/delete-post/{id}', 'PostController@delete');
```

### Comment Routes (`comments.php`)
```php
$router->post('/post/{id}', 'CommentController@add');
$router->get('/edit-comment/{id}', 'CommentController@edit');
$router->post('/edit-comment/{id}', 'CommentController@update');
$router->get('/delete-comment/{id}', 'CommentController@delete');
```

## Route Patterns

- **Static Routes**: `/login`, `/posts`
- **Parameter Routes**: `/post/{id}`, `/edit-post/{id}`
- **HTTP Methods**: GET, POST, PUT, DELETE

## How It Works

1. **RouteServiceProvider** loads all route files
2. Each file defines routes for a specific module
3. Routes are registered with the Router instance
4. Router matches incoming requests to registered routes
5. Matching routes call appropriate controller methods

## Adding New Routes

### For New Features:
1. Create a new route file: `routes/newfeature.php`
2. Define routes using the `$router` variable
3. Add the file to `RouteServiceProvider::loadRoutes()`

### Example:
```php
// routes/admin.php
$router->get('/admin', 'AdminController@dashboard');
$router->get('/admin/users', 'AdminController@users');
```

## Benefits

- **Modularity**: Routes organized by feature
- **Maintainability**: Easy to find and modify routes
- **Scalability**: Simple to add new route groups
- **Readability**: Clear separation of concerns
- **Team Development**: Multiple developers can work on different route files

## Route Statistics

The RouteServiceProvider provides statistics about registered routes:

```php
$stats = $routeProvider->getRouteStats();
// Returns: total_routes, route_groups, route_files
```

## Best Practices

1. **Group Related Routes**: Keep authentication, posts, comments separate
2. **Use Descriptive Names**: Clear route patterns and controller methods
3. **Parameter Validation**: Router handles basic parameter extraction
4. **Consistent Patterns**: Follow RESTful conventions where possible
5. **Documentation**: Keep route files well-commented

## Future Enhancements

- **Middleware Support**: Authentication, validation middleware
- **Route Names**: Named routes for URL generation
- **Route Groups**: Common prefixes and middleware for route groups
- **Route Caching**: Cache compiled routes for performance
- **API Versioning**: Versioned API routes