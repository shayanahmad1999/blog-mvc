<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Comment;
use MessageHelper;

class CommentController extends Controller
{
    public function add($postId, $userId, $comment)
    {
        $commentModel = new Comment();

        // Handle guest comments
        if (!$userId && isset($_POST['guest_name'])) {
            $userModel = new \App\Models\User();
            // Create a temporary guest user
            $guestEmail = 'guest_' . time() . '@temp.com';
            try {
                $userId = $userModel->create($_POST['guest_name'], $guestEmail, 'guestpass', 'guest');
            } catch (\PDOException $e) {
                $_SESSION['error'] = "Failed to create guest account. Please try again.";
                header("Location: /post/" . $postId);
                return;
            }
        }

        try {
            $commentModel->create($postId, $userId, $comment);
            MessageHelper::setSuccess("Comment added successfully!");
        } catch (\PDOException $e) {
            MessageHelper::setError("Failed to add comment. Please try again.");
        }
        header("Location: /post/" . $postId);
    }

    public function edit($id)
    {
        $commentModel = new Comment();
        $comment = $commentModel->getById($id);
        $this->view("edit_comment", ["comment" => $comment]);
    }

    public function update($id, $comment)
    {
        $commentModel = new Comment();
        try {
            $commentModel->update($id, $comment);
            MessageHelper::setSuccess("Comment updated successfully!");
        } catch (\PDOException $e) {
            MessageHelper::setError("Failed to update comment. Please try again.");
        }
        $comment = $commentModel->getById($id);
        header("Location: /post/" . $comment['post_id']);
    }

    public function delete($id)
    {
        $commentModel = new Comment();
        $comment = $commentModel->getById($id);
        $postId = $comment['post_id'];
        try {
            $commentModel->delete($id);
            MessageHelper::setSuccess("Comment deleted successfully!");
        } catch (\PDOException $e) {
            MessageHelper::setError("Failed to delete comment. Please try again.");
        }
        header("Location: /post/" . $postId);
    }

    public function list()
    {
        $commentModel = new Comment();
        $comments = $commentModel->getAll();
        $this->view("comments_list", ["comments" => $comments]);
    }
}