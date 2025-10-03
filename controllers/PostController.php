<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Post;
use App\Models\Comment;
use MessageHelper;

class PostController extends Controller
{
    public function list()
    {
        $postModel = new Post();
        $posts = $postModel->getAll();
        $this->view("posts", ["posts" => $posts]);
    }

    public function create()
    {
        $userId = $_SESSION['user_id'] ?? null;
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        if (!$userId) {
            MessageHelper::setError("You must be logged in to create a post.");
            header("Location: /login");
            return;
        }

        $postModel = new Post();
        try {
            $postModel->create($userId, $title, $content);
            MessageHelper::setSuccess("Post created successfully!");
        } catch (\PDOException $e) {
            MessageHelper::setError("Failed to create post. Please try again.");
        }
        header("Location: /posts");
    }

    public function show($id)
    {
        $postModel = new Post();
        $commentModel = new Comment();
        $post = $postModel->getById($id);
        $comments = $commentModel->getByPost($id);
        $this->view("comments", ["post" => $post, "comments" => $comments]);
    }

    public function edit($id)
    {
        $postModel = new Post();
        $post = $postModel->getById($id);
        $this->view("edit_post", ["post" => $post]);
    }

    public function update($id)
    {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        $postModel = new Post();
        try {
            $postModel->update($id, $title, $content);
            MessageHelper::setSuccess("Post updated successfully!");
        } catch (\PDOException $e) {
            MessageHelper::setError("Failed to update post. Please try again.");
        }
        header("Location: /post/" . $id);
    }

    public function delete($id)
    {
        $postModel = new Post();
        try {
            $postModel->delete($id);
            MessageHelper::setSuccess("Post deleted successfully!");
        } catch (\PDOException $e) {
            MessageHelper::setError("Failed to delete post. Please try again.");
        }
        header("Location: /posts");
    }
}
