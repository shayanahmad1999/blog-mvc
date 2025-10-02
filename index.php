<?php
session_start();
require_once "config.php";
require_once "core/Database.php";
require_once "core/Controller.php";
require_once "core/Model.php";
require_once "models/User.php";
require_once "models/Post.php";
require_once "models/Comment.php";
require_once "controllers/UserController.php";
require_once "controllers/PostController.php";
require_once "controllers/CommentController.php";
require_once "helpers/MessageHelper.php";

use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Controllers\CommentController;
use App\Core\Controller;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'login';
} else {
    $request = $_SERVER['REQUEST_URI'];
    $path = parse_url($request, PHP_URL_PATH);
    $path = trim($path, '/');
    $segments = explode('/', $path);

    $action = 'login'; // default

    if (empty($segments[0])) {
        $action = 'login';
    } elseif ($segments[0] === 'login') {
        $action = 'login';
    } elseif ($segments[0] === 'register') {
        $action = 'register';
    } elseif ($segments[0] === 'logout') {
        $action = 'logout';
    } elseif ($segments[0] === 'posts') {
        $action = 'posts';
    } elseif ($segments[0] === 'comments') {
        $action = 'comments';
    } elseif ($segments[0] === 'post' && isset($segments[1])) {
        $action = 'post';
        $_GET['id'] = $segments[1];
    } elseif ($segments[0] === 'edit-post' && isset($segments[1])) {
        $action = 'editPost';
        $_GET['id'] = $segments[1];
    } elseif ($segments[0] === 'edit-comment' && isset($segments[1])) {
        $action = 'editComment';
        $_GET['id'] = $segments[1];
    } elseif ($segments[0] === 'delete-post' && isset($segments[1])) {
        $action = 'deletePost';
        $_GET['id'] = $segments[1];
    } elseif ($segments[0] === 'delete-comment' && isset($segments[1])) {
        $action = 'deleteComment';
        $_GET['id'] = $segments[1];
    }
}

switch ($action) {
    case 'login':
        (new Controller())->view("login");
        break;

    case 'doLogin':
        (new UserController())->login($_POST['email'], $_POST['password']);
        break;

    case 'register':
        (new Controller())->view("register");
        break;

    case 'doRegister':
        (new UserController())->register($_POST['name'], $_POST['email'], $_POST['password']);
        break;

    case 'logout':
        (new UserController())->logout();
        break;

    case 'posts':
        (new PostController())->list();
        break;

    case 'comments':
        (new CommentController())->list();
        break;

    case 'createPost':
        (new PostController())->create($_SESSION['user_id'], $_POST['title'], $_POST['content']);
        break;

    case 'post':
        (new PostController())->show($_GET['id']);
        break;

    case 'addComment':
        (new CommentController())->add($_POST['post_id'], $_SESSION['user_id'] ?? null, $_POST['comment']);
        break;

    case 'editPost':
        (new PostController())->edit($_GET['id']);
        break;

    case 'updatePost':
        (new PostController())->update($_POST['id'], $_POST['title'], $_POST['content']);
        break;

    case 'deletePost':
        (new PostController())->delete($_GET['id']);
        break;

    case 'editComment':
        (new CommentController())->edit($_GET['id']);
        break;

    case 'updateComment':
        (new CommentController())->update($_POST['id'], $_POST['comment']);
        break;

    case 'deleteComment':
        (new CommentController())->delete($_GET['id']);
        break;

    default:
        (new Controller())->view("login");
}
