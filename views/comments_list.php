<h1 class="mb-4">
    <i class="fas fa-comments me-2"></i>All Comments
    <span class="badge bg-primary ms-2"><?php echo count($comments); ?></span>
</h1>

<?php if (!empty($comments)): ?>
    <div class="row">
        <?php foreach ($comments as $comment): ?>
        <div class="col-lg-6 mb-4">
            <div class="card h-100 shadow-sm border-0" style="border-radius: 15px;">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex align-items-center mb-2">
                        <span class="badge bg-light text-dark me-2">
                            <i class="fas fa-user-circle me-1"></i><?php echo htmlspecialchars($comment['commenter']); ?>
                        </span>
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i><?php echo date('M j, Y \a\t g:i A', strtotime($comment['created_at'])); ?>
                        </small>
                    </div>
                    <p class="card-text flex-grow-1 mb-3"><?php echo htmlspecialchars($comment['comment']); ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/post/<?php echo $comment['post_id']; ?>" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-external-link-alt me-1"></i><?php echo htmlspecialchars(substr($comment['post_title'], 0, 30)); ?>...
                        </a>
                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment['user_id']): ?>
                        <div class="btn-group" role="group">
                            <a href="/edit-comment/<?php echo $comment['id']; ?>" class="btn btn-outline-primary btn-sm" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="/delete-comment/<?php echo $comment['id']; ?>" class="btn btn-outline-danger btn-sm" title="Delete"
                               onclick="return confirm('Are you sure you want to delete this comment?')">
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
<?php else: ?>
    <div class="alert alert-info" style="border-radius: 15px;">
        <i class="fas fa-info-circle me-2"></i>No comments yet. Start the conversation!
    </div>
<?php endif; ?>

<a href="/posts" class="btn btn-secondary">Back to Posts</a>