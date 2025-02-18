<?php

use App\Controllers\CommentController;
use App\Controllers\PostController;
use App\Controllers\UserController;

$action = $_GET['action'] ?? null;

$userController = new UserController();
$postController = new PostController();
$commentController = new CommentController();

switch ($action) {
    case 'getUsers':
        require SRC_DIR . "view/createUser.php";
        echo "<pre>" . print_r($userController->getUsers(), true) . "</pre>";
        break;
    case 'getPosts':
        require SRC_DIR . "view/createPost.php";
        echo "<pre>" . print_r($postController->getPosts(), true) . "</pre>";
        break;
    case 'getComments':
        require SRC_DIR . "view/createComment.php";
        echo "<pre>" . print_r($commentController->getComments(), true) . "</pre>";
        break;
    case 'getUser':
        if ($_GET['id'] === null) {
            die("Помилка: Відсутній ID користувача.");
        }
        echo "<pre>" . print_r($userController->getUser($_GET['id']), true) . "</pre>";
        break;
    case 'getPost':
        if ($_GET['id'] === null) {
            die("Помилка: Відсутній ID користувача.");
        }
        echo "<pre>" . print_r($postController->getPost($_GET['id']), true) . "</pre>";
        break;
    case 'getUserPosts':
        if ($_GET['id'] === null) {
            die("Помилка: Відсутній ID користувача.");
        }
        echo "<pre>" . print_r($postController->getUserPosts($_GET['id']), true) . "</pre>";
        break;
    case 'getPostComments':
        if ($_GET['id'] === null) {
            die("Помилка: Відсутній ID користувача.");
        }
        echo "<pre>" . print_r($commentController->getPostComments($_GET['id']), true) . "</pre>";
        break;
    case 'getCommentsCount':
        echo "<pre>" . print_r($commentController->getCommentsCount(), true) . "</pre>";
        break;
    case 'getUsersComments':
        echo "<pre>" . print_r($commentController->getUsersComments(), true) . "</pre>";
        break;
    case 'createUser':
        $userController->createUser($_POST['name'], $_POST['email'], $_POST['password']);
        echo "User created";
        break;
    case 'createPost':
        $postController->createPost($_POST['title'], $_POST['content'], $_POST['user_id']);
        echo "Post created";
        break;
    case 'createComment':
        $commentController->createComment($_POST['content'], $_POST['user_id'], $_POST['post_id']);
        echo "Comment created";
        break;
    default:
        throw new \Exception(getUrl() . ' - not found', 404);
}
