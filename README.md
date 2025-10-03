# Mini Blog - Advanced PHP MVC Application

A cutting-edge, production-ready blog application built with PHP using advanced MVC architecture, modular routing, and modern web technologies. Features a stunning Bootstrap UI, comprehensive CRUD operations, advanced routing system, and enterprise-level code organization.

## 🚀 Features

### Core Functionality

- **Advanced User Authentication**: Secure registration, login, logout with session management
- **Complete Blog CRUD**: Create, read, update, delete posts with full ownership controls
- **Advanced Comments System**: Add, edit, delete comments with guest support and ownership validation
- **Responsive Design**: Mobile-first Bootstrap 5 interface with custom styling
- **Modular Routing**: Advanced router with parameter extraction and clean URLs

### Advanced Features

- **Guest Commenting**: Non-registered users can comment with temporary accounts
- **Role-Based Permissions**: Users can edit/delete their own content
- **Comprehensive Feedback**: Success/error message system with session flash messages
- **Database Migrations**: Version-controlled schema management with rollback support
- **Modern UI/UX**: Gradient designs, smooth animations, glass morphism effects
- **Standalone Error Pages**: Dedicated 404 page independent of layout system
- **Security Features**: CSRF protection, XSS prevention, SQL injection protection

## 📋 Requirements

- **PHP**: 7.4 or higher
- **MySQL**: 5.7 or higher (or MariaDB 10.0+)
- **Web Server**: Apache/Nginx with mod_rewrite
- **Composer**: For dependency management (optional)

## 🛠️ Installation

### 1. Clone the Repository

```bash
git clone https://github.com/shayanahmad1999/blog-mvc.git
cd mini-blog
```

### 2. Database Setup

Create a MySQL database named `oop_practice` and run the migrations:

```bash
php migrate.php
```

This will create all necessary tables and insert sample data.

### 3. Configuration

Update `config.php` with your database credentials:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'oop_practice');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
```

### 4. Web Server Configuration

Ensure your web server is configured to:

- Point document root to the project directory
- Allow `.htaccess` file overrides (for Apache)
- Enable URL rewriting

### 5. Access the Application

Open your browser and navigate to:

```
http://localhost/mini-blog/
```

## 📁 Project Structure

```
mini-blog/
├── config.php                 # Database configuration constants
├── index.php                  # Application entry point with routing
├── routes.php                 # Main route configuration file
├── migrate.php               # Database migration runner
├── database.sql              # Legacy database setup
├── .htaccess                 # URL rewriting rules
├── README.md                 # This comprehensive documentation
├── helpers/                  # Utility classes
│   ├── MessageHelper.php     # Success/error message handling
│   └── README.md            # Helper documentation
├── routes/                   # Modular routing system
│   ├── auth.php              # Authentication routes
│   ├── posts.php             # Blog post CRUD routes
│   ├── comments.php          # Comment management routes
│   └── README.md             # Routing documentation
├── migrations/               # Database migrations
│   ├── 001_create_users_table.php
│   ├── 002_create_posts_table.php
│   ├── 003_create_comments_table.php
│   ├── 004_insert_sample_data.php
│   └── README.md
├── core/                     # Advanced MVC framework core
│   ├── Controller.php        # Base controller with view rendering
│   ├── Database.php          # Singleton database connection
│   ├── Model.php             # Base model with DB access
│   ├── Router.php            # Advanced routing engine
│   └── RouteServiceProvider.php # Route loading and management
├── models/                   # Data access layer
│   ├── User.php              # User authentication & management
│   ├── Post.php              # Blog post CRUD operations
│   └── Comment.php           # Comment management
├── controllers/              # Business logic layer
│   ├── UserController.php    # Authentication & user management
│   ├── PostController.php    # Blog post operations
│   └── CommentController.php # Comment operations
├── views/                    # Presentation layer
│   ├── layout.php            # Main Bootstrap template
│   ├── 404_standalone.php    # Standalone error page
│   ├── login.php             # Authentication forms
│   ├── register.php          # User registration
│   ├── posts.php             # Posts listing with cards
│   ├── comments.php          # Post detail with comments
│   ├── edit_post.php         # Post editing interface
│   ├── edit_comment.php      # Comment editing interface
│   └── comments_list.php     # All comments overview
└── assets/                   # Static files (CSS, JS, images)
```

## 🏗️ Advanced Architecture

### MVC Pattern with Modern Enhancements

- **Models**: Handle data operations with advanced query building
- **Views**: Bootstrap-powered responsive templates with modern UI
- **Controllers**: Process requests with dependency injection ready

### Key Components

#### Advanced Routing System

- **Modular Routes**: Organized by feature (auth, posts, comments)
- **Parameter Extraction**: Automatic `{id}` parameter handling
- **HTTP Methods**: GET, POST, PUT, DELETE support
- **Route Groups**: Feature-based route organization
- **Middleware Ready**: Extensible for future middleware

#### Database Layer

- **Singleton Pattern**: Efficient connection management
- **PDO with Namespaces**: Secure, object-oriented database operations
- **Prepared Statements**: Complete SQL injection prevention
- **Transaction Support**: Data integrity with rollbacks

#### Authentication & Security

- **Session Management**: Secure PHP session handling
- **bcrypt Password Hashing**: Industry-standard password security
- **CSRF Protection**: Form token validation
- **XSS Prevention**: Input sanitization and output escaping
- **Role-based Access**: User permission validation

#### Error Handling

- **Standalone 404 Pages**: Independent error handling
- **Flash Messages**: Session-based user feedback
- **Exception Handling**: Graceful error recovery
- **Logging Ready**: Extensible error logging system

## 🎨 UI/UX Features

### Design System

- **Bootstrap 5**: Responsive framework
- **Font Awesome**: Icon library
- **Custom Gradients**: Modern color schemes
- **Card-based Layout**: Clean content organization

### User Experience

- **Intuitive Navigation**: Clear menu structure
- **Form Validation**: Client-side validation
- **Loading States**: Visual feedback
- **Error Handling**: User-friendly error messages

## 🔧 Usage Guide

### Application URLs

- **Home**: `/` (redirects to login)
- **Login**: `/login`
- **Register**: `/register`
- **Posts List**: `/posts`
- **Individual Post**: `/post/{id}` (e.g., `/post/1`)
- **All Comments**: `/comments`
- **Edit Post**: `/edit-post/{id}`
- **Edit Comment**: `/edit-comment/{id}`

### User Registration

1. Navigate to `/register` or click "Register" in navigation
2. Fill in name, email, and password fields
3. Submit form to create account
4. Automatic redirect to login page

### Creating Posts

1. Login to access authenticated features
2. Navigate to `/posts` to see all posts
3. Click "Create New Post" button
4. Fill in title and content (rich text supported)
5. Submit to publish post

### Adding Comments

1. Visit any post page: `/post/{id}`
2. Scroll to comments section at bottom
3. **For registered users**: Just type your comment
4. **For guests**: Provide name + comment (creates temporary account)
5. Submit to post comment

### Managing Content

- **Edit Posts**: Click edit button on your posts → `/edit-post/{id}`
- **Delete Posts**: Click delete button with confirmation dialog
- **Edit Comments**: Click edit button on your comments → `/edit-comment/{id}`
- **Delete Comments**: Click delete button with confirmation
- **View All**: Browse `/posts` for all posts, `/comments` for all comments

### Advanced Features

- **Guest Commenting**: Non-registered users can comment
- **Ownership Validation**: Users can only edit/delete their own content
- **Responsive Design**: Works perfectly on mobile, tablet, desktop
- **Flash Messages**: Success/error feedback for all actions

## 🔒 Advanced Security Features

### Authentication & Authorization

- **bcrypt Password Hashing**: Industry-standard password security
- **Session Management**: Secure PHP session handling with regeneration
- **Role-Based Access Control**: User permission validation
- **Login Attempt Limiting**: Protection against brute force attacks
- **Secure Logout**: Complete session destruction

### Data Protection

- **PDO Prepared Statements**: Complete SQL injection prevention
- **Input Sanitization**: XSS prevention with `htmlspecialchars()`
- **Output Escaping**: Safe HTML rendering
- **Parameter Binding**: Secure database queries

### Application Security

- **CSRF Protection**: Form token validation system
- **Secure Routing**: Parameter validation and sanitization
- **Error Handling**: No sensitive information leakage
- **File Upload Security**: Safe file handling (when implemented)
- **HTTPS Ready**: SSL/TLS support ready

### Code Security

- **Namespace Isolation**: Secure class organization
- **Dependency Injection**: Clean architecture patterns
- **Input Validation**: Server-side validation
- **Secure Defaults**: Conservative security settings

## 🧪 Testing

### Test Scenarios

1. Register a new account
2. Login and create a post
3. Add comments (as user and guest)
4. Edit and delete your content
5. Test responsive design on mobile

## 🚀 Deployment

### Production Setup

1. Upload files to web server
2. Configure database credentials
3. Run migrations: `php migrate.php`
4. Set proper file permissions
5. Configure web server (Apache/Nginx)

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 🆘 Support

If you encounter issues:

1. Check the browser console for JavaScript errors
2. Verify database connection in `config.php`
3. Ensure migrations have been run
4. Check web server error logs

## 🎯 Roadmap & Completed Features

### ✅ Completed Features

- [x] **Modular Routing System**: Advanced router with parameter extraction
- [x] **Standalone 404 Pages**: Independent error handling system
- [x] **Enhanced UI/UX**: Modern Bootstrap design with gradients
- [x] **Complete CRUD Operations**: Full create, read, update, delete for posts and comments
- [x] **Guest Commenting**: Temporary user accounts for non-registered users
- [x] **Advanced Security**: CSRF protection, XSS prevention, SQL injection protection
- [x] **Responsive Design**: Mobile-first approach with Bootstrap 5
- [x] **Flash Message System**: Session-based success/error feedback
- [x] **Database Migrations**: Version-controlled schema management

### 🚧 Future Enhancements

- [ ] **User Profiles**: Avatar uploads, profile customization
- [ ] **Rich Text Editor**: WYSIWYG editor for post content
- [ ] **Categories & Tags**: Content organization system
- [ ] **Social Media Integration**: Share buttons, OAuth login
- [ ] **Admin Dashboard**: User management, analytics
- [ ] **REST API**: JSON API endpoints for mobile apps
- [ ] **Email Notifications**: Comment replies, post updates
- [ ] **Search Functionality**: Full-text search across posts
- [ ] **Pagination**: Efficient handling of large datasets
- [ ] **Caching System**: Performance optimization with Redis/Memcached
- [ ] **File Uploads**: Image attachments for posts
- [ ] **Multi-language Support**: Internationalization (i18n)
- [ ] **Dark Mode**: Theme switching capability

## 🛠️ Technology Stack

### Backend

- **PHP 7.4+**: Server-side scripting with OOP
- **PDO**: Database abstraction layer
- **MySQL/MariaDB**: Relational database
- **Composer**: Dependency management (optional)

### Frontend

- **Bootstrap 5.3**: Responsive CSS framework
- **Font Awesome 6**: Icon library
- **HTML5**: Semantic markup
- **CSS3**: Custom styling and animations

### Architecture

- **MVC Pattern**: Model-View-Controller architecture
- **Custom Router**: Advanced routing with parameter extraction
- **Namespace System**: PHP namespaces for organization
- **Singleton Pattern**: Database connection management

### Development Tools

- **Git**: Version control
- **PHPStorm/VS Code**: IDE recommendations
- **XAMPP/MAMP**: Local development environment
- **phpMyAdmin**: Database management

## 📊 Performance & Scalability

### Current Performance

- **Fast Routing**: Regex-based route matching
- **Database Optimization**: Indexed queries with JOINs
- **Lazy Loading**: Controllers loaded on demand
- **Minimal Dependencies**: Lightweight codebase

### Scalability Features

- **Modular Design**: Easy feature addition
- **Database Normalization**: Efficient data structure
- **Caching Ready**: Prepared for Redis/Memcached
- **API Ready**: RESTful endpoint structure

## 🤝 Contributing Guidelines

### Code Standards

- Follow PSR-12 coding standards
- Use meaningful variable and function names
- Add PHPDoc comments for methods
- Write self-documenting code

### Development Workflow

1. Create feature branch from `main`
2. Implement changes with proper testing
3. Update documentation as needed
4. Submit pull request with description

### Testing

- Test all CRUD operations
- Verify responsive design
- Check cross-browser compatibility
- Validate security features

---

**🚀 Built with ❤️ using PHP 8 features, Bootstrap 5, advanced MVC architecture, and modern web development practices.**
