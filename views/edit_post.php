<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow border-0" style="border-radius: 15px;">
            <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border-radius: 15px 15px 0 0 !important;">
                <h4 class="card-title mb-0 text-center">
                    <i class="fas fa-edit me-2"></i>Edit Post
                </h4>
            </div>
            <div class="card-body" style="border-radius: 0 0 15px 15px;">
                <form method="post" action="/edit-post/<?php echo $post['id']; ?>">
                    <input type="hidden" name="action" value="updatePost">
                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">
                            <i class="fas fa-heading me-1"></i>Title
                        </label>
                        <input type="text" class="form-control form-control-lg" id="title" name="title"
                               value="<?php echo htmlspecialchars($post['title']); ?>" required style="border-radius: 10px;">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold">
                            <i class="fas fa-edit me-1"></i>Content
                        </label>
                        <textarea class="form-control" id="content" name="content" rows="8" required
                                  style="border-radius: 10px; resize: vertical;"><?php echo htmlspecialchars($post['content']); ?></textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-lg flex-fill" style="border-radius: 25px;">
                            <i class="fas fa-save me-2"></i>Update Post
                        </button>
                        <a href="/post/<?php echo $post['id']; ?>" class="btn btn-outline-secondary btn-lg" style="border-radius: 25px;">
                            <i class="fas fa-times me-2"></i>Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>