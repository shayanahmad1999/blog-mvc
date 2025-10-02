<?php
namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public function create($name, $email, $password, $role = "user")
    {
        $sql = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
        $stmt = $this->conn->prepare($sql);
        $hashed = password_hash($password, PASSWORD_BCRYPT);
        return $stmt->execute([":name" => $name, ":email" => $email, ":password" => $hashed, ":role" => $role]);
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":email" => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
