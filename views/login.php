<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0" style="border-radius: 15px;">
            <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px 15px 0 0 !important;">
                <h4 class="card-title mb-0 text-center">
                    <i class="fas fa-sign-in-alt me-2"></i>Login to Your Account
                </h4>
            </div>
            <div class="card-body" style="border-radius: 0 0 15px 15px;">
                <form method="post" action="/login">
                    <input type="hidden" name="action" value="doLogin">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">
                            <i class="fas fa-envelope me-1"></i>Email Address
                        </label>
                        <input type="email" class="form-control form-control-lg" id="email" name="email"
                               placeholder="Enter your email" required style="border-radius: 10px;">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">
                            <i class="fas fa-lock me-1"></i>Password
                        </label>
                        <input type="password" class="form-control form-control-lg" id="password" name="password"
                               placeholder="Enter your password" required style="border-radius: 10px;">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100" style="border-radius: 25px;">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>
                </form>
                <div class="text-center mt-3">
                    <small class="text-muted">Don't have an account?
                        <a href="/register" class="text-decoration-none fw-bold">Register here</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>