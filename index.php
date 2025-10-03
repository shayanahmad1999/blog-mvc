<?php
session_start();

// Load core dependencies
require_once "config.php";
require_once "core/Database.php";
require_once "core/Controller.php";
require_once "core/Router.php";
require_once "core/RouteServiceProvider.php";
require_once "core/Model.php";
require_once "models/User.php";
require_once "models/Post.php";
require_once "models/Comment.php";
require_once "controllers/UserController.php";
require_once "controllers/PostController.php";
require_once "controllers/CommentController.php";
require_once "helpers/MessageHelper.php";

// Load routes and dispatch
$router = require_once "routes.php";
$router->dispatch();
