<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | Mini Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8 col-lg-6">
            <div class="text-center">

                <!-- 404 Number -->
                <h1 class="display-1 fw-bold text-primary mb-3">404</h1>

                <!-- Error Title -->
                <h2 class="h3 mb-4 text-dark">Oops! Page Not Found</h2>

                <!-- Error Description -->
                <p class="lead text-muted mb-4">
                    The page you're looking for doesn't exist or has been moved.
                    Don't worry, let's get you back on track!
                </p>

                <!-- Action Buttons -->
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mb-4">
                    <a href="/posts" class="btn btn-primary btn-lg px-4">
                        <i class="fas fa-newspaper me-2"></i>View All Posts
                    </a>
                    <a href="/login" class="btn btn-outline-secondary btn-lg px-4">
                        <i class="fas fa-sign-in-alt me-2"></i>Go to Login
                    </a>
                </div>

                <!-- Help Card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="card-title text-muted mb-2">
                            <i class="fas fa-lightbulb text-warning me-1"></i>Need Help?
                        </h6>
                        <p class="card-text small text-muted mb-0">
                            Try checking the URL for typos, or use the navigation menu above.
                            If you believe this is an error, please contact support.
                        </p>
                    </div>
                </div>

                <!-- Fun Message -->
                <div class="mt-4">
                    <small class="text-muted">
                        <i class="fas fa-rocket text-primary me-1"></i>
                        Lost in space? We've got you covered!
                    </small>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
/* Standalone 404 page styles */
body {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    min-height: 100vh;
}

.container {
    padding: 2rem 1rem;
}

.card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 15px;
    border: none;
}

.btn {
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    text-decoration: none;
    color: inherit;
}

.btn-primary {
    background: linear-gradient(45deg, #667eea, #764ba2);
    border: none;
}

.btn-outline-secondary {
    border: 2px solid #6c757d;
    color: #6c757d;
}

.btn-outline-secondary:hover {
    background: #6c757d;
    border-color: #6c757d;
}

.display-1 {
    font-size: 6rem;
    font-weight: 900;
    background: linear-gradient(45deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 2px 10px rgba(102, 126, 234, 0.3);
    margin-bottom: 1rem;
}

.lead {
    font-size: 1.25rem;
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .display-1 {
        font-size: 4rem;
    }

    .lead {
        font-size: 1.1rem;
    }

    .d-flex {
        flex-direction: column;
    }

    .btn {
        margin-bottom: 0.5rem;
        width: 100%;
    }

    .container {
        padding: 1rem;
    }
}

@media (max-width: 576px) {
    .display-1 {
        font-size: 3.5rem;
    }

    .h3 {
        font-size: 1.75rem;
    }
}

/* Custom scrollbar for webkit browsers */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(45deg, #667eea, #764ba2);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(45deg, #5a6fd8, #6b5b95);
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>