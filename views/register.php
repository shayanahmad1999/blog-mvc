<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0" style="border-radius: 15px;">
            <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); border-radius: 15px 15px 0 0 !important;">
                <h4 class="card-title mb-0 text-center">
                    <i class="fas fa-user-plus me-2"></i>Join Mini Blog
                </h4>
            </div>
            <div class="card-body" style="border-radius: 0 0 15px 15px;">
                <form method="post" action="/register">
                    <input type="hidden" name="action" value="doRegister">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">
                            <i class="fas fa-user me-1"></i>Full Name
                        </label>
                        <input type="text" class="form-control form-control-lg" id="name" name="name"
                               placeholder="Enter your full name" required style="border-radius: 10px;">
                    </div>
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
                               placeholder="Choose a strong password" required style="border-radius: 10px;">
                    </div>
                    <button type="submit" class="btn btn-success btn-lg w-100" style="border-radius: 25px;">
                        <i class="fas fa-user-plus me-2"></i>Create Account
                    </button>
                </form>
                <div class="text-center mt-3">
                    <small class="text-muted">Already have an account?
                        <a href="/login" class="text-decoration-none fw-bold">Login here</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>