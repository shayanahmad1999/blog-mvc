<?php
namespace App\Models;

use App\Core\Model;

class Post extends Model
{
    public function create($userId, $title, $content)
    {
        $sql = "INSERT INTO posts (user_id, title, content) VALUES (:user_id, :title, :content)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":user_id" => $userId, ":title" => $title, ":content" => $content]);
    }

    public function getAll()
    {
        $sql = "SELECT posts.id, posts.title, posts.content, posts.created_at, users.name as author
                FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.created_at DESC";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT posts.id, posts.title, posts.content, posts.created_at, users.name as author
                FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":id" => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $content)
    {
        $sql = "UPDATE posts SET title = :title, content = :content WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":title" => $title, ":content" => $content, ":id" => $id]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([":id" => $id]);
    }

    public function getCommentCount($id)
    {
        $sql = "SELECT COUNT(*) as count FROM comments WHERE post_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":id" => $id]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['count'];
    }
}
