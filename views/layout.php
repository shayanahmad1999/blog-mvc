<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        html, body {
            height: 100%;
        }
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .main-content {
            flex: 1;
            padding: 2rem 0;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        .btn {
            border-radius: 20px;
            font-weight: 500;
        }
        .badge {
            font-size: 0.75em;
        }
        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
        }
        .post-content {
            line-height: 1.6;
        }
        .alert {
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/posts">
                <i class="fas fa-blog me-2"></i>Mini Blog
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item me-3">
                            <span class="navbar-text">
                                <i class="fas fa-user-circle me-1"></i>Welcome, <?php echo $_SESSION['name']; ?>!
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/posts">
                                <i class="fas fa-list me-1"></i>Posts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/comments">
                                <i class="fas fa-comments me-1"></i>Comments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="/logout">
                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">
                                <i class="fas fa-user-plus me-1"></i>Register
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/posts">
                                <i class="fas fa-list me-1"></i>Posts
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="container mt-5">
            <?php
            require_once 'helpers/MessageHelper.php';
            echo MessageHelper::displayMessages();
            ?>

            <?php include "views/" . $view . ".php"; ?>
        </div>
    </div>

    <footer class="bg-dark text-light py-4 mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><i class="fas fa-blog me-2"></i>Mini Blog</h5>
                    <p>A simple and elegant blogging platform built with PHP and Bootstrap.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="/posts" class="text-light text-decoration-none"><i class="fas fa-list me-1"></i>Posts</a></li>
                        <li><a href="/comments" class="text-light text-decoration-none"><i class="fas fa-comments me-1"></i>Comments</a></li>
                        <?php if (!isset($_SESSION['user_id'])): ?>
                        <li><a href="/login" class="text-light text-decoration-none"><i class="fas fa-sign-in-alt me-1"></i>Login</a></li>
                        <li><a href="/register" class="text-light text-decoration-none"><i class="fas fa-user-plus me-1"></i>Register</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <hr class="my-3">
            <div class="text-center">
                <small>&copy; <?= date('Y'); ?> Mini Blog. Built with <i class="fas fa-heart text-danger"></i> using PHP & Bootstrap</small>
            </div>
        </div>
    </footer>
</body>

</html>