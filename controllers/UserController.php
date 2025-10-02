<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use MessageHelper;

class UserController extends Controller
{
    public function register($name, $email, $password)
    {
        $user = new User();
        try {
            $user->create($name, $email, $password);
            MessageHelper::setSuccess("Registration successful! Please login.");
            header("Location: /login");
        } catch (\PDOException $e) {
            MessageHelper::setError("Registration failed. Email might already be in use.");
            header("Location: /register");
        }
    }

    public function login($email, $password)
    {
        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['name'] = $user['name'];
            MessageHelper::setSuccess("Welcome back, " . $user['name'] . "!");
            header("Location: /posts");
        } else {
            MessageHelper::setError("Invalid email or password.");
            header("Location: /login");
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /login");
    }
}
