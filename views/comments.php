<div class="card mb-4 shadow border-0" style="border-radius: 15px;">
    <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px 15px 0 0 !important;">
        <h4 class="card-title mb-0">
            <i class="fas fa-newspaper me-2"></i><?php echo htmlspecialchars($post['title']); ?>
        </h4>
    </div>
    <div class="card-body" style="border-radius: 0 0 15px 15px;">
        <div class="post-content mb-3">
            <?php echo nl2br(htmlspecialchars($post['content'])); ?>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">
                <i class="fas fa-user me-1"></i>By <?php echo htmlspecialchars($post['author']); ?>
            </small>
            <small class="text-muted">
                <i class="fas fa-calendar-alt me-1"></i><?php echo date('M j, Y \a\t g:i A', strtotime($post['created_at'])); ?>
            </small>
        </div>
    </div>
</div>

<h4 class="mb-3">
    <i class="fas fa-comments me-2"></i>Comments
    <span class="badge bg-primary ms-2"><?php echo count($comments); ?></span>
</h4>

<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
    <div class="card mb-3 shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div class="flex-grow-1">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-light text-dark me-2">
                            <i class="fas fa-user-circle me-1"></i><?php echo htmlspecialchars($comment['commenter']); ?>
                        </span>
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i><?php echo date('M j, Y \a\t g:i A', strtotime($comment['created_at'])); ?>
                        </small>
                    </div>
                    <p class="card-text mb-2"><?php echo htmlspecialchars($comment['comment']); ?></p>
                </div>
                <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment['user_id']): ?>
                <div class="btn-group ms-2" role="group">
                    <a href="/edit-comment/<?= $comment['id'] ?>" class="btn btn-outline-primary btn-sm" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="/delete-comment/<?= $comment['id'] ?>" class="btn btn-outline-danger btn-sm" title="Delete"
                       onclick="return confirm('Are you sure you want to delete this comment?')">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="alert alert-info">No comments yet. Be the first to comment!</div>
<?php endif; ?>

<div class="card mt-4 shadow border-0" style="border-radius: 15px;">
    <div class="card-header bg-gradient" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border-radius: 15px 15px 0 0 !important;">
        <h5 class="card-title mb-0 text-white">
            <i class="fas fa-plus-circle me-2"></i>Add Your Comment
        </h5>
    </div>
    <div class="card-body" style="border-radius: 0 0 15px 15px;">
        <form method="post" action="/post/<?php echo $post['id']; ?>">
            <input type="hidden" name="action" value="addComment">
            <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
            <?php if (!isset($_SESSION['user_id'])): ?>
            <div class="mb-3">
                <label for="guest_name" class="form-label fw-bold">
                    <i class="fas fa-user me-1"></i>Your Name
                </label>
                <input type="text" class="form-control form-control-lg" id="guest_name" name="guest_name"
                       placeholder="Enter your name" required style="border-radius: 10px;">
            </div>
            <?php endif; ?>
            <div class="mb-3">
                <label for="comment" class="form-label fw-bold">
                    <i class="fas fa-comment-dots me-1"></i>Share your thoughts
                </label>
                <textarea class="form-control form-control-lg" id="comment" name="comment" rows="4"
                          placeholder="Write your comment here..." required style="border-radius: 10px; resize: vertical;"></textarea>
            </div>
            <button type="submit" class="btn btn-warning btn-lg w-100" style="border-radius: 25px;">
                <i class="fas fa-paper-plane me-2"></i>Post Comment
            </button>
        </form>
    </div>
</div>

<a href="/posts" class="btn btn-secondary mt-3">Back to Posts</a>