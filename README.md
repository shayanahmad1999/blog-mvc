# Mini Blog - PHP MVC Application

A modern, full-featured blog application built with PHP using the MVC (Model-View-Controller) architectural pattern. Features a beautiful Bootstrap UI, user authentication, CRUD operations, and guest commenting.

## 🚀 Features

### Core Functionality
- **User Authentication**: Registration, login, logout
- **Blog Posts**: Create, read, update, delete posts
- **Comments System**: Add comments to posts (guests allowed)
- **Responsive Design**: Mobile-friendly Bootstrap interface
- **Clean URLs**: SEO-friendly routing with .htaccess

### Advanced Features
- **Guest Commenting**: Non-registered users can comment
- **User Permissions**: Owners can edit/delete their content
- **Success/Error Messages**: Comprehensive feedback system
- **Database Migrations**: Version-controlled schema management
- **Modern UI**: Gradient designs, icons, animations

## 📋 Requirements

- **PHP**: 7.4 or higher
- **MySQL**: 5.7 or higher (or MariaDB 10.0+)
- **Web Server**: Apache/Nginx with mod_rewrite
- **Composer**: For dependency management (optional)

## 🛠️ Installation

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/mini-blog.git
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
├── config.php                 # Database configuration
├── index.php                  # Application entry point
├── migrate.php               # Database migration runner
├── database.sql              # Legacy database setup
├── .htaccess                 # URL rewriting rules
├── README.md                 # This file
├── helpers/                  # Helper classes
│   ├── MessageHelper.php     # Success/error message handling
│   └── README.md            # Helper documentation
├── migrations/               # Database migrations
│   ├── 001_create_users_table.php
│   ├── 002_create_posts_table.php
│   ├── 003_create_comments_table.php
│   ├── 004_insert_sample_data.php
│   └── README.md
├── core/                     # Core MVC classes
│   ├── Controller.php        # Base controller
│   ├── Database.php          # Database connection
│   └── Model.php             # Base model
├── models/                   # Data models
│   ├── User.php              # User model
│   ├── Post.php              # Post model
│   └── Comment.php           # Comment model
├── controllers/              # Business logic
│   ├── UserController.php    # Authentication
│   ├── PostController.php    # Blog posts
│   └── CommentController.php # Comments
├── views/                    # Presentation layer
│   ├── layout.php            # Main template
│   ├── login.php             # Login form
│   ├── register.php          # Registration form
│   ├── posts.php             # Posts listing
│   ├── comments.php          # Post with comments
│   ├── edit_post.php         # Edit post form
│   ├── edit_comment.php      # Edit comment form
│   └── comments_list.php     # All comments view
└── assets/                   # Static files (if any)
```

## 🏗️ Architecture

### MVC Pattern
- **Models**: Handle data operations and business logic
- **Views**: Present data to users (HTML templates)
- **Controllers**: Process requests and coordinate M/V

### Key Components

#### Database Layer
- **Singleton Pattern**: Database connection management
- **PDO**: Secure database operations
- **Prepared Statements**: SQL injection prevention

#### Routing System
- **Clean URLs**: `/posts`, `/post/1`, `/login`
- **.htaccess**: Apache URL rewriting
- **Central Router**: `index.php` handles all requests

#### Authentication
- **Session Management**: PHP sessions for user state
- **Password Hashing**: bcrypt for secure passwords
- **Role-based Access**: User permission levels

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

## 🔧 Usage

### User Registration
1. Click "Register" in the navigation
2. Fill in name, email, and password
3. Submit to create account

### Creating Posts
1. Login to access post creation
2. Click "Create New Post" on posts page
3. Fill in title and content
4. Submit to publish

### Adding Comments
1. Visit any post page
2. Scroll to comments section
3. Fill in comment (name required for guests)
4. Submit to post comment

### Managing Content
- **Edit**: Click edit button on your posts/comments
- **Delete**: Click delete button with confirmation
- **View**: Browse all posts and comments

## 🔒 Security Features

- **CSRF Protection**: Hidden tokens in forms
- **XSS Prevention**: Input sanitization
- **SQL Injection**: Prepared statements
- **Password Security**: bcrypt hashing
- **Session Security**: Secure session handling

## 🧪 Testing

### Sample Accounts
- **Admin**: admin@example.com / password
- **User**: john@example.com / password

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

### Environment Variables
Consider using environment variables for sensitive data:
```php
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_PASS', getenv('DB_PASSWORD') ?: '');
```

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

## 🎯 Roadmap

- [ ] User profiles and avatars
- [ ] Rich text editor for posts
- [ ] Categories and tags
- [ ] Social media sharing
- [ ] Admin dashboard
- [ ] API endpoints
- [ ] Email notifications

---

**Built with ❤️ using PHP, Bootstrap, and modern web technologies.**