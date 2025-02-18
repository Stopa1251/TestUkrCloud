<?php

namespace App\Controllers;

use App\Models\Post;

class PostController
{
    protected Post $postModel;
    public function __construct() {
        $this->postModel = new Post();
    }
    public function getPosts() {
        return $this->postModel->getPosts();
    }
    public function getPost($post_id) {
        return $this->postModel->getPost($post_id);
    }
    public function getUserPosts($user_id) {
        return $this->postModel->getUserPosts($user_id);
    }
    public function createPost($title, $content, $user_id) {
        $this->postModel->createPost($title, $content, $user_id);
    }
    public function deletePost($post_id) {
        $this->postModel->deletePost($post_id);
    }
}
