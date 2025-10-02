<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow border-0" style="border-radius: 15px;">
            <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); border-radius: 15px 15px 0 0 !important;">
                <h4 class="card-title mb-0 text-center">
                    <i class="fas fa-comment-dots me-2"></i>Edit Comment
                </h4>
            </div>
            <div class="card-body" style="border-radius: 0 0 15px 15px;">
                <form method="post" action="/edit-comment/<?php echo $comment['id']; ?>">
                    <input type="hidden" name="action" value="updateComment">
                    <input type="hidden" name="id" value="<?php echo $comment['id']; ?>">
                    <div class="mb-3">
                        <label for="comment" class="form-label fw-bold">
                            <i class="fas fa-pencil-alt me-1"></i>Your Comment
                        </label>
                        <textarea class="form-control form-control-lg" id="comment" name="comment" rows="4"
                                  required style="border-radius: 10px; resize: vertical;"><?php echo htmlspecialchars($comment['comment']); ?></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-secondary btn-lg flex-fill" style="border-radius: 25px;">
                            <i class="fas fa-save me-2"></i>Update Comment
                        </button>
                        <a href="/post/<?php echo $comment['post_id']; ?>" class="btn btn-outline-secondary btn-lg" style="border-radius: 25px;">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>