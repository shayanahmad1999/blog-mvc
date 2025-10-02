<h1 class="mb-4">Posts</h1>

<?php if (isset($_SESSION['user_id'])): ?>
<div class="card mb-4 shadow border-0" style="border-radius: 15px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="card-header bg-transparent border-0 text-white">
        <h5 class="card-title mb-0">
            <i class="fas fa-plus-circle me-2"></i>Create New Post
        </h5>
    </div>
    <div class="card-body bg-white" style="border-radius: 0 0 15px 15px;">
        <form method="post" action="/posts">
            <input type="hidden" name="action" value="createPost">
            <div class="mb-3">
                <label for="title" class="form-label fw-bold">
                    <i class="fas fa-heading me-1"></i>Title
                </label>
                <input type="text" class="form-control form-control-lg" id="title" name="title"
                       placeholder="Enter an engaging title..." required style="border-radius: 10px;">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label fw-bold">
                    <i class="fas fa-edit me-1"></i>Content
                </label>
                <textarea class="form-control" id="content" name="content" rows="5"
                          placeholder="Share your thoughts..." required style="border-radius: 10px; resize: vertical;"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg px-4" style="border-radius: 25px;">
                <i class="fas fa-paper-plane me-2"></i>Create Post
            </button>
        </form>
    </div>
</div>
<?php endif; ?>

<div class="row">
    <?php foreach ($posts as $p):
        $commentCount = (new \App\Models\Post())->getCommentCount($p['id']);
    ?>
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100 shadow-sm border-0 post-card">
            <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <span class="badge bg-primary">
                        <i class="fas fa-user me-1"></i><?= htmlspecialchars($p['author']) ?>
                    </span>
                    <small class="text-muted">
                        <i class="fas fa-calendar-alt me-1"></i><?= date('M j, Y', strtotime($p['created_at'])) ?>
                    </small>
                </div>
                <h5 class="card-title mb-3">
                    <a href="/post/<?= $p['id'] ?>" class="text-decoration-none text-dark fw-bold post-link">
                        <?= htmlspecialchars($p['title']) ?>
                    </a>
                </h5>
                <p class="card-text flex-grow-1">
                    <?= htmlspecialchars(substr($p['content'], 0, 120)) ?>...
                </p>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="d-flex align-items-center">
                        <span class="badge bg-info text-dark me-2">
                            <i class="fas fa-comments me-1"></i><?= $commentCount ?> Comments
                        </span>
                        <a href="/post/<?= $p['id'] ?>" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-eye me-1"></i>Read More
                        </a>
                    </div>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="btn-group" role="group">
                        <a href="/edit-post/<?= $p['id'] ?>" class="btn btn-outline-warning btn-sm" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/delete-post/<?= $p['id'] ?>" class="btn btn-outline-danger btn-sm" title="Delete"
                           onclick="return confirm('Are you sure you want to delete this post?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<style>
.post-card {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    border-radius: 15px;
}

.post-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}

.post-link:hover {
    color: #0d6efd !important;
}
</style>