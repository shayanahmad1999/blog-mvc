<?php
namespace App\Models;

use App\Core\Model;

class Comment extends Model
{
    public function create($postId, $userId, $comment)
    {
        $sql = "INSERT INTO comments (post_id, user_id, comment) VALUES (:post_id, :user_id, :comment)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":post_id" => $postId, ":user_id" => $userId, ":comment" => $comment]);
    }

    public function getByPost($postId)
    {
        $sql = "SELECT comments.id, comments.comment, comments.created_at, comments.user_id, users.name as commenter FROM comments
                JOIN users ON comments.user_id = users.id
                WHERE post_id = :post_id ORDER BY comments.created_at ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":post_id" => $postId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT comments.*, users.name as commenter FROM comments
                JOIN users ON comments.user_id = users.id WHERE comments.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":id" => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $sql = "SELECT comments.id, comments.comment, comments.created_at, comments.user_id, users.name as commenter, posts.title as post_title, posts.id as post_id
                FROM comments
                JOIN users ON comments.user_id = users.id
                JOIN posts ON comments.post_id = posts.id
                ORDER BY comments.created_at DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update($id, $comment)
    {
        $sql = "UPDATE comments SET comment = :comment WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":comment" => $comment, ":id" => $id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":id" => $id]);
    }
}
